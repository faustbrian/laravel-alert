<?php

declare(strict_types=1);

/*
 * This file is part of Laravel Alert.
 *
 * (c) Brian Faust <hello@basecode.sh>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Artisanry\Tests\Alert;

use Artisanry\Alert\Alert;

class AlertTest extends AbstractTestCase
{
    /** @test */
    public function can_flash()
    {
        $this->getAlert()->flash('flash_message');

        $this->assertFlash('flash_message', 'info');
    }

    /** @test */
    public function can_flash_error()
    {
        $this->getAlert()->error('error_message');

        $this->assertFlash('error_message', 'danger');
    }

    /** @test */
    public function can_flash_info()
    {
        $this->getAlert()->info('info_message');

        $this->assertFlash('info_message', 'info');
    }

    /** @test */
    public function can_flash_success()
    {
        $this->getAlert()->success('success_message');

        $this->assertFlash('success_message', 'success');
    }

    /** @test */
    public function can_flash_warning()
    {
        $this->getAlert()->warning('warning_message');

        $this->assertFlash('warning_message', 'warning');
    }

    private function getAlert()
    {
        return new Alert($this->app['session.store']);
    }

    private function assertFlash(string $message, string $level)
    {
        $this->assertArraySubset(
            compact('message', 'level'),
            $this->app->session->get('alert.messages')[0]
        );
    }
}
