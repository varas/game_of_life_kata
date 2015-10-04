<?php

class gol
{

    private $reglas;

    function __construct($reglas)
    {
        $this->reglas = $reglas;
    }

    public function ejecuta(Tablero $tablero, $nIteraciones)
    {
        for ($iteracionActual = 0; $iteracionActual < $nIteraciones; $iteracionActual++)
        {
            $tablero = $tablero->aplicarReglas($this->reglas);
        }

        return $tablero;
    }
}
