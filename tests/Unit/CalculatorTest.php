<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Calculator;

class CalculatorTest extends TestCase
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

    public function operacionTest()
    {
      $calculator = new Calculator;

      $result = $calculator->operacion(4,"+",5);

      $this->assertEquals(9,$result);
    }
}
