<?php

    class ContactoBD{

        public static function conectar(){
            $dbname = 'agenda';
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



        public static function leerAgenda(){
            $dbh = self::conectar();
            $stmt = $dbh->prepare("SELECT * FROM contactos");
            $stmt->execute();
            $contactos = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Contacto');
            //Cerrar conexión
            $dbh = null;
            return $contactos;
        }

        public static function insertarContacto($contacto){
            $dbh = self::conectar();

            try {
                $stmt = $dbh->prepare("INSERT INTO contactos (nombre, apellidos, email, movil) VALUES (?, ?, ?, ?)");
                
                $stmt->bindValue(1, $contacto->getNombre());
                $stmt->bindValue(2, $contacto->getApellidos());
                $stmt->bindValue(3, $contacto->getEmail());
                $stmt->bindValue(4, $contacto->getMovil());

                $stmt->execute();
            } catch (PDOException $e){
                echo $e->getMessage();
            }

            $dbh = null;

        }

        public static function borrarContacto($id) {
            $dbh = self::conectar();

            try {
                $stmt = $dbh->prepare("DELETE FROM contactos WHERE id = ?");
                $stmt->bindValue(1, $id);
                $stmt->execute();
            } catch (PDOException $e){
                echo $e->getMessage();
            }

            $dbh = null;

        }

        public static function borrarTodos() {
            $dbh = self::conectar();
            try {
                $stmt = $dbh->prepare("DELETE FROM contactos");
                $stmt->execute();

                $stmt = $dbh->prepare("ALTER TABLE contactos AUTO_INCREMENT = 1");
                $stmt->execute();
                
            } catch (PDOException $e){
                echo $e->getMessage();
            }
            $dbh = null;
        }

        public static function leerContacto($id){
            $dbh = self::conectar();
            try {
                $stmt = $dbh->prepare("SELECT * FROM contactos WHERE id=?");
                $stmt->bindValue(1, $id);
                $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Contacto'); //PARA UN SOLO CONTACTO
                $stmt->execute();
                $contacto = $stmt->fetch();
            } catch (PDOException $e){
                echo $e->getMessage();
            }
            $dbh = null;
            return $contacto;
        }

        public static function editarContacto($id, $nombre, $apellidos, $email, $movil){
            $dbh = self::conectar();
            try {
                $stmt = $dbh->prepare("UPDATE contactos SET nombre=?, apellidos=?, email=?, movil=? WHERE id=?");
                $stmt->bindValue(1, $nombre);
                $stmt->bindValue(2, $apellidos);
                $stmt->bindValue(3, $email);
                $stmt->bindValue(4, $movil);

                $stmt->bindValue(5, $id);

                $stmt->execute();
            } catch (PDOException $e){
                echo $e->getMessage();
            }
            $dbh = null;
        }
    }
