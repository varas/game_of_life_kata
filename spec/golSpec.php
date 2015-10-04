<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Regla;
use Tablero;

class golSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('gol');
    }

    function let(Regla $regla)
    {
        $this->beConstructedWith([$regla]);
    }

    function it_devuelve_el_mismo_estado_de_tablero_en_0_iteraciones(Tablero $tablero)
    {
        $this->ejecuta($tablero, $nIteraciones = 0)->shouldReturn($tablero);
    }

    function it_mata_celulas_si_menos_de_2_vecinos_vivos()
    {
        $tablero = new Tablero([
            [0,1],
            [0,1],
        ]);

        $tableroEsperado = new Tablero([
            [0,0],
            [0,0],
        ]);

        $this->ejecuta($tablero, $nIteraciones = 1)->shouldReturn($tableroEsperado);
    }
}
