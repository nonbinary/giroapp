<?php
/**
 * This file is part of byrokrat\giroapp.
 *
 * byrokrat\giroapp is free software: you can redistribute it and/or
 * modify it under the terms of the GNU General Public License as published
 * by the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * byrokrat\giroapp is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with byrokrat\giroapp. If not, see <http://www.gnu.org/licenses/>.
 *
 * Copyright 2016-19 Hannes Forsgård
 */

declare(strict_types = 1);

namespace byrokrat\giroapp\Model\Builder;

use byrokrat\giroapp\Exception\UnableToBuildDonorException;
use byrokrat\giroapp\MandateSources;
use byrokrat\giroapp\Model\Donor;
use byrokrat\giroapp\State\StateInterface;
use byrokrat\giroapp\State\StateCollection;
use byrokrat\giroapp\States;
use byrokrat\giroapp\Model\PostalAddress;
use byrokrat\giroapp\Utils\SystemClock;
use byrokrat\id\IdInterface;
use byrokrat\banking\AccountNumber;
use byrokrat\amount\Currency\SEK;

/**
 * Build donors from input
 */
class DonorBuilder
{
    /**
     * @var MandateKeyFactory
     */
    private $keyFactory;

    /**
     * @var StateCollection;
     */
    private $stateCollection;

    /**
     * @var SystemClock
     */
    private $systemClock;

    /**
     * @var string
     */
    private $mandateSource;

    /**
     * @var string
     */
    private $payerNumber;

    /**
     * @var IdInterface
     */
    private $id;

    /**
     * @var AccountNumber
     */
    private $account;

    /**
     * @var string
     */
    private $name;

    /**
     * @var ?PostalAddress
     */
    private $postalAddress;

    /**
     * @var string
     */
    private $email = '';

    /**
     * @var string
     */
    private $phone = '';

    /**
     * @var string
     */
    private $comment = '';

    /**
     * @var array
     */
    private $attributes = [];

    /**
     * @var ?SEK
     */
    private $donationAmount;

    public function __construct(
        MandateKeyFactory $keyFactory,
        StateCollection $stateCollection,
        SystemClock $systemClock
    ) {
        $this->keyFactory = $keyFactory;
        $this->stateCollection = $stateCollection;
        $this->systemClock = $systemClock;
    }

    /**
     * Reset builder to initial state
     */
    public function reset(): self
    {
        unset($this->mandateSource);
        unset($this->payerNumber);
        unset($this->id);
        unset($this->account);
        unset($this->name);
        unset($this->postalAddress);
        $this->email = '';
        $this->phone = '';
        $this->comment = '';
        $this->attributes = [];
        $this->donationAmount = null;
        return $this;
    }

    /**
     * Use one of the donor mandate source constants
     */
    public function setMandateSource(string $mandateSource): self
    {
        $this->mandateSource = $mandateSource;
        return $this;
    }

    public function setPayerNumber(string $payerNumber): self
    {
        $this->payerNumber = $payerNumber;
        return $this;
    }

    public function setId(IdInterface $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function setAccount(AccountNumber $account): self
    {
        $this->account = $account;
        return $this;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function setPostalAddress(PostalAddress $postalAddress): self
    {
        $this->postalAddress = $postalAddress;
        return $this;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;
        return $this;
    }

    public function setDonationAmount(SEK $amount): self
    {
        $this->donationAmount = $amount;
        return $this;
    }

    public function setComment(string $comment): self
    {
        $this->comment = $comment;
        return $this;
    }

    public function setAttribute(string $key, string $value): self
    {
        $this->attributes[$key] = $value;
        return $this;
    }

    public function buildDonor(): Donor
    {
        return new Donor(
            $this->keyFactory->createMandateKey($this->getId(), $this->getAccount()),
            $this->getState(),
            'Mandate created',
            $this->getMandateSource(),
            $this->getPayerNumber(),
            $this->getAccount(),
            $this->getId(),
            $this->getName(),
            $this->getPostalAddress(),
            $this->email,
            $this->phone,
            $this->getDonationAmount(),
            $this->comment,
            $this->systemClock->getNow(),
            $this->systemClock->getNow(),
            $this->attributes
        );
    }

    private function getMandateSource(): string
    {
        if (!isset($this->mandateSource)) {
            throw new UnableToBuildDonorException('Unable to build Donor, mandate source not set');
        }

        return $this->mandateSource;
    }

    private function getId(): IdInterface
    {
        if (isset($this->id)) {
            return $this->id;
        }

        throw new UnableToBuildDonorException('Unable to build Donor, id not set');
    }

    private function getAccount(): AccountNumber
    {
        if (isset($this->account)) {
            return $this->account;
        }

        throw new UnableToBuildDonorException('Unable to build Donor, account not set');
    }

    private function getState(): StateInterface
    {
        switch ($this->getMandateSource()) {
            case MandateSources::MANDATE_SOURCE_PAPER:
            case MandateSources::MANDATE_SOURCE_ONLINE_FORM:
                return $this->stateCollection->getState(States::NEW_MANDATE);
            case MandateSources::MANDATE_SOURCE_DIGITAL:
                return $this->stateCollection->getState(States::NEW_DIGITAL_MANDATE);
        }

        throw new UnableToBuildDonorException('Unable to build donor, invalid donor state');
    }

    private function getPayerNumber(): string
    {
        if (isset($this->payerNumber)) {
            return $this->payerNumber;
        }

        return $this->getId()->format('Ssk');
    }

    private function getName(): string
    {
        if (isset($this->name)) {
            return $this->name;
        }

        throw new UnableToBuildDonorException('Unable to build Donor, name not set');
    }

    private function getPostalAddress(): PostalAddress
    {
        return $this->postalAddress ?: new PostalAddress('', '', '', '', '');
    }

    private function getDonationAmount(): SEK
    {
        return $this->donationAmount ?: new SEK('0');
    }
}
