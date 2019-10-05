<?php

/** @var Factory $factory */

use App\Models\Manufacturer;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Manufacturer::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'details' => $faker->paragraph
    ];
});
