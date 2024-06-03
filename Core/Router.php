<?php

class Router {
   private $routes = [];

   public function addRoute($method, $path, $controller, $action) {
      $path = preg_replace('/\{[a-zA-Z0-9_]+\}/', '([a-zA-Z0-9_]+)', $path);
      $this->routes[] = [
         'method' => $method,
         'path' => $path,
         'controller' => $controller,
         'action' => $action,
      ];
   }

   public function dispatch() {
      $requestMethod = $_SERVER['REQUEST_METHOD'];
      $requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

      foreach ($this->routes as $route) {
         if ($route['method'] === $requestMethod && preg_match('#^' . $route['path'] . '$#', $requestUri, $matches)) {
            array_shift($matches);

            $controllerName = $route['controller'];
            $actionName = $route['action'];

            require_once dirname(__DIR__) . "/App/Controllers/{$controllerName}.php";
            $controller = new $controllerName();
            $controller->before();
            $response = $controller->$actionName(...$matches);
            $controller->after();

            header('Content-Type: application/json');
            echo json_encode($response);
            return;
         }
      }

      http_response_code(404);
      echo json_encode(['error' => 'Page not found']);
   }
}
