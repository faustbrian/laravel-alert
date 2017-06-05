<?php

namespace BrianFaust\Tests\Alert\Facades;

use BrianFaust\Alert\Facades\Alert;
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
        return \BrianFaust\Alert\Facades\Alert::class;
    }

    /**
     * Get the facade root.
     *
     * @return string
     */
    protected function getFacadeRoot()
    {
        return \BrianFaust\Alert\Alert::class;
    }
}
