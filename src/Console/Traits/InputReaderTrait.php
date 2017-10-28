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

namespace byrokrat\giroapp\Console\Traits;

use byrokrat\giroapp\Console\Helper\InputReader;
use byrokrat\giroapp\Console\Helper\Validators;
use byrokrat\giroapp\Console\Helper\QuestionFactory;

/**
 * Dependencies for reading user input
 */
trait InputReaderTrait
{
    /**
     * @var InputReader
     */
    protected $inputReader;

    /**
     * @var Validators
     */
    protected $validators;

    /**
     * @var QuestionFactory
     */
    protected $questionFactory;

    /**
     * @required
     */
    public function setInputReader(InputReader $inputReader)
    {
        $this->inputReader = $inputReader;
    }

    /**
     * @required
     */
    public function setValidators(Validators $validators)
    {
        $this->validators = $validators;
    }

    /**
     * @required
     */
    public function setQuestionFactory(QuestionFactory $questionFactory)
    {
        $this->questionFactory = $questionFactory;
    }
}
