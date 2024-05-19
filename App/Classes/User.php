<?php

namespace Overload;

class User {
   private $name;
   private $age;
   private $email;

   private function setName($name) {
      $this->name = $name;
   }

   private function setAge($age) {
      $this->age = $age;
   }

   private function setEmail($email) {
      $this->email = $email;
   }

   public function __call($name, $arguments) {
      if (method_exists($this, $name) && strpos($name, 'set') === 0) {
         call_user_func_array([$this, $name], $arguments);
      } else {
         throw new MethodNotFoundException("Method '$name' does not exist.");
      }
   }

   public function getAll() {
      return [
         'name' => $this->name,
         'age' => $this->age,
         'email' => $this->email
      ];
   }
}
