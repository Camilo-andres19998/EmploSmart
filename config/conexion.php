<?php
session_start();

class Conectar {
    private static $dbh;
    private static $ruta = "http://localhost/Sistemas/Gestion_actividades/";

    public static function Conexion() {
        if (isset(self::$dbh)) {
            return self::$dbh;
        }

        try {
            self::$dbh = new PDO("mysql:host=localhost;dbname=smarth", "root", "");
            self::$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return self::$dbh;
        } catch (PDOException $e) {
            print "¡Error BD!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public static function set_names() {
        self::Conexion()->exec("SET NAMES 'utf8'");
    }

    public static function ruta() {
        return self::$ruta;
    }
}
?>
