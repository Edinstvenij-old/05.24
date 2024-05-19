<?php
namespace App\Controllers;

use App\Classes\Order;
use App\Classes\User;

class UsersController
{

   public function __construct()
   {
      var_dump (static::class);
      echo '<br>';
   }

   public function __invoce()
   {
      $order = new User();
      $order = new Order();
   }

}
