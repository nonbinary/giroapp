<?php

declare(strict_types = 1);

namespace spec\byrokrat\giroapp\State;

use byrokrat\giroapp\State\MandateApprovedState;
use byrokrat\giroapp\State\StateInterface;
use byrokrat\giroapp\States;
use byrokrat\giroapp\Model\Donor;
use byrokrat\giroapp\Builder\DateBuilder;
use byrokrat\autogiro\Writer\Writer;
use byrokrat\amount\Currency\SEK;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MandateApprovedStateSpec extends ObjectBehavior
{
    function let(DateBuilder $dateBuilder)
    {
        $this->beConstructedWith($dateBuilder);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(MandateApprovedState::CLASS);
    }

    function it_implements_the_state_interface()
    {
        $this->shouldHaveType(StateInterface::CLASS);
    }

    function it_contains_an_id()
    {
        $this->getStateId()->shouldEqual(States::MANDATE_APPROVED);
    }

    function it_contains_next_id()
    {
        $this->getNextStateId()->shouldEqual(States::ACTIVE);
    }

    function it_contains_a_description()
    {
        $this->getDescription()->shouldBeString();
    }

    function it_is_exportable()
    {
        $this->shouldBeExportable();
    }

    function it_does_not_export_without_an_amount(Donor $donor, Writer $writer, SEK $amount)
    {
        $amount->isPositive()->willReturn(false);
        $donor->getDonationAmount()->willReturn($amount);
        $writer->addMonthlyTransaction(Argument::cetera())->shouldNotBeCalled();
        $this->export($donor, $writer);
    }

    function it_can_be_exported($dateBuilder, Donor $donor, Writer $writer, SEK $amount, \DateTime $date)
    {
        $amount->isPositive()->willReturn(true);

        $donor->getDonationAmount()->willReturn($amount);
        $donor->getPayerNumber()->willReturn('payer_number');
        $donor->getMandateKey()->willReturn('mandate_key');

        $dateBuilder->buildDate()->willReturn($date);

        $this->export($donor, $writer);

        $writer->addMonthlyTransaction('payer_number', $amount, $date, 'mandate_key')->shouldHaveBeenCalled();
    }
}
