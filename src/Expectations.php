<?php

declare(strict_types=1);

namespace Pest\Laravel;

use Illuminate\Database\Eloquent\Model;
use Pest\Expectation;

/*
 * Asserts that the value is an instance of \Illuminate\Support\Collection
 */
expect()->extend('toBeCollection', function (): Expectation {
    // @phpstan-ignore-next-line
    return $this->toBeInstanceOf(\Illuminate\Support\Collection::class);
});

/*
 * Asserts that the value is a model and that it references the same underlying model instance
 */
expect()->extend('toBeSameModel', function (Model $model): Expectation {
    return $this->toBeInstanceOf(Model::class)
        ->and($model->is($this->value))
        ->toBeTrue();
});
