<?php

require_once("configuration.php");

class Database {

    private $connection;
    private static $_instance;

    private function __construct() {
        $this->open_db_connection();
    }


    public static function get_instance() {
        if(!self::$_instance) {
            self::$_instance = new self();
        }
        return self::$_instance;
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


    public function get_connection() {
        return $this->connection;
    }


    // Empty "clone" magic method to prevent duplication
    private function __clone() {

    }


    public function __destruct() {
        $this->connection = null;
    }

}