<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\CommunityResurrectionRule;
use App\KillAction;
use App\Cell;
use App\NullAction;

class CommunityResurrectionTest extends TestCase
{
  protected $rule;

  public function setUp()
  {
      $this->rule = new CommunityResurrectionRule();
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
  public function it_apply_rule_less_than_2_return_dead(){
      $cell = new Cell();
      $cell->addNeighbours(new Cell(true));
      $cell->addNeighbours(new Cell(true));
      $action = $this->rule->apply($cell);
      $this->assertSame($cell,$action->getCell());
  }

  /**
   * @test
   */
  public function it_ressurrects_when_neighbours_are_2_or_less(){
      $cell = $this->createCell(2);
      $action = $this->rule->apply($cell);
      $this->assertSame($cell,$action->getCell());
  }

  /**
   * @test
   */
  public function it_returns_nullAction_when_nwighbours_is_less_than_two_or_more_then_three(){
      $cell = $this->createCell(2);
      $action = $this->rule->apply($cell);
      $this->assertSame($cell,$action->getCell());
  }

  /**
   * @test
   */
  public function it_returns_nullAction_when_nwighbours_is_more_then_three(){
      $cell = $this->createCell(1);
      $action = $this->rule->apply($cell);
      $this->assertInstanceOf('App\NullAction',$action);
      $this->assertSame($cell,$action->getCell());
  }


  public function createCell($numberOfAliveNeighbours){
    $cell = new Cell();
    for($i=1; $i<=$numberOfAliveNeighbours; $i++){
      $cell->addNeighbours(new Cell(true));
    }
    return $cell;
  }
}
