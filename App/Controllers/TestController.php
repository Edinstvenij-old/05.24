<?php

require_once 'BaseController.php';

class TestController extends BaseController {
   public function before() {
      // Логіка перед основною дією
      error_log("Before action");
   }

   public function after($response) {
      // Логіка після основної дії
      error_log("After action");
      return parent::after($response);
   }

   public function getAction() {
      return ["message" => "GET request handled"];
   }

   public function postAction() {
      $data = json_decode(file_get_contents('php://input'), true);
      return ["message" => "POST request handled", "data" => $data];
   }
}
