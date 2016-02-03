<?php
// TODO: Make a better autoloader once we start using namespaces...
function photo_gallery_autoloader($class) {
    $class = strtolower( $class );
    $the_path = "includes/{$class}.php";

    if ( is_readable($the_path) ) {
        try {
            require( $the_path );
        } catch (Exception $e) {
            print_r($e);
        }
    }
}
spl_autoload_register('photo_gallery_autoloader');

// Start the session
$session = new Session();