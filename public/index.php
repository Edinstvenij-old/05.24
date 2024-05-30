<?php

define('BASE_DIR', dirname(__DIR__));
require_once BASE_DIR . '/vendor/autoload.php';

use App\Enums\Http\Status;

echo jsonResponse(Status::METHOD_NOT_ALLOWED, ['message' => 'Method Not Allowed']);
exit;
