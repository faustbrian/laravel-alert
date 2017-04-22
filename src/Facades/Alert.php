<?php



declare(strict_types=1);

namespace BrianFaust\Alert\Facades;

use Illuminate\Support\Facades\Facade;

class Alert extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'alert';
    }
}
