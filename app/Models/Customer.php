<?php

namespace App\Models;


use App\Http\Resources\CustomerResource;
use App\User;

class Customer extends BaseModel
{
    protected $guarded = ['id'];

    public $relationships = [
        'rentals',
        'user'
    ];

    public $transformer = CustomerResource::class;

    public function rentals() {
        return $this->hasMany(Rental::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
