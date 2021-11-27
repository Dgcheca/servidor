<?php

//CONEXION A LA BASE DE DATOS
function conexion()
{
    $dbname = 'biblioteca';
    $user = 'DGCheca';
    $password = 'jaroso';

    try {
        $dsn = "mysql:host=localhost;dbname=$dbname";

        $conexion = new PDO($dsn, $user, $password);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $conexion;
}

//FUNCIONES PARA LOS LIBROS---------------------------------------------------------------------------------------------------------------------------------------------
//CARGA LOS LIBROS DESDE LA BASE DE DATOS
function cargarLibrosTodos()
{
    $conexion = conexion();
    $stmt = $conexion->prepare("SELECT * FROM libros");
    $stmt->execute();
    $libros = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $libros;
    $conexion = null;
}
//CARGA LIBROS SEGUN UNA BUSQUEDA APROXIMADA EN TITULO, SUBTITULO Y AUTOR
function cargarLibrosBusqueda($busqueda)
{
    $conexion = conexion();
    $stmt = $conexion->prepare("SELECT * FROM libros WHERE titulo LIKE '%$busqueda%' OR subtitulo LIKE '%$busqueda%' OR autor LIKE '%$busqueda%';");
    $stmt->execute();
    $libros = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $libros;
    $conexion = null;
}
//CARGA LIBROS SEGUN UNA BUSQUEDA CONCRETA EN ID
function cargarLibroID($id)
{
    $conexion = conexion();
    $stmt = $conexion->prepare("SELECT * FROM libros WHERE id = '$id';");
    $stmt->execute();
    $libros = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $libros;
    $conexion = null;
}
//ELIMINA UN LIBRO DE LA BASE DE DATOS
function eliminarLibro($id)
{
    $conexion = conexion();
    $stmt = $conexion->prepare("DELETE FROM libros WHERE Libros.id = ?");
    $stmt->bindValue(1, $id);
    $stmt->execute();
    $conexion = null;
}
//AÑADE UN LIBRO NUEVO A LA BASE DE DATOS
function incluirNuevoLibro($ISBN, $titulo, $subtitulo, $descripcion, $autor, $editorial, $categoria, $portada, $cantidadTotal)
{
    $conexion = conexion();
    $stmt = $conexion->prepare("INSERT INTO libros (ISBN,titulo,subtitulo,descripcion,autor,editorial,categoria,portada,cantidadTotal,cantidadDispo) VALUES (?,?,?,?,?,?,?,?,?,?)");
    $stmt->bindValue(1, $ISBN);
    $stmt->bindValue(2, $titulo);
    $stmt->bindValue(3, $subtitulo);
    $stmt->bindValue(4, $descripcion);
    $stmt->bindValue(5, $autor);
    $stmt->bindValue(6, $editorial);
    $stmt->bindValue(7, $categoria);
    $stmt->bindValue(8, $portada);
    $stmt->bindValue(9, $cantidadTotal);
    $stmt->bindValue(10, $cantidadTotal);
    $stmt->execute();
    $conexion = null;
}
//ACTUALIZA UN LIBRO QUE YA EXISTE EN LA BASE DE DATOS
function guardarLibroEditado($id, $ISBN, $titulo, $subtitulo, $descripcion, $autor, $editorial, $categoria, $portada, $cantidadTotal, $cantidadDispo)
{
    $conexion = conexion();
    if ($portada == "-") { //SI NO INTRODUCIMOS PORTADA, NO MODIFICAMOS LA QUE YA HAYA EN LA BASE DE DATOS
        $stmt = $conexion->prepare("UPDATE libros SET ISBN=?,titulo=?,subtitulo=?,descripcion=?,autor=?,editorial=?,categoria=?,cantidadTotal=?,cantidadDispo=? WHERE id=?");
        $stmt->bindValue(10, $id);
    } else { //SI SI INTRODUCIMOS, INCLUIMOS PORTADA AL INGRESAR LOS DATOS
        $stmt = $conexion->prepare("UPDATE libros SET ISBN=?,titulo=?,subtitulo=?,descripcion=?,autor=?,editorial=?,categoria=?,cantidadTotal=?,cantidadDispo=?,portada=? WHERE id=?");
        $stmt->bindValue(10, $portada);
        $stmt->bindValue(11, $id);
    }

    $stmt->bindValue(1, $ISBN);
    $stmt->bindValue(2, $titulo);
    $stmt->bindValue(3, $subtitulo);
    $stmt->bindValue(4, $descripcion);
    $stmt->bindValue(5, $autor);
    $stmt->bindValue(6, $editorial);
    $stmt->bindValue(7, $categoria);
    $stmt->bindValue(8, $cantidadTotal);
    $stmt->bindValue(9, $cantidadDispo);

    // Ejecuta la consulta
    $stmt->execute();

    $conexion = null;
}

//FUNCIONES PARA LOS USUARIOS--------------------------------------------------------------------------------------------------------------------------------------------
//CARGAR TODA LA LISTA DE USUARIOS
function cargarUsuariosTodos()
{
    $conexion = conexion();
    $stmt = $conexion->prepare("SELECT * FROM usuarios");
    $stmt->execute();
    $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $usuarios;
    $conexion = null;
}
function cargarUsuarioID($id)
{
    $conexion = conexion();
    $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE id=?");
    $stmt->bindValue(1, $id);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $usuarios = $stmt->fetch();
    return $usuarios;
    $conexion = null;
}
//METER UN NUEVO USUARIO EN LA BASE DE DATOS
function  incluirNuevoUsuario($nombre, $apellidos, $dni, $edad, $telefono, $direccion, $poblacion, $email)
{
    $conexion = conexion();
    $stmt = $conexion->prepare("INSERT INTO usuarios (dni,nombre,apellidos,edad,direccion,poblacion,telefono,email) VALUES (?,?,?,?,?,?,?,?)");
    $stmt->bindValue(1, $dni);
    $stmt->bindValue(2, $nombre);
    $stmt->bindValue(3, $apellidos);
    $stmt->bindValue(4, $edad);
    $stmt->bindValue(5, $direccion);
    $stmt->bindValue(6, $poblacion);
    $stmt->bindValue(7, $telefono);
    $stmt->bindValue(8, $email);
    $stmt->execute();
    $conexion = null;
}
//ELIMINAR UN USUARIO DE LA BASE DE DATOS
function eliminarUsuario($id)
{
    $conexion = conexion();
    $stmt = $conexion->prepare("DELETE FROM usuarios WHERE Usuarios.id = ?");
    $stmt->bindValue(1, $id);
    $stmt->execute();
    $conexion = null;
}
//FUNCIONES PARA LOS PRESTAMOS------------------------------------------------------------------------------------------------------
//CARGA TODOS LOS PRESTAMOS DE LA BASE DE DATOS
function cargarPrestamosTodos()
{
    $conexion = conexion();
    $stmt = $conexion->prepare("SELECT prestamos.id, prestamos.fecha_inicio, prestamos.fecha_fin, prestamos.estado, usuarios.nombre, libros.titulo
            FROM prestamos,usuarios,libros WHERE prestamos.id_usuario = usuarios.id AND prestamos.id_libro = libros.id");
    $stmt->execute();
    $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $usuarios;
    $conexion = null;
}
//CARGA PRESTAMOS DE LA BASE DE DATOS SEGUN LA BUSQUEDA POR FECHA O ESTADO
function cargarPrestamosBusqueda($busqueda)
{
    $conexion = conexion();
    $stmt = $conexion->prepare("SELECT prestamos.id, prestamos.fecha_inicio, prestamos.fecha_fin, prestamos.estado, usuarios.nombre, libros.titulo
    FROM prestamos JOIN usuarios ON prestamos.id_usuario = usuarios.id JOIN libros ON prestamos.id_libro = libros.id WHERE estado LIKE '$busqueda' OR usuarios.dni LIKE '$busqueda'");
    $stmt->execute();
    $prestamos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $prestamos;
    $conexion = null;
}

function cargarPrestamoID($id)
{
    $conexion = conexion();
    $stmt = $conexion->prepare("SELECT prestamos.id, prestamos.fecha_inicio, prestamos.fecha_fin, prestamos.estado,usuarios.id as usuarioId, usuarios.nombre,libros.id as libroId, libros.titulo
    FROM prestamos,usuarios,libros WHERE prestamos.id = '$id';");
    $stmt->execute();
    $prestamos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $prestamos;
    $conexion = null;
}
//METEMOS UN NUEVO PRESTAMO EN LA BASE DE DATOS
function incluirNuevoPrestamo($fechainicio, $fechafin, $estado, $idUsuario, $idLibro)
{
    $conexion = conexion();
    $stmt = $conexion->prepare("INSERT INTO prestamos (fecha_inicio,fecha_fin,estado,id_usuario,id_libro) VALUES (?,?,?,?,?)");
    $stmt->bindValue(1, $fechainicio);
    $stmt->bindValue(2, $fechafin);
    $stmt->bindValue(3, $estado);
    $stmt->bindValue(4, $idUsuario);
    $stmt->bindValue(5, $idLibro);
    $stmt->execute();

    $libro = cargarLibroID($idLibro)[0];

    $cantidadDispo = $libro['cantidadDispo'] - 1;
    $stmt = $conexion->prepare("UPDATE libros SET cantidadDispo=? WHERE id=?");
    $stmt->bindValue(1, $cantidadDispo);
    $stmt->bindValue(2, $idLibro);
    $stmt->execute();

    $conexion = null;
}
//GUARDA UN PRESTAMO EDITADO EN LA BASE DE DATOS, EN CASO DE QUE CAMBIE EL ESTADO A DEVUELTO, SUMA 1 AL STOCK
function guardarPrestamoEditado($id, $fechaFin, $estado, $libroId)
{
    $conexion = conexion();

    $stmt = $conexion->prepare("UPDATE prestamos SET fecha_fin=?,estado=? WHERE id=?");
    $stmt->bindValue(1, $fechaFin);
    $stmt->bindValue(2, $estado);
    $stmt->bindValue(3, $id);
    $stmt->execute();

    if ($estado == "devuelto") {
        $libro = cargarLibroID($libroId)[0];
        $cantidadDispo = $libro['cantidadDispo'] + 1;
        $stmt = $conexion->prepare("UPDATE libros SET cantidadDispo=? WHERE id=?");
        $stmt->bindValue(1, $cantidadDispo);
        $stmt->bindValue(2, $libroId);
        $stmt->execute();
    }
    $conexion = null;
}


?>