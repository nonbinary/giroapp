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
 * Copyright 2016-17 Hannes Forsgård
 */

declare(strict_types = 1);

namespace byrokrat\giroapp\Mapper\Schema;

use byrokrat\giroapp\Model\Donor;
use byrokrat\giroapp\Mapper\Schema\PostalAddressSchema;
use byrokrat\giroapp\State\StatePool;
use byrokrat\giroapp\Utils\SystemClock;
use byrokrat\banking\AccountFactory;
use byrokrat\id\IdFactory;
use byrokrat\amount\Currency\SEK;
use hanneskod\yaysondb\Expression\ExpressionInterface;
use hanneskod\yaysondb\Operators as y;

/**
 * Maps Donor objects to arrays
 */
class DonorSchema
{
    /**
     * Schema type identifier
     */
    const TYPE = 'giroapp/donor:alpha2';

    /**
     * @var PostalAddressSchema
     */
    private $addressSchema;

    /**
     * @var StatePool
     */
    private $statePool;

    /**
     * @var AccountFactory
     */
    private $accountFactory;

    /**
     * @var IdFactory
     */
    private $idFactory;

    /**
     * @var SystemClock
     */
    private $systemClock;

    public function __construct(
        PostalAddressSchema $postalAddressSchema,
        StatePool $statePool,
        AccountFactory $accountFactory,
        IdFactory $idFactory,
        SystemClock $systemClock
    ) {
        $this->addressSchema = $postalAddressSchema;
        $this->statePool = $statePool;
        $this->accountFactory = $accountFactory;
        $this->idFactory = $idFactory;
        $this->systemClock = $systemClock;
    }

    public function toArray(Donor $donor): array
    {
        return [
            'type' => self::TYPE,
            'mandate_key' => $donor->getMandateKey(),
            'state' => $donor->getState()->getStateId(),
            'mandate_source' => $donor->getMandateSource(),
            'payer_number' => $donor->getPayerNumber(),
            'account' => $donor->getAccount()->getNumber(),
            'donor_id' => $donor->getDonorId()->format('S-sk'),
            'name' => $donor->getName(),
            'address' => $this->addressSchema->toArray($donor->getPostalAddress()),
            'email' => $donor->getEmail(),
            'phone' => $donor->getPhone(),
            'donation_amount' => $donor->getDonationAmount()->getAmount(),
            'comment' => $donor->getComment(),
            'created' => $donor->getCreated()->format(\DateTime::W3C),
            'updated' => $donor->getUpdated()->format(\DateTime::W3C),
            'attributes' => $donor->getAttributes()
        ];
    }

    public function fromArray(array $doc): Donor
    {
        return new Donor(
            $doc['mandate_key'],
            $this->statePool->getState($doc['state']),
            $doc['mandate_source'],
            $doc['payer_number'],
            $this->accountFactory->createAccount($doc['account']),
            $this->idFactory->create($doc['donor_id']),
            $doc['name'],
            $this->addressSchema->fromArray($doc['address']),
            $doc['email'],
            $doc['phone'],
            new SEK($doc['donation_amount']),
            $doc['comment'],
            isset($doc['created']) ? new \DateTimeImmutable($doc['created']) : $this->systemClock->getNow(),
            isset($doc['updated']) ? new \DateTimeImmutable($doc['updated']) : $this->systemClock->getNow(),
            $doc['attributes'] ?? []
        );
    }
}
