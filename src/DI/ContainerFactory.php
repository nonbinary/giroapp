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

namespace byrokrat\giroapp\DI;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Config\FileLocator;

/**
 * Create the dependency injection container
 */
class ContainerFactory
{
    /**
     * Path to dependency configuration directory
     */
    const CONTAINER_DIR = __DIR__ . '/../../etc';

    /**
     * Name of file containing container spec
     */
    const CONTAINER_FILE_NAME = 'container.yaml';

    /**
     * @param string $option      Optional user directory from cli option
     * @param string $environment Optional user directory from environment
     */
    public function createContainer(string $option = '', string $environment = ''): ContainerInterface
    {
        $container = new ContainerBuilder();

        $loader = new YamlFileLoader($container, new FileLocator(self::CONTAINER_DIR));
        $loader->load(self::CONTAINER_FILE_NAME);

        $container->setParameter(
            'user.dir',
            (new UserDirectoryLocator)->locateUserDirectory($option, $environment)
        );

        $container->addCompilerPass(new EventListenerPass);
        $container->compile();

        return $container;
    }
}