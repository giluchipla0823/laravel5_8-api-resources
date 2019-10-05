<?php

use App\Models\Customer;
use App\Models\Location;
use App\Models\Manufacturer;
use App\Models\ModelVehicle;
use App\Models\Rental;
use App\Models\RentalStatus;
use App\Models\TypeVehicle;
use App\Models\Vehicle;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 1)->create([
            'email' => 'webmaster@gmail.com',
            'password' => bcrypt('secret')
        ]);

        factory(User::class, 10)->create()->each(function (User $user) {
            factory(Customer::class, 1)->create(['user_id' => $user->id]);
        });

        factory(TypeVehicle::class, 1)->create(['name' => 'COCHE']);
        factory(TypeVehicle::class, 1)->create(['name' => 'MOTO']);

        factory(Location::class, 15)->create();

        factory(Manufacturer::class, 10)->create()->each(function (Manufacturer $manufacturer) {
            factory(ModelVehicle::class, 1)->create([ 'manufacturer_id' => $manufacturer->id]);
            factory(Vehicle::class, 5)->create();
        });

        factory(RentalStatus::class, 1)->create(['status' => 'RENTED']);
        factory(RentalStatus::class, 1)->create(['status' => 'AVAILABLE']);

        factory(Rental::class, 50)->create();
    }
}
