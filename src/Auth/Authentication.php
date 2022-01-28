<?php

namespace Jandrodev\Laratest\Auth;

use PHPUnit\Framework\Exception;

trait Authentication
{
    /**
     * @param array $attributes
     *
     * @return mixed
     */
    public function createUser(array $attributes = [])
    {
        $userModel = config('laratest.user_model');

        if (is_null($userModel)) {
            throw new Exception('You will publish the config file and check the User model namespace !');
        }

        return $userModel::factory()->create($attributes);
    }

    /**
     * @param array $attributes
     *
     * @return mixed
     */
    public function authUser(array $attributes = [])
    {
        $user = $this->createUser($attributes);
        $this->actingAs($user);

        return $user;
    }
}
