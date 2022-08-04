<?php
    class db{
        protected $connection;

        function setConnection() {
            try {
                $this->connection = new PDO("mysql:host=localhost;dbname=library_management_system", "root", "");  //here the username is by default root.
                // echo "Connected to database";
            }
            catch(PDOException $e) {
                echo "Error";
            }
        }
    }



?>