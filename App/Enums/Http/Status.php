<?php

namespace App\Enums\Http;

enum Status: int
{
   case OK = 200;
   case CREATED = 201;
   case BAD_REQUEST = 400;
   case FORBIDDEN = 403;
   case NOT_FOUND = 404;
   case UNAUTHORIZED = 401;
   case METHOD_NOT_ALLOWED = 405;
   case UNPROCESSABLE_ENTITY = 422;
   case INTERNAL_SERVER_ERROR = 500;

   public function withDescription(): array
   {
      $description = match ($this) {
         self::OK => '200 OK',
         self::CREATED => '201 Created',
         self::BAD_REQUEST => '400 Bad Request',
         self::UNAUTHORIZED => '401 Unauthorized',
         self::FORBIDDEN => '403 Forbidden',
         self::NOT_FOUND => '404 Not Found',
         self::METHOD_NOT_ALLOWED => '405 Method Not Allowed',
         self::UNPROCESSABLE_ENTITY => '422 Unprocessable Entity',
         self::INTERNAL_SERVER_ERROR => '500 Internal Server Error',
      };

      return [
         'code' => $this->value,
         'status' => $description
      ];
   }
}
