<?php

class User {

    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;

    public static function find_all_users() {

        return self::find_this_query("SELECT * FROM `users`");

    }


    public static function find_user_by_id( $id ) {

        $values = array(
            ":id" => $id,
            ":limit" => 1
        );

        $results = self::find_this_query("SELECT * FROM `users` WHERE `id` = :id LIMIT :limit", $values);

        return ( !empty($results) ) ? $results[0] : false;

    }

    public static function find_this_query($sql, $params = array()) {

        $database = Database::get_instance();
        $dbh = $database->get_connection();
        $results_array = array();

        $result = $database->query($sql, $params);

        for ($i = 0, $length = count($result); $i < $length; $i++) {
            $results_array[] = self::instantiation($result[$i]);
        }

        return $results_array;

    }


    public static function instantiation( $user_record ) {

        $user_object = new self;

        foreach ($user_record as $property => $value) {
            if (property_exists($user_object, $property)) {
                $user_object->$property = $value;
            }
        }

        return $user_object;

    }

    public static function verify_user( $username, $password ) {

        $values = array(
            ":username" => $username,
            ":password" => $password,
            ":limit" => 1
        );

        $sql  = "SELECT * FROM `users` WHERE `username` = :username AND `password` = :password LIMIT :limit";

        $results = self::find_this_query($sql, $values);

        return ( !empty($results) ) ? $results[0] : false;

    }

}