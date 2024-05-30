<?php

abstract class Car {
   abstract public function getModel();
   abstract public function getPrice();
}

class EconomyCar extends Car {
   public function getModel() {
      return "Daewoo Lanos";
   }

   public function getPrice() {
      return 50;
   }
}

class StandardCar extends Car {
   public function getModel() {
      return "Hyundai Sonata";
   }

   public function getPrice() {
      return 100;
   }
}

class LuxuryCar extends Car {
   public function getModel() {
      return "Mercedes-Maybach";
   }

   public function getPrice() {
      return 200;
   }
}

abstract class CarFactory {
   abstract public function createCar();
}

class EconomyCarFactory extends CarFactory {
   public function createCar() {
      return new EconomyCar();
   }
}

class StandardCarFactory extends CarFactory {
   public function createCar() {
      return new StandardCar();
   }
}

class LuxuryCarFactory extends CarFactory {
   public function createCar() {
      return new LuxuryCar();
   }
}

function getCar(CarFactory $factory) {
   $car = $factory->createCar();
   echo "Модель: " . $car->getModel() .'<br>';
   echo "Ціна: " . $car->getPrice() .'<br>'.'<hr>';
}

echo "Економ таксі: ".'<br>';
$economyFactory = new EconomyCarFactory();
getCar($economyFactory);

echo "Стандартне таксі: ".'<br>';
$standardFactory = new StandardCarFactory();
getCar($standardFactory);

echo "Люкс таксі: ".'<br>';
$luxuryFactory = new LuxuryCarFactory();
getCar($luxuryFactory);
