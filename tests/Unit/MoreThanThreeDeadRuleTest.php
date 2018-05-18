<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\MoreThanThreeDeadRule;
use App\KillAction;
use App\Cell;
use App\NullAction;

class MoreThanThreeDeadRuleTest extends TestCase
{
  protected $rule;

  public function setUp()
  {
      $this->rule = new MoreThanThreeDeadRule();
  }
  /**
   * @test
   */
  public function it_implemented_ruleInterface(){
      $this->assertInstanceOf('App\RuleInterface',$this->rule);
  }

  /**
   * @test
   */
  public function it_implemented_abstractRuleClass(){

      $this->assertInstanceOf('App\AbstractRule', $this->rule);
  }

  /**
   * @test
   */
  public function it_neighbours_over_population_it_has_to_die(){
      $cell = $this->createCell(4);
      $action = $this->rule->apply($cell);
      $this->assertInstanceOf('App\KillAction',$action);

      $this->assertSame($cell,$action->getCell());
  }

  /**
   * @test
   */
  public function it_neighbours_over_population_less_than_three_return_Null_Action(){
      $cell = $this->createCell(1);
      $action = $this->rule->apply($cell);
      $this->assertInstanceOf('App\NullAction',$action);
  }


  public function createCell($numberOfAliveNeighbours){
    $cell = new Cell();
    for($i=1; $i<=$numberOfAliveNeighbours; $i++){
      $cell->addNeighbours(new Cell(true));
    }
    return $cell;
  }
}
