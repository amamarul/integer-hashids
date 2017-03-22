<?php

/*
 * This file is part of Laravel Manager.
 *
 * (c) Graham Campbell <graham@alt-three.com>
 * Adapted by Maru Amallo (amamarul) <ama_marul@hotmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Amamarul\Hashids\Support\Manager;

/**
 * This is the connector interface.
 *
 * @author Graham Campbell <graham@alt-three.com>
 */
interface ConnectorInterface
{
    /**
     * Establish a connection.
     *
     * @param array $config
     *
     * @return object
     */
    public function connect(array $config);
}
