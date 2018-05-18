<?php

namespace App;

class CommunityResurrectionRule extends AbstractRule {

  public function apply(Cell $cell){
    $liveNeighbours = $this->getNumberAliveNeighbours($cell);

    if(in_array($liveNeighbours, array(2,3))){
      $ressurectionAction = new ResurrectAction($cell);
      $ressurectionAction->execute($cell);
      return $ressurectionAction;
    }

    $nullAction = new NullAction($cell);
    $nullAction->execute($cell);
    return $nullAction;
  }
}
