<?php

/** @var Factory $factory */

use App\Models\Customer;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Customer::class, function (Faker $faker) {
    return [
        'user_id' => User::all()->random()->id
    ];
});
