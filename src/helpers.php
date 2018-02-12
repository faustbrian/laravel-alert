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

use BrianFaust\Alert\Alert;

if (!function_exists('alert')) {
    /**
     * Flash an alert.
     *
     * @param string|null $message
     * @param string|null $style
     *
     * @return \BrianFaust\Alert\Alert
     */
    function alert(string $message = null, string $style = 'info'): Alert
    {
        $alert = app('alert');

        if (is_null($message)) {
            return $alert;
        }

        return $alert->flash($message, $style);
    }
}
