<?php

class User {

    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;

    static function find_all_users() {

        return self::find_this_query( "SELECT * FROM users" );

    }


    static function find_user_by_id( $id ) {

        $results = self::find_this_query( "SELECT * FROM users WHERE id=$id LIMIT 1" );
        return $results[0];

    }


    static public function find_this_query( $query ) {

        global $database;

        $results = $database->query( $query );
        return $results->fetchAll(PDO::FETCH_ASSOC);

    }

    static function instantiation() {

        $user_object = new self;

        $user_object->id         = $found_user['id'];
        $user_object->username   = $found_user['username'];
        $user_object->password   = $found_user['password'];
        $user_object->first_name = $found_user['first_name'];
        $user_object->last_name  = $found_user['last_name'];

        return $user_object;

    }

}