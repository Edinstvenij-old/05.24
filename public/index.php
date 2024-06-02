<?php

use App\Enums\Http\Status;
use Core\Router;

define ('BASE_DIR', dirname (__DIR__));

require_once BASE_DIR . '/vendor/autoload.php';

try {
   $response = Router::dispatch ($_SERVER['REQUEST_URI']);
   echo $response;
} catch (Throwable $exception) {
   $response = jsonResponse (
      Status::from ($exception->getCode()),
      [
         'errors' => [
            'message' => $exception->getMessage ()
         ]
      ]
   );
   echo $response;
}
