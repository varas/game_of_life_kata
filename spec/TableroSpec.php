<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TableroSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Tablero');
    }

    function let()
    {
        $estado = [
            [0,0],
            [0,0],
        ];
        $this->beConstructedWith($estado);
    }
}
