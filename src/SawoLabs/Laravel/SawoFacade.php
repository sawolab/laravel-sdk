<?php

namespace SawoLabs\Laravel;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \SawoLabs\Laravel\Contracts\Provider driver(string $driver = null)
 *
 * @see \SawoLabs\Laravel\SawoManager
 */
class SawoFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Sawo';
    }
}
