<?php

namespace Jandrodev\Laratest;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Collection;
use Jandrodev\Laratest\Auth\Authentication;
use Tests\TestCase;

class FeatureBaseTest extends TestCase
{
    use Authentication, RefreshDatabase;

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
}
