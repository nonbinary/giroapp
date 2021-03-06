<?php

declare(strict_types = 1);

namespace spec\byrokrat\giroapp\State;

use byrokrat\giroapp\State\MandateSentState;
use byrokrat\giroapp\State\StateInterface;
use byrokrat\giroapp\States;
use byrokrat\giroapp\Model\Donor;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MandateSentStateSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(MandateSentState::CLASS);
    }

    function it_implements_the_state_interface()
    {
        $this->shouldHaveType(StateInterface::CLASS);
    }

    function it_contains_an_id()
    {
        $this->getStateId()->shouldEqual(States::MANDATE_SENT);
    }

    function it_contains_a_description()
    {
        $this->getDescription()->shouldBeString();
    }

    function it_is_not_active()
    {
        $this->shouldNotBeActive();
    }

    function it_is_awaiting_response()
    {
        $this->shouldBeAwaitingResponse();
    }

    function it_is_not_error()
    {
        $this->shouldNotBeError();
    }

    function it_is_not_purgeable()
    {
        $this->shouldNotBePurgeable();
    }

    function it_is_not_paused()
    {
        $this->shouldNotBePaused();
    }
}
