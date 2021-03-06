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

namespace byrokrat\giroapp\Listener;

use byrokrat\giroapp\AutogiroVisitor;
use byrokrat\giroapp\Event\FileEvent;
use byrokrat\giroapp\Exception\InvalidAutogiroFileException;
use byrokrat\autogiro\Parser\ParserInterface;
use byrokrat\autogiro\Exception as AutogiroException;

/**
 * Listener that parses autogiro files
 */
class AutogiroImportingListener
{
    /**
     * @var ParserInterface
     */
    private $parser;

    /**
     * @var AutogiroVisitor
     */
    private $visitor;

    public function __construct(ParserInterface $parser, AutogiroVisitor $visitor)
    {
        $this->parser = $parser;
        $this->visitor = $visitor;
    }

    public function onAutogiroFileImported(FileEvent $event): void
    {
        try {
            $this->parser->parse($event->getFile()->getContent())->accept($this->visitor);
        } catch (AutogiroException $e) {
            throw new InvalidAutogiroFileException("Invalid autogiro file: {$e->getMessage()}");
        }
    }
}
