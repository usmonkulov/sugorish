<?php

namespace shop\jobs;

use settings\dispatchers\EventDispatcher;
use settings\jobs\AsyncEventJob;

class AsyncEventJobHandler
{
    private $dispatcher;

    public function __construct(EventDispatcher $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    public function handle(AsyncEventJob $job): void
    {
        $this->dispatcher->dispatch($job->event);
    }
}