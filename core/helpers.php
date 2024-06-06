<?php

use App\Enums\Http\Status;
use Core\DB;

function db (): PDO
{
   return DB ::connect ();
}

function jsonResponse (Status $status, array $data = []): string
{
   header_remove ();
   http_response_code ($status -> value);
   header ("Content-Type: application/json");
   header ("Status: $status->value");

   return json_encode ([
      ...$status -> withDescription (),
      'data' => $data
   ]);

   if (!function_exists ('jsonResponse')) {
      function jsonResponse ($status, $data)
      {
         http_response_code ($status);
         header ('Content-Type: application/json');
         echo json_encode ($data);
      }
   }

}
