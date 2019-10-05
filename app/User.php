<?php

namespace App;

use App\Helpers\DateFormatHelper;
use App\Http\Resources\UserResource;
use App\Traits\BaseModelTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, BaseModelTrait;

    public $transformer = UserResource::class;
    public $relationships = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Aplicar formato de fecha al campo "email_verified_at"
     *
     * @param string|null $value
     * @return string|null
     */
    public function getEmailVerifiedAtAttribute(?string $value): ?string {
        if($value){
            return DateFormatHelper::convertFromSQLToSpecifiedFormat($value);
        }

        return NULL;
    }
}
