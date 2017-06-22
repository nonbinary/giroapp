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

namespace byrokrat\giroapp\Plugin;

/**
 * Defines the interface for giroapp plugins
 */
interface PluginInterface
{
    /**
     * Get a list of events this plugin listens to
     *
     *	See Events for a list of available event names
     *
     * @return string[]
     */
    public function listensTo(): array;

    /**
     * Setup plugin
     *
     * Use this method to pull in external dependencies
     */
    public function setup();

    /**
     * Execute plugin when a requested event has been fired
     */
    public function execute(Payload $payload);
}
