<?php

namespace settings\entities\user\events;

use settings\entities\user\User;

class UserSignUpRequested
{
    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
}