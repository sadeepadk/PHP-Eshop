<?php

// Ensure the class is not already declared before declaring it
if (!class_exists('Database')) {
    class Database
    {
        public static $connection;

        public static function setUpConnection()
        {
            if (!isset(self::$connection) || self::$connection->connect_error) {
                $host = "localhost";
                $username = "root";
                $password = "Sadeepa@2003";
                $database = "ne_db";
                $port = "3306";

                self::$connection = new mysqli($host, $username, $password, $database, $port);

                if (self::$connection->connect_error) {
                    die("Connection failed: " . self::$connection->connect_error);
                }
            }
        }

        public static function iud($query)
        {
            self::setUpConnection();
            // Accessing the $connection property using self::$connection
            self::$connection->query($query);

            if (self::$connection->error) {
                die("Query failed: " . self::$connection->error);
            }
        }

        public static function search($query)
        {
            self::setUpConnection();
            // Accessing the $connection property using self::$connection
            $resultset = self::$connection->query($query);

            if ($resultset === false) {
                die("Query failed: " . self::$connection->error);
            }

            return $resultset;
        }

        public static function closeConnection()
        {
            if (isset(self::$connection)) {
                // Accessing the $connection property using self::$connection
                self::$connection->close();
            }
        }
    }
}

?>