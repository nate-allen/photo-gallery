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

        return ( !empty($results) ) ? $results[0] : false;

    }


    static function find_this_query( $query ) {

        $database = Database::get_instance();
        $dbh = $database->get_connection();

        $results = $dbh->query( $query );
        $results_array = $results->fetchAll(PDO::FETCH_ASSOC);

        // Convert array to object
        $object_array = array();
        foreach ( $results_array as $array ) {
            $object = new stdClass();
            foreach ($array as $key => $value) {
                $object->$key = $value;
            }
            $object_array[] = $object;
        }

        return $object_array;

    }

    static function instantiation( $user_record ) {

        $user_object = new self;

        foreach ($user_record as $property => $value) {
            if ( $user_object->has_property( $property ) ) {
                $user_object->$property = $value;
            }
        }

        return $user_object;

    }

    private function has_property( $property ) {

        return property_exists($this, $property);

    }

}