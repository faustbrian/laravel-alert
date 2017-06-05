<?php

namespace BrianFaust\Alert;

use Illuminate\Session\Store;
use Illuminate\Support\MessageBag;

class Alert
{
    /**
     * @var Store
     */
    private $session;

    /**
     * @var array
     */
    private $messages;

    /**
     * \BrianFaust\Alert\Alert constructor.
     *
     * @param Store $session
     */
    public function __construct(Store $session)
    {
        $this->session = $session;
    }

    /**
     * @param $message
     * @param null $title
     *
     * @return \BrianFaust\Alert\Alert
     */
    public function success($message, $title = null): self
    {
        return $this->flash($message, config('laravel-alert.classes.success'), $title);
    }

    /**
     * @param $message
     * @param null $title
     *
     * @return \BrianFaust\Alert\Alert
     */
    public function info($message, $title = null): self
    {
        return $this->flash($message, config('laravel-alert.classes.info'), $title);
    }

    /**
     * @param $message
     * @param null $title
     *
     * @return \BrianFaust\Alert\Alert
     */
    public function warning($message, $title = null): self
    {
        return $this->flash($message, config('laravel-alert.classes.warning'), $title);
    }

    /**
     * @param $message
     * @param null $title
     *
     * @return \BrianFaust\Alert\Alert
     */
    public function error($message, $title = null): self
    {
        return $this->flash($message, config('laravel-alert.classes.error'), $title);
    }

    /**
     * @return $this
     */
    public function important(): self
    {
        $this->session->alert('alert.important', true);

        return $this;
    }

    /**
     * @param $message
     * @param string $title
     *
     * @return \BrianFaust\Alert\Alert
     */
    public function overlay($message, $title = 'Notice'): self
    {
        return $this->flash($message, 'info', $title, true);
    }

    /**
     * @param string $message
     * @param string $level
     * @param string $title
     * @param bool   $overlay
     *
     * @return $this
     */
    public function flash($message, string $level = 'info', ?string $title = 'Notice', bool $overlay = false): self
    {
        if (is_array($message)) {
            $message = new MessageBag($message);
        }

        $values = $this->session->get('alert.messages', []);
        $values[] = compact('message', 'level', 'title', 'overlay');
        $this->session->flash('alert.messages', $values);

        return $this;
    }
}
