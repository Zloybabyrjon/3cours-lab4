<?php

namespace Egor\Interfaces;

use DateTimeImmutable;
use Egor\Interfaces\Notification;

abstract class AbstractNotification implements Notification
{
    protected string $status;
    protected DateTimeImmutable $timestamp;

    public function __construct()
    {
        $this->timestamp = new DateTimeImmutable(); 
    }

    abstract public function send(string $message): void;

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getTimestamp(): DateTimeImmutable
    {
        return $this->timestamp;
    }
}
