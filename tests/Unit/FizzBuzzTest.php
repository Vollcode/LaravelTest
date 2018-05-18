<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\FizzBuzz;

class FizzBuzzTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

     public function testNumberNotDividedByThreeOrFiveReturnNumber()
     {
         $game = new FizzBuzz();

         $result = $game->FizzBuzzGame(4);

         $this->assertEquals($result,4);
     }
    public function testNumberDividedByThreeReturnsFizz()
    {
        $game = new FizzBuzz();

        $result = $game->isFizz(3);

        $this->assertEquals($result,"Fizz");
    }

    public function testNumberDividedByFiveReturnsBuzz()
    {
        $game = new FizzBuzz();

        $result = $game->isBuzz(5);

        $this->assertEquals($result,"Buzz");
    }

    public function testNumberDividedByThreeAndFiveReturnsFizzBuzz()
    {
        $game = new FizzBuzz();

        $result = $game->isFizzBuzz(15);

        $this->assertEquals($result,"FizzBuzz");
    }


    /**
    *@dataProvider FizzBuzzNumberProvider
    */
    public function testExampleBatteryFizzBuzz($value,$expected)
    {
        $game = new FizzBuzz();

        $result = $game->FizzBuzzGame($value);

        $this->assertEquals($expected,$result);
    }

    public function FizzBuzzNumberProvider(){
      return[
        [3,"Fizz"],
        [5,"Buzz"],
        [15,"FizzBuzz"],
        [4,4]
      ];
    }
}
