<?php
require_once __DIR__ . '/vendor/autoload.php';
// $dsn = 'mysql:host=database;database=php_pro_advanced';
require_once __DIR__ . '/Patterns/FabricMethod/index.php';

/*
try {
   $pdo = new PDO($dsn, 'root', '1603');
} catch (PDOException $exception) {
   dd ($exception);
}
*/

/*
use Overload\User;
use Overload\MethodNotFoundException;
try {
   $user = new User();
   $user -> setName ('Denys');
   $user -> setAge (24);
   $user -> setEmail ('denys@gmail.com');
============================
   $user -> setPhone ('123-456-7890');
} catch (MethodNotFoundException $e) {
   echo $e -> getMessage ();
}
print_r ($user -> getAll ());
*/
