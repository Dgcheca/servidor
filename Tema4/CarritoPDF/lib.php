<?php
require 'vendor/autoload.php';

use Dompdf\Dompdf;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function filtrado($datos)
{
    $datos = trim($datos); // Elimina espacios antes y después de los datos
    $datos = stripslashes($datos); // Elimina backslashes \
    $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
    return $datos;
}

function buscar($id, $productos)
{
    foreach ($productos as $producto) {
        if ($producto[0] == $id) {
            return array($producto[1], $producto[2]);
        }
    }
}
function encontrado($id, $productos)
{
    foreach ($productos as $producto) {
        if ($producto['id'] == $id) {
            return true;
        }
    }
    return false;
}
function update($id, $cant)
{
    foreach ($_SESSION['carrito'] as &$linea) {
        if ($linea['id'] == $id) {
            $linea['cant'] += $cant;
            return $linea['cant'];
        }
    }
}
function leerArchivo()
{
    if (strlen(file_get_contents("store.txt") > 0)) {
        $productos = array();
        $archivo = explode("|", file_get_contents("store.txt"));
        foreach ($archivo as $linea) {
            array_push($productos, explode("@", $linea));
        }
    } else {
        $productos = "";
    }
    return $productos;
}

function insertarProducto($nombre, $precio, $descripcion, $img)
{
    $productos = leerArchivo();
    $mayor = 0;
    foreach ($productos as $producto) {
        if ($producto[0] > $mayor)
            $mayor = $producto[0];
    }
    if (strlen(file_get_contents("store.txt") > 0))
        $producto = "|" . ($mayor + 1) . "@" . $nombre . "@" . $precio . "@" . $img . "@" . $descripcion;
    else
        $producto = ($mayor + 1) . "@" . $nombre . "@" . $precio . "@" . $img . "@" . $descripcion;
    file_put_contents("store.txt", $producto, FILE_APPEND | LOCK_EX);
}
function generarPDF($nombre, $direccion, $pais, $ciudad, $email, $carrito, $productos)
{
    // instantiate and use the dompdf class
    $dompdf = new Dompdf();

    //FACTURA DEL CARRO EN HTML
    $html = "<style type='text/css'>
    table,td,th {
        border: solid 1px #437ad3;
    table
    {
        padding: 0;
        font-size: 12pt;
        text-align: center;
        vertical-align: middle;
        border-collapse: collapse;
    }
    td
    {
        padding: 1mm;
        width: 150px;
    }
    td.right {
        text-align: right;
        padding-right: 30px;
    }
    </style>";

    $html .= "<h1>Factura XXXXXXX</h1>";
    $html .= "<h3>Nombre: {$nombre}</h3>";
    $html .= "<h3>Direccion: {$direccion}</h3>";
    $html .= "<h3>País: {$pais}</h3>";
    $html .= "<h3>Ciudad: {$ciudad}</h3>";
    $html .= "<h3>Email: {$email}</h3>";
    $html .= "<br>";

    $html .= "<table>";
    $html .= "<thead>
                    <tr>
                        <td>Nombre</td>
                        <td>Cantidad</td>
                        <td>Precio</td>
                        <td>Subtotal</td>
                    </tr>
                </thead>
                <tbody>";

    $total = 0;
    foreach ($carrito as $linea) {
        $datos = buscar($linea['id'], $productos);

        $html .= "<tr>";
        $html .= "  <td>{$datos[0]}</td>";
        $html .= "  <td>{$linea['cant']}</td>";
        $html .= "  <td>{$datos[1]}€</td>";
        $html .= "  <td>" . $linea['cant'] * $datos[1] . "€</td>";
        $html .= "</tr>";
        //Total de cada línea del carro. Vamos acumulando
        $total += $linea['cant'] * $datos[1];
    }
    $html .= "<tr>
                <td>Total</td><td></td><td></td>
                <td><strong>{$total}€</strong></td>
                </tr>";

    $html .= "</tbody></table>";
    $dompdf->loadHtml($html);

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'landscape');

    // Render the HTML as PDF
    $dompdf->render();

    //Guardamos pdf en factura.pdf
    $algo = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10);
    $fichero = "facturas/factura" . $algo . ".pdf";
    file_put_contents($fichero, $dompdf->output());

    
    unset($_SESSION['carrito']);
    header("Location: factura.php?fichero={$fichero}&email={$email}&nombre={$nombre}", false);
    exit;
}

function mandarEmail($fichero, $email, $nombre) {
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'mardukecheka@gmail.com';                     //SMTP username
        $mail->Password   = 'wtqaznbohokdnyvu';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('juegazos@gmail.com', 'juegazos.com');
        $mail->addAddress($email, $nombre);     //Add a recipient
        $mail->addAttachment($fichero, 'FacturaPedido.pdf');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Factura Compra Juegazos.com';
        $mail->Body    = 'Gracias por su compra! aqui adjuntamos su factura';


        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
