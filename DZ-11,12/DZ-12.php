<?php

class Contact {
   private $name;
   private $surname;
   private $email;
   private $phone;
   private $address;

   private function __construct() {}

   public static function builder() {
      return new ContactBuilder();
   }

   public function getName() {
      return $this->name;
   }

   public function getSurname() {
      return $this->surname;
   }

   public function getEmail() {
      return $this->email;
   }

   public function getPhone() {
      return $this->phone;
   }

   public function getAddress() {
      return $this->address;
   }

   public static function fromBuilder(ContactBuilder $builder) {
      $contact = new self();
      $contact->name = $builder->name;
      $contact->surname = $builder->surname;
      $contact->email = $builder->email;
      $contact->phone = $builder->phone;
      $contact->address = $builder->address;
      return $contact;
   }
}

class ContactBuilder {
   public $name;
   public $surname;
   public $email;
   public $phone;
   public $address;

   public function name($name) {
      $this->name = $name;
      return $this;
   }

   public function surname($surname) {
      $this->surname = $surname;
      return $this;
   }

   public function email($email) {
      $this->email = $email;
      return $this;
   }

   public function phone($phone) {
      $this->phone = $phone;
      return $this;
   }

   public function address($address) {
      $this->address = $address;
      return $this;
   }

   public function build() {
      return Contact::fromBuilder($this);
   }
}

$contact = Contact::builder()
   ->phone('000-777-000')
   ->name("Тарас")
   ->surname("Бульба")
   ->email("TarasBulba@email.com")
   ->address("Ukraine")
   ->build();

echo "Name: " . $contact->getName() .'<br>';
echo "Surname: " . $contact->getSurname() .'<br>';
echo "Email: " . $contact->getEmail() .'<br>';
echo "Phone: " . $contact->getPhone() .'<br>';
echo "Address: " . $contact->getAddress() .'<br>';
