<?php

class RGBColor
{
   private $red;
   private $green;
   private $blue;

   public function __construct ($red, $green, $blue)
   {
      $this -> setRed ($red);
      $this -> setGreen ($green);
      $this -> setBlue ($blue);
   }

   public function getRed ()
   {
      return $this -> red;
   }

   public function setRed ($value)
   {
      if ($value < 0 || $value > 255) {
         throw new InvalidArgumentException();
      }
      $this -> red = $value;
   }

   public function getGreen ()
   {
      return $this -> green;
   }

   public function setGreen ($value)
   {
      if ($value < 0 || $value > 255) {
         throw new InvalidArgumentException();
      }
      $this -> green = $value;
   }

   public function getBlue ()
   {
      return $this -> blue;
   }

   public function setBlue ($value)
   {
      if ($value < 0 || $value > 255) {
         throw new InvalidArgumentException();
      }
      $this -> blue = $value;
   }

   public function equals ($other)
   {
      if (!($other instanceof RGBColor)) {
         return false;
      }
      return $this -> red === $other -> getRed () &&
         $this -> green === $other -> getGreen () &&
         $this -> blue === $other -> getBlue ();
   }

   public static function random ()
   {
      $red = rand (0, 255);
      $green = rand (0, 255);
      $blue = rand (0, 255);
      return new RGBColor($red, $green, $blue);
   }

   public function mix (...$colors)
   {
      $redSum = $this -> red;
      $greenSum = $this -> green;
      $blueSum = $this -> blue;
      $totalColors = 1;
      foreach ($colors as $color) {
         $redSum += $color -> getRed ();
         $greenSum += $color -> getGreen ();
         $blueSum += $color -> getBlue ();
         $totalColors ++;
      }
      $mixedRed = $redSum / $totalColors;
      $mixedGreen = $greenSum / $totalColors;
      $mixedBlue = $blueSum / $totalColors;
      return new RGBColor($mixedRed, $mixedGreen, $mixedBlue);
   }

   public function __toString ()
   {
      return sprintf ($this -> red, $this -> green, $this -> blue);
   }
}
