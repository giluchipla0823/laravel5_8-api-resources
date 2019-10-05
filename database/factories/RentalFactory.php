<?php

/** @var Factory $factory */

use App\Models\Customer;
use App\Models\Rental;
use App\Models\RentalStatus;
use App\Models\Vehicle;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Rental::class, function (Faker $faker) {
    return [
        'rental_status_id' => RentalStatus::all()->random()->id,
        'vehicle_id' => Vehicle::all()->random()->id,
        'customer_id' => Customer::all()->random()->id,
        'from' => $faker->dateTime,
        'to' => $faker->dateTime,
    ];
});
