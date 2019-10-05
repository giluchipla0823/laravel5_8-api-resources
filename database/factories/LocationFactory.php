<?php

/** @var Factory $factory */

use App\Models\Location;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Location::class, function (Faker $faker) {
    return [
        'name' => $faker->country
    ];
});
