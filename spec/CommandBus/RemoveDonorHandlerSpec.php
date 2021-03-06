<?php

declare(strict_types = 1);

namespace spec\byrokrat\giroapp\CommandBus;

use byrokrat\giroapp\CommandBus\RemoveDonorHandler;
use byrokrat\giroapp\CommandBus\RemoveDonor;
use byrokrat\giroapp\Db\DonorRepositoryInterface;
use byrokrat\giroapp\Event\DonorRemoved;
use byrokrat\giroapp\Exception\InvalidStateTransitionException;
use byrokrat\giroapp\Model\Donor;
use byrokrat\giroapp\State\StateInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RemoveDonorHandlerSpec extends ObjectBehavior
{
    function let(DonorRepositoryInterface $donorRepository, EventDispatcherInterface $dispatcher)
    {
        $this->setDonorRepository($donorRepository);
        $this->setEventDispatcher($dispatcher);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(RemoveDonorHandler::CLASS);
    }

    function it_throws_on_non_prugeable_donors(Donor $donor, StateInterface $state)
    {
        $donor->getState()->willReturn($state);
        $state->isPurgeable()->willReturn(false);
        $this->shouldThrow(InvalidStateTransitionException::CLASS)->duringHandle(
            new RemoveDonor($donor->getWrappedObject())
        );
    }

    function it_removes_donors($donorRepository, $dispatcher, Donor $donor, StateInterface $state)
    {
        $donor->getState()->willReturn($state);
        $donor->getMandateKey()->willReturn('foo');
        $state->isPurgeable()->willReturn(true);

        $donorRepository->deleteDonor($donor)->shouldBeCalled();
        $dispatcher->dispatch(DonorRemoved::CLASS, Argument::type(DonorRemoved::CLASS))->shouldBeCalled();

        $this->handle(new RemoveDonor($donor->getWrappedObject()));
    }
}
