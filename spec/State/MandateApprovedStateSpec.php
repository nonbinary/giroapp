<?php

declare(strict_types = 1);

namespace spec\byrokrat\giroapp\State;

use byrokrat\giroapp\State\MandateApprovedState;
use byrokrat\giroapp\State\ExportableStateInterface;
use byrokrat\giroapp\State\StateInterface;
use byrokrat\giroapp\State\TransactionDateFactory;
use byrokrat\giroapp\States;
use byrokrat\giroapp\Model\Donor;
use byrokrat\autogiro\Writer\WriterInterface;
use byrokrat\amount\Currency\SEK;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MandateApprovedStateSpec extends ObjectBehavior
{
    function let(TransactionDateFactory $dateFactory)
    {
        $this->beConstructedWith($dateFactory);
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

    function it_contains_a_description()
    {
        $this->getDescription()->shouldBeString();
    }

    function it_is_exportable()
    {
        $this->shouldHaveType(ExportableStateInterface::CLASS);
    }

    function it_does_not_export_without_an_amount(Donor $donor, WriterInterface $writer, SEK $amount)
    {
        $amount->isPositive()->willReturn(false);
        $donor->getDonationAmount()->willReturn($amount);
        $writer->addMonthlyPayment(Argument::cetera())->shouldNotBeCalled();
        $this->exportToAutogiro($donor, $writer);
    }

    function it_can_be_exported($dateFactory, Donor $donor, WriterInterface $writer, SEK $amount)
    {
        $amount->isPositive()->willReturn(true);

        $donor->getDonationAmount()->willReturn($amount);
        $donor->getPayerNumber()->willReturn('payer_number');
        $donor->getMandateKey()->willReturn('mandate_key');

        $date = new \DateTimeImmutable;
        $dateFactory->createNextTransactionDate()->willReturn($date);

        $this->exportToAutogiro($donor, $writer)->shouldReturn(States::ACTIVE);

        $writer->addMonthlyPayment('payer_number', $amount, $date, 'mandate_key')->shouldHaveBeenCalled();
    }

    function it_is_not_active()
    {
        $this->shouldNotBeActive();
    }

    function it_is_not_awaiting_response()
    {
        $this->shouldNotBeAwaitingResponse();
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
