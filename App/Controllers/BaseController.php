<?php

abstract class BaseController {
   public function before() {
      // Метод викликається перед виконанням основної дії
   }

   public function after($response) {
      // Метод викликається після виконання основної дії
      return $response;
   }
}
