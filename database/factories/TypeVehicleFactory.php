<?php

/** @var Factory $factory */

use App\Models\TypeVehicle;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(TypeVehicle::class, function (Faker $faker) {
    return [
        'name' => $faker->century,
    ];
});
