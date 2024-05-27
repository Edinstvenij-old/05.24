<?php

interface Eater
{
   public function eat();
}

interface Flyer
{
   public function fly();
}

class Swallow implements Eater, Flyer
{
   public function eat()
   {
      // реалізація їжі для ластівки
   }

   public function fly()
   {
      // реалізація польоту для ластівки
   }
}

class Ostrich implements Eater
{
   public function eat()
   {
      // реалізація їжі для страуса
   }

   // Страус не реалізує метод fly(), оскільки він не літає.
}
