<?php

/*
 * This file is part of Laravel Hashids.
 *
 * (c) Vincent Klaiber <hello@vinkla.com>
 *  Adapted by Maru Amallo (amamarul) <ama_marul@hotmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Amamarul\Hashids\Support\Facades;

use Illuminate\Support\Facades\Facade;
use Amamarul\Hashids\Support\HashidsManager;

/**
 * This is the Hashids facade class.
 *
 * @author Vincent Klaiber <hello@vinkla.com>
 */
class Hashids extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return HashidsManager::class;
    }
}
