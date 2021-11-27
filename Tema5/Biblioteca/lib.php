<?php
include ('modelo.php');

//Función para filtrar los campos del formulario
function filtrado($datos)
{
    $datos = trim($datos); // Elimina espacios antes y después de los datos
    $datos = stripslashes($datos); // Elimina backslashes \
    $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
    return $datos;
}


//FUNCIONES PARA LOS LIBROS---------------------------------------------------------------------------------------------------------------------------------------------
//PINTA LOS LIBROS EN FORMATO TABLA
function pintarLibros($libros)
{
    $html = ""; //ME GUSTÓ LA IDEA DE GUARDARLO EN UN HTML DESDE LA FUNCION
    if (sizeof($libros) > 0) {
        $encabezados = array_keys($libros[0]);
        $html .= '<table class="table table-striped justify-content-center"><thead><tr>';
        foreach ($encabezados as $encabezado) {
            $html .= "<th class='text-uppercase col-1'>{$encabezado}</th>";
        }
        $html .= "<th class='text-uppercase col-1'>Acciones</th>";
        $html .= '</tr></thead><tbody>';
        foreach ($libros as $libro) {
            $html .= '<tr>';
            foreach ($libro as $key => $value) {
                if ($key == "portada") {
                    $html .=  '<td><img class="img-fluid max-width:100% img-thumbnail" src="data:image/jpeg;base64,'.base64_encode($value).'"/></td>';
                }else{
                $html .= "<td>{$value}</td>";
            }}
            $html .= "<td><a class='text-danger' href='controlador.php?accion=borrarLibro&id=$libro[id]'>X</a> ";
            $html .= "<a class='text-success' href='controlador.php?accion=editarLibro&id=$libro[id]'>E</a></td> ";
            $html .= "</tr>";
        }
        $html .= "</tbody></table>";
    }
    return $html;
}
//CARGAMOS LOS USUARIOS Y LOS PINTAMOS COMO OPTIONS PARA UN SELECT EN HTML
function pintarLibrosOpciones()
{
    $libros = cargarLibrosTodos();
    $html = "";
    foreach ($libros as $libro) {
        if ($libro['cantidadDispo'] <= 0) {
            $html .= "<option class='bg-danger text-light' value='" . $libro["id"] . "'disabled>" . $libro["titulo"] . "</option>";
        } else {
            $html .= "<option value='" . $libro["id"] . "'>" . $libro["titulo"] . " Cant:" . $libro["cantidadDispo"] . "</option>";
        }
    }
    return $html;
}
//FUNCIONES PARA LOS USUARIOS--------------------------------------------------------------------------------------------------------------------------------------------
//PINTAR LOS USUARIOS EN FORMATO TABLA
function pintarUsuarios($usuarios)
{
    $html = ""; //ME GUSTÓ LA IDEA DE GUARDARLO EN UN HTML DESDE LA FUNCION
    if (sizeof($usuarios) > 0) {
        $encabezados = array_keys($usuarios[0]);
        $html .= '<table class="table table-striped"><thead><tr>';
        foreach ($encabezados as $encabezado) {
            $html .= "<th class='text-uppercase col-1'>{$encabezado}</th>";
        }
        $html .= "<th class='text-uppercase col-1'>Acciones</th>";
        $html .= '</tr></thead><tbody>';
        foreach ($usuarios as $usuario) {
            $html .= '<tr>';
            foreach ($usuario as $value) {
                $html .=  "<td style>{$value}</td>";
            }
            $html .= "<td><a class='text-danger' href='controlador.php?accion=borrarUsuario&id=$usuario[id]'>X</a> ";
            $html .= "<a class='text-warning' href='controlador.php?accion=imprimirCSV&id=$usuario[id]'>CSV</a></td> ";
            $html .= "</tr>";
        }
        $html .= "</tbody></table>";
    }
    return $html;
}
//CARGAMOS LOS USUARIOS Y LOS PINTAMOS COMO OPTIONS PARA UN SELECT EN HTML
function pintarUsuariosOpciones()
{
    $usuarios = cargarUsuariosTodos();
    $html = "";
    foreach ($usuarios as $usuario) {
        $html .= "<option value='" . $usuario["id"] . "'>" . $usuario["nombre"] . " " . $usuario["apellidos"] . "</option>";
    }
    return $html;
}

function generarCSV($usuario, $prestamos)
{
    // instantiate and use the dompdf class
    $csv = "usuarioCSV.csv";
    $fileCSV = fopen($csv, 'w');
    fputcsv($fileCSV, $usuario);
    
    foreach ($prestamos as $prestamo) {
        fputcsv($fileCSV, $prestamo);
        
    }
}
//FUNCIONES PARA LOS PRESTAMOS------------------------------------------------------------------------------------------------------
//PINTA LOS PRESTAMOS EN FORMATO TABLA
function pintarPrestamos($prestamos)
{
    $html = ""; //ME GUSTÓ LA IDEA DE GUARDARLO EN UN HTML DESDE LA FUNCION
    if (sizeof($prestamos) > 0) {
        $encabezados = array_keys($prestamos[0]);
        $html .= '<table class="table table-striped"><thead><tr>';
        foreach ($encabezados as $encabezado) {
            $html .= "<th class='text-uppercase col-1'>{$encabezado}</th>";
        }
        $html .= "<th class='text-uppercase col-1'>Acciones</th>";
        $html .= '</tr></thead><tbody>';
        foreach ($prestamos as $prestamo) {
            $html .= '<tr>';
            foreach ($prestamo as $value) {
                $html .=  "<td style>{$value}</td>";
            }
            $html .= "<td><a class='text-success' href='controlador.php?accion=editarPrestamo&id=$prestamo[id]'>E</a></td> ";
            $html .= "</tr>";
        }
        $html .= "</tbody></table>";
    }
    return $html;
}