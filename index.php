<?php

require_once __DIR__ . '/vendor/autoload.php';

use Overload\User;
use Overload\MethodNotFoundException;

try {
   $user = new User();
   $user -> setName ('Denys');
   $user -> setAge (24);
   $user -> setEmail ('denys@gmail.com');

   $user -> setPhone ('123-456-7890');
} catch (MethodNotFoundException $e) {
   echo $e -> getMessage ();
}

print_r ($user -> getAll ());
