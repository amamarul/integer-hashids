<?php

/*
 * This file is part of Laravel Hashids.
 *
 * (c) Vincent Klaiber <hello@vinkla.com>
 * Adapted by Maru Amallo (amamarul) <ama_marul@hotmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Amamarul\Hashids\Support;

use Amamarul\Hashids\Support\Manager\AbstractManager;
use Illuminate\Contracts\Config\Repository;

/**
 * This is the Hashids manager class.
 *
 * @author Vincent Klaiber <hello@vinkla.com>
 */
class HashidsManager extends AbstractManager
{
    /**
     * The factory instance.
     *
     * @var \Amamarul\Hashids\Support\Hashids\HashidsFactory
     */
    private $factory;

    /**
     * Create a new Hashids manager instance.
     *
     * @param \Illuminate\Contracts\Config\Repository $config
     * @param \Amamarul\Hashids\Support\Hashids\HashidsFactory $factory
     *
     * @return void
     */
    public function __construct(Repository $config, HashidsFactory $factory)
    {
        parent::__construct($config);

        $this->factory = $factory;
    }

    /**
     * Create the connection instance.
     *
     * @param array $config
     *
     * @return mixed
     */
    protected function createConnection(array $config)
    {
        return $this->factory->make($config);
    }

    /**
     * Get the configuration name.
     *
     * @return string
     */
    protected function getConfigName()
    {
        return 'hashids';
    }

    /**
     * Get the factory instance.
     *
     * @return \Amamarul\Hashids\Support\Hashids\HashidsFactory
     */
    public function getFactory()
    {
        return $this->factory;
    }
}
