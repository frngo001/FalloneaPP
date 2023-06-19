<?php

/**
 * Autoload function for dynamically loading PHP classes.
 *
 * This autoload function is registered using `spl_autoload_register` and
 * is responsible for loading the necessary PHP class files based on the
 * requested class name.
 */
spl_autoload_register(function($class_name) {
    $path = __DIR__ . '/lib/';
    require_once ('C:\Users\saturn\Desktop\Digitale_Anamnese 2\Digitale_Anamnese\lib\PhpOffice\PhpWord\Shared\ZipArchive.php');
    require_once $path.$class_name.'.php';
    // require_once ('C:\Users\saturn\Desktop\Digitale_Anamnese 2\Digitale_Anamnese\lib\PhpOffice\PhpWord\Media.php');
    // require_once ('C:\Users\saturn\Desktop\Digitale_Anamnese 2\Digitale_Anamnese\lib\PhpOffice\PhpWord\Style.php');

});

?>