<?php

namespace App;

class Calculator
{
    public function operation($primeroperador, $operador, $segundoOperador)
    {
        $result = $primeroperador . $operador . $segundoOperador;
        eval('return '.$result.';');
    }
}
