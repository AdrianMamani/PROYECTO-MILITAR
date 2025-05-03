<?php
class Database {
    private static $host = 'localhost:3306';
    private static $db_name = 'sistema_promocion';
    private static $username = 'root';
    private static $password = '1234';
    private static $conn;

    public static function connect() {
        if (!isset(self::$conn)) {
            self::$conn = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$db_name, self::$username, self::$password);
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$conn;
    }
}
?>