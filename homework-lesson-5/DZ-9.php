<?php

interface FormatStrategy
{
   public function format($string);
}

class RawFormat implements FormatStrategy
{
   public function format($string)
   {
      return $string;
   }
}

class WithDateFormat implements FormatStrategy
{
   public function format($string)
   {
      return date('Y-m-d H:i:s') . $string;
   }
}

class WithDateAndDetailsFormat implements FormatStrategy
{
   public function format($string)
   {
      return date('Y-m-d H:i:s') . $string . ' - З деякими деталями';
   }
}

interface DeliveryStrategy
{
   public function deliver($formattedString);
}

class EmailDelivery implements DeliveryStrategy
{
   public function deliver($formattedString)
   {
      echo "Виведення формату ({$formattedString}) по email";
   }
}

class SmsDelivery implements DeliveryStrategy
{
   public function deliver($formattedString)
   {
      echo "Виведення формату ({$formattedString}) в sms";
   }
}

class ConsoleDelivery implements DeliveryStrategy
{
   public function deliver($formattedString)
   {
      echo "Виведення формату ({$formattedString}) в консоль";
   }
}

class Logger
{
   private $formatStrategy;
   private $deliveryStrategy;

   public function __construct(FormatStrategy $formatStrategy, DeliveryStrategy $deliveryStrategy)
   {
      $this->formatStrategy = $formatStrategy;
      $this->deliveryStrategy = $deliveryStrategy;
   }

   public function log($string)
   {
      $formattedString = $this->formatStrategy->format($string);
      $this->deliveryStrategy->deliver($formattedString);
   }
}

$logger = new Logger(new RawFormat(), new SmsDelivery());
$logger->log('Emergency error! Please fix me!');
