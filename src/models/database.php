<?php

class Database
{
    private static $conn;

    private function __construct()
    {
    }

    public static function getConn()
    {
        if (is_null(self::$conn)) {
            try {
                self::$conn = new PDO('sqlite:' . __DIR__ . '/../database/financas.db', null, null, [
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                ]);
                echo "Conexão bem-sucedida";
            } catch (PDOException $e) {
                die("Erro na conexão: " . $e->getMessage());
            }
        }
        return self::$conn;
    }
}