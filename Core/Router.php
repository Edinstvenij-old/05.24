<?php

class Router {
   private $routes = [];

   public function addRoute($method, $path, $controller, $action) {
      $this->routes[] = [
         'method' => $method,
         'path' => $path,
         'controller' => $controller,
         'action' => $action
      ];
   }

   public function dispatch($method, $uri) {
      foreach ($this->routes as $route) {
         if ($route['method'] == $method && $route['path'] == $uri) {
            $controller = new $route['controller']();
            $controller->before();
            $response = call_user_func([$controller, $route['action']]);
            $response = $controller->after($response);
            header('Content-Type: application/json');
            echo json_encode($response);
            return;
         }
      }
      http_response_code(404);
      echo json_encode(['error' => 'Not Found']);
   }
}
