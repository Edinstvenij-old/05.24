<?php

// require_once __DIR__ . '/scripts/function.php';
// require_once __DIR__ . '/info.php';
// require_once 'velueObject.php';

// $color = RGBColor::random();

// echo "<div style='width: 100px; height: 100px; background-color: {$color};'></div>";

// require __DIR__ . '/vendor/autoload.php';

use Overload\User;
use Overload\MethodNotFoundException;

try {
   $user = new User();
   $user -> setName ('John Doe');
   $user -> setAge (30);
   $user -> setEmail ('john.doe@example.com');

   // Спроба викликати неіснуючий метод
   $user -> setPhone ('123-456-7890');
} catch (MethodNotFoundException $e) {
   echo $e -> getMessage ();
}

// Виведення даних користувача
print_r ($user -> getAll ());
