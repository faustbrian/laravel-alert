<?php

declare(strict_types=1);

/*
 * This file is part of Laravel Alert.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Tests\Alert\Facades;

use BrianFaust\Alert\Alert;
use BrianFaust\Alert\Facades\Alert as Facade;
use BrianFaust\Tests\Alert\AbstractTestCase;
use GrahamCampbell\TestBenchCore\FacadeTrait;

class AlertTest extends AbstractTestCase
{
    use FacadeTrait;

    /**
     * Get the facade accessor.
     *
     * @return string
     */
    protected function getFacadeAccessor()
    {
        return 'alert';
    }

    /**
     * Get the facade class.
     *
     * @return string
     */
    protected function getFacadeClass()
    {
        return Facade::class;
    }

    /**
     * Get the facade root.
     *
     * @return string
     */
    protected function getFacadeRoot()
    {
        return Alert::class;
    }
}
