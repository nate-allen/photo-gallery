<?php
// TODO: Make a better autoloader once we start using namespaces...
function photo_gallery_autoloader($class) {
    $class = strtolower( $class );
    $the_path = "includes/{$class}.php";

    if ( file_exists($the_path)) {
        require($the_path);
    } else {
        die("This file name {$class}.php was not found.");
    }
}
spl_autoload_register('photo_gallery_autoloader');