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

namespace byrokrat\giroapp\Plugin;

final class ApiVersion
{
    /**
     * @var string
     */
    private $version;

    public function __construct($version = '$app_version$')
    {
        $this->version = $this->parseVersion($version);
    }

    public function getVersion(): string
    {
        return $this->version;
    }

    public function __toString(): string
    {
        return $this->getVersion();
    }

    private function parseVersion(string $version): string
    {
        if ('$'.'app_version'.'$' == $version) {
            return 'dev-master';
        }

        if (preg_match('/^([^-]+)-[^-]+-/', $version, $matches)) {
            return $matches[1] . '-dev';
        }

        return $version;
    }
}
