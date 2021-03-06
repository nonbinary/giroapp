<?php

declare(strict_types = 1);

namespace spec\byrokrat\giroapp\Validator;

use byrokrat\giroapp\Validator\PostalCodeValidator;
use byrokrat\giroapp\Exception\ValidatorException;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PostalCodeValidatorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(PostalCodeValidator::CLASS);
    }

    function it_returns_valid_content()
    {
        $this->validate('', '123 45')->shouldReturn('12345');
        $this->validate('', "123\n45")->shouldReturn('12345');
        $this->validate('', '')->shouldReturn('');
    }

    function it_throws_on_invalid_content()
    {
        $this->shouldThrow(ValidatorException::CLASS)->duringValidate('', 'not-a-number');
    }
}
