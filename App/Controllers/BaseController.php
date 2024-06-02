<?php

abstract class BaseController {
   public function before() {

   }

   public function after($response) {

      return $response;
   }
}
