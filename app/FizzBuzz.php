<?php

namespace App;

class Fizzbuzz
{

  const FIZZ_FACTOR = 3;
  const BUZZ_FACTOR = 5;


  public function FizzBuzzGame($valor)
  {
      switch ($valor) {
    case $valor%self::FIZZ_FACTOR==0&&$valor%self::BUZZ_FACTOR==0:
        return "FizzBuzz";
        break;
    case $valor%self::BUZZ_FACTOR==0:
        return "Buzz";
        break;
    case $valor%self::FIZZ_FACTOR==0:
        return "Fizz";
        break;
    default:
        return $valor;
      }
  }

  public function isFizz($valor){
    if($valor%self::FIZZ_FACTOR==0) return "Fizz";
  }

  public function isBuzz($valor){
    if($valor%self::BUZZ_FACTOR==0) return "Buzz";
  }

  public function isFizzBuzz($valor){
    if($valor%self::FIZZ_FACTOR==0&&$valor%self::BUZZ_FACTOR==0) return "FizzBuzz";
  }
}
