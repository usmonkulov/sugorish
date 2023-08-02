<?php

namespace settings\entities;

interface AggregateRoot
{
    /**
     * @return array
     */
    public function releaseEvents(): array;
}