<?php

namespace App\Models;

use App\Company;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use SoftDeletes,HasApiTokens;
    public $incrementing = false;

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function companies()
    {
        return $this->belongsToMany(Company::class, 'company_user');
    }
}
