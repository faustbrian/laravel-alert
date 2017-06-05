<?php


use BrianFaust\Alert\Alert;

if (!function_exists('alert')) {
    /**
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
