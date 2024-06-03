<?php

require_once 'BaseController.php';

class NotesController extends BaseController {
   private $notes = [];

   public function __construct() {
      // Ініціалізація масиву для прикладу
      $this->notes = [
         1 => ['id' => 1, 'content' => 'Note 1'],
         2 => ['id' => 2, 'content' => 'Note 2'],
      ];
   }

   public function getNote($id) {
      if (isset($this->notes[$id])) {
         return $this->notes[$id];
      } else {
         http_response_code(404);
         return ['error' => "Note with ID $id not found"];
      }
   }

   public function createNote() {
      $data = json_decode(file_get_contents('php://input'), true);
      if (isset($data['content']) && !empty($data['content'])) {
         $id = count($this->notes) + 1;
         $this->notes[$id] = ['id' => $id, 'content' => $data['content']];
         return ['message' => 'Note created', 'note' => $this->notes[$id]];
      } else {
         http_response_code(400);
         return ['error' => 'Invalid input: content is required'];
      }
   }

   public function updateNote($id) {
      $data = json_decode(file_get_contents('php://input'), true);
      if (isset($this->notes[$id])) {
         if (isset($data['content']) && !empty($data['content'])) {
            $this->notes[$id]['content'] = $data['content'];
            return ['message' => "Note with ID $id updated", 'note' => $this->notes[$id]];
         } else {
            http_response_code(400);
            return ['error' => 'Invalid input: content is required'];
         }
      } else {
         http_response_code(404);
         return ['error' => "Note with ID $id not found"];
      }
   }

   public function deleteNote($id) {
      if (isset($this->notes[$id])) {
         unset($this->notes[$id]);
         return ['message' => "Note with ID $id deleted"];
      } else {
         http_response_code(404);
         return ['error' => "Note with ID $id not found"];
      }
   }
}
