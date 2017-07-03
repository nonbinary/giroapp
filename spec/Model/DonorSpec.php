<?php

declare(strict_types = 1);

namespace spec\byrokrat\giroapp\Model;

use byrokrat\giroapp\Model\Donor;
use byrokrat\giroapp\Model\DonorState\DonorState;
use byrokrat\autogiro\Writer\Writer;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use byrokrat\id\PersonalId;
use byrokrat\banking\AccountNumber;
use byrokrat\amount\Currency\SEK;
use byrokrat\giroapp\Model\PostalAddress;

class DonorSpec extends ObjectBehavior
{
    function let(DonorState $state, AccountNumber $account, PersonalId $id, PostalAddress $address)
    {

        $mandateSource = Donor::MANDATE_SOURCE_PAPER;
        $payerNumber = "00001";

        $this->beConstructedWith($state, $mandateSource, $payerNumber, $account, $id, $name, $address);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Donor::CLASS);
    }

    function it_contains_state($state)
    {
        $this->getState()->shouldEqual($state);
    }

    function it_can_change_state(DonorState $newState)
    {
        $this->getState()->shouldNotEqual($newState);
        $this->setState($newState);
        $this->getState()->shouldEqual($newState);
    }

    function it_contains_mandate_source()
    {
        $this->getMandateSource()->shouldEqual(Donor::MANDATE_SOURCE_PAPER);
    }

    function it_is_exportable_to_autogiro($state, Writer $writer)
    {
        $this->exportToAutogiro($writer);
        $state->export($this->getWrappedObject(), $writer)->shouldHaveBeenCalled();
    }
    
    function it_contains_an_id($id)
    {
        $this->getId()->shouldEqual($id);
    }

    function it_contains_an_uid()
    {
        $this->getUid()->shouldEqual(hash('sha256',$this->getId().$this->getAccount()));
    }

    function it_can_set_phone()
    {
        $newPhone = '+4670111111';
        $this->setPhone($newPhone);
        $this->getPhone()->shouldEqual($newPhone);
    }

    function it_can_set_email()
    {
        $newEmail = 'this@that.tld';
        $this->setEmail($newEmail);
        $this->getEmail()->shouldEqual($newEmail);
    }

    function it_can_set_donationAmount(SEK $newAmount)
    {
        $this->setDonationAmount($newAmount);
        $this->getDonationAmount()->shouldEqual($newAmount);
    }

    function it_has_an_address($address)
    {
        $this->getAddress()->shouldEqual($address);
    }
}
