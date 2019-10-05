<?php

namespace App\Models;

use Carbon\Carbon;

class Rental extends BaseModel
{
    protected $guarded = ['id'];

    public $timestamps = false;

    public $relationships = [
        'vehicle',
        'customer',
        'rental_status'
    ];

    public function vehicle() {
        return $this->belongsTo(Vehicle::class);
    }

    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    public function rental_status() {
        return $this->belongsTo(RentalStatus::class);
    }

    public function getFromAttribute(string $value): string {
        return Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('d/m/Y H:i:s');
    }

    public function getToAttribute(string $value): string {
        return Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('d/m/Y H:i:s');
    }
}
