<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ReglaSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Regla');
    }
}
