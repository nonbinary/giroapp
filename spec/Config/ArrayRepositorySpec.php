<?php

declare(strict_types = 1);

namespace spec\byrokrat\giroapp\Config;

use byrokrat\giroapp\Config\ArrayRepository;
use byrokrat\giroapp\Config\RepositoryInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ArrayRepositorySpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith([]);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(ArrayRepository::CLASS);
    }

    function it_is_a_repository()
    {
        $this->shouldHaveType(RepositoryInterface::CLASS);
    }

    function it_contains_configs()
    {
        $this->beConstructedWith(['foo' => 'bar']);
        $this->getConfigs()->shouldReturn(['foo' => 'bar']);
    }
}
