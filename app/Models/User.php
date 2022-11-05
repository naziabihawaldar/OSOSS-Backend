<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Model
{
    use LaratrustUserTrait;
    use SoftDeletes;
    public function companies()
    {
        return $this->belongsToMany(Company::class, 'company_user');
    }
}
