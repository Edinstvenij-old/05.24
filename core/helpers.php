<?php

use App\Enums\Http\Status;

function jsonResponse(Status $status, array $data = []): string
{
   header_remove();
   http_response_code($status->value);
   header('Content-Type: application/json');
   $description = $status->withDescription()['status'];
   header("Status: $description");

   return json_encode(array_merge([
      'code' => $status->value,
      'status' => $description,
      'data' => $data
   ], $status->withDescription()));
}
