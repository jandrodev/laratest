<?php

namespace Jandrodev\Laratest;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Collection;
use PHPUnit\Framework\Exception;
use Tests\TestCase;

class FeatureBaseTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @param $model
     * @param array $attributes
     *
     * @return mixed
     */
    public function createModel($model, array $attributes = [])
    {
        return $model::factory()->create($attributes);
    }

    /**
     * @param $model
     * @param int $count
     * @param array $attributes
     *
     * @return Collection
     */
    public function createModels($model, int $count = 1, array $attributes = []): Collection
    {
        return $model::factory()->count($count)->create($attributes);
    }

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
