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
                $dbPath = __DIR__. '/../database/financas.db';
                self::$conn = new PDO('sqlite:'. $dbPath, null, null, [
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                ]);
            } catch (PDOException $e) {
                throw new RuntimeException("Erro na conexão: ". $e->getMessage(), 0, $e);
            }
        }
        return self::$conn;
    }
}