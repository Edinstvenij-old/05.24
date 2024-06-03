<?php

require_once dirname (__DIR__) . '/Core/Router.php';
require_once dirname (__DIR__) . '/Core/RequestMethod.php';
require_once dirname (__DIR__) . '/App/Controllers/BaseController.php';
require_once dirname (__DIR__) . '/App/Controllers/NotesController.php';

$router = new Router();

$router -> addRoute (RequestMethod::GET, '/api/v1/notes/{id}', 'NotesController', 'getNote');
$router -> addRoute (RequestMethod::POST, '/api/v1/notes', 'NotesController', 'createNote');
$router -> addRoute (RequestMethod::PUT, '/api/v1/notes/{id}', 'NotesController', 'updateNote');
$router -> addRoute (RequestMethod::DELETE, '/api/v1/notes/{id}', 'NotesController', 'deleteNote');

$router -> dispatch ();
