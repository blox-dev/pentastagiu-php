<?php
    class Database
    {
        private static $db_connection = NULL;

        private function __construct()
        {
            self::$db_connection = new PDO('mysql:host=localhost;dbname=test','root','');
        }

        public static function get_connection()
        {
            if (is_null(self::$db_connection)) {
                new Database();
            }
            return self::$db_connection;
        }
    }