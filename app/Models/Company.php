<?php

namespace App;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;
    public $incrementing = false;
    public function users()
    {
        return $this->belongsToMany(User::class, 'company_user');
    }
}
