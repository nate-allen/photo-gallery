<?php

require_once("configuration.php");

class Database {

    public $connection;


    function __construct() {

        $this->open_db_connection();

    }


    public function open_db_connection() {

        try {
            $this->connection = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo $e->getMessage();
            die('Could not connect!');
        }

    }


    public function query($sql) {

        $result = $this->connection->query($sql);

        $this->confirm_query($result);

        return $result;

    }


    private function confirm_query($result) {

        if(!$result) {
            die("Query failed");
        }

    }


    public function escape_string($string) {

        return $this->connection->quote($string);

    }


    public function the_insert_id() {

        return $this->connection->lastInsertId();

    }

}

$database = new Database();