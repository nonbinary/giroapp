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

namespace byrokrat\giroapp\CommandBus;

use byrokrat\giroapp\Model\Donor;

/**
 * Force donor to enter state, ignoring validating checks
 */
class ForceDonorState extends DonorAwareCommand
{
    /** @var string */
    private $newStateId;

    public function __construct(Donor $donor, string $newStateId)
    {
        parent::__construct($donor);
        $this->newStateId = $newStateId;
    }

    public function getNewStateId(): string
    {
        return $this->newStateId;
    }
}
