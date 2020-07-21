<?php
    class Database
    {
        private static $db_connection = NULL;

        public static function get_connection()
        {
            if (is_null(self::$db_connection)) {
                self::$db_connection = new PDO('mysql:host=localhost;dbname=test','root','');
            }
            return self::$db_connection;
        }
    }