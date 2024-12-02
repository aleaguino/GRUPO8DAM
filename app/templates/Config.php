<?php
class Config {
    // Configuración de la base de datos
    const DB_HOST = 'localhost';
    const DB_NAME = 'alimentos82024';    // Nombre de tu base de datos
    const DB_USER = 'grupo8da4b';        // Usuario de tu base de datos
    const DB_PASS = 'Q84tRmI0';     // Contraseña de tu base de datos

    // Método para obtener la conexión a la base de datos
    public static function getConnection() {
        try {
            $dsn = 'mysql:host=' . self::DB_HOST . ';dbname=' . self::DB_NAME . ';charset=utf8';
            $pdo = new PDO($dsn, self::DB_USER, self::DB_PASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            die('Error en la conexión: ' . $e->getMessage());
        }
    }
}
?>
