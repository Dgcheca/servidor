<?php
  class ReservaBD{

    public static function conectar(){
        $dbname = 'restaurante';
        $user = 'DGCheca';
        $password = 'jaroso';
        try {
            $dsn = "mysql:host=localhost;dbname=$dbname";
            $dbh = new PDO($dsn, $user, $password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $dbh;
    }



    public static function mostrarReservasFecha($fecha){
        $dbh = self::conectar();
        $stmt = $dbh->prepare("SELECT reservas.id, reservas.nombre ,reservas.apellidos ,reservas.email,reservas.movil,reservas.fecha,reservas.turno,reservas.hora,reservas.nPersonas,reservas.estado, mesas.id as id_mesa FROM reservas JOIN mesas ON reservas.id_mesa = mesas.id WHERE fecha=?");
        $stmt->bindValue(1, $fecha);
        $stmt->execute();

        $reservas = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Reserva');
        $dbh = null;

        return $reservas;
    }

    public static function busquedaEnReservas($texto,$fecha) {
        $dbh = self::conectar();
        $stmt = $dbh->prepare("SELECT * FROM reservas WHERE apellidos LIKE ? OR email LIKE ? OR movil LIKE ? AND fecha = ?");
        $stmt->bindValue(1,"%$texto%");
        $stmt->bindValue(2,"%$texto%");
        $stmt->bindValue(3,"%$texto%");
        $stmt->bindValue(4,$fecha);
        $stmt->execute();

        $reservas = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Reserva');
        $dbh = null;

        return $reservas;
    }

    
    public static function busquedaEnReservasActivos($fecha) {
        $dbh = self::conectar();
        $stmt = $dbh->prepare("SELECT * FROM reservas WHERE estado LIKE ?  AND fecha = ?");
        $stmt->bindValue(1,"activo");
        $stmt->bindValue(2,$fecha);
        $stmt->execute();
       
        $reservas = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Reserva');
        $dbh = null;

        return $reservas;
    }

    public static function getReserva($id){
        $dbh = self::conectar();
        $stmt = $dbh->prepare("SELECT * FROM reservas WHERE id LIKE ?");
        $stmt->bindValue(1,$id);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Reserva');
        $stmt->execute();

        $reservas = $stmt->fetch();
        $dbh = null;

        return $reservas;
    }

    
    public static function cancelarReserva($id){
        $dbh = self::conectar();

        $stmt = $dbh->prepare("UPDATE reservas SET estado=? WHERE id=?");
        $stmt->bindValue(1, "Cancelada");
        $stmt->bindValue(2, $id);
        $stmt->execute();
        $dbh = null;
    }

  }
?>