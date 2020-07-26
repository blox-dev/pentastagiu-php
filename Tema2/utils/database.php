<?php
    require_once("config.php");
    class Database
    {
        private static ?PDO $db_connection = NULL;

        private function __construct()
        {
            self::$db_connection = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME,DB_USER,DB_PASS);
        }

        public static function get_connection()
        {
            if (is_null(self::$db_connection)) {
                new Database();
            }
            return self::$db_connection;
        }
    }