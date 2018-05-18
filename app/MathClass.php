<?php

namespace App;

class MathClass
{
    public function esPar($numero)
    {
        return $numero % 2 == 0?true:false;
    }

    public function esPrimo($numero)
    {
        return ($numero%$numero==0 && $numero%1==0)?true:false;
    }
}
