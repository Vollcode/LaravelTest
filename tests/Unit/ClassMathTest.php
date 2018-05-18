<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\MathClass;

class ClassMathTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testPar(){
      $mathClass = new MathClass;

      $result = $mathClass->esPar(4);

      $this->assertTrue($result);
    }

    public function testPrimo(){
      $mathClass = new MathClass;

      $result = $mathClass->esPrimo(4);

      $this->assertTrue($result);
    }
}
