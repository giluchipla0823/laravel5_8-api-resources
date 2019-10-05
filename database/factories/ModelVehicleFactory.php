<?php

/** @var Factory $factory */

use App\Models\ModelVehicle;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(ModelVehicle::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'daily_hire_rate' => $faker->randomFloat(2, 10, 100)
    ];
});
