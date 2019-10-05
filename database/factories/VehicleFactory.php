<?php

/** @var Factory $factory */

use App\Models\Location;
use App\Models\ModelVehicle;
use App\Models\TypeVehicle;
use App\Models\Vehicle;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Vehicle::class, function (Faker $faker) {
    return [
        'model_vehicle_id' => ModelVehicle::all()->random()->id,
        'location_id' => Location::all()->random()->id,
        'type_vehicle_id' => TypeVehicle::all()->random()->id,
        'current_kilometers' => $faker->randomNumber(5),
        'engine_size' => $faker->randomFloat(1, 1, 3),
        'fuel_type' => $faker->randomElement(['GASOIL', 'GASOLINE', 'ELECTRIC'])
    ];
});
