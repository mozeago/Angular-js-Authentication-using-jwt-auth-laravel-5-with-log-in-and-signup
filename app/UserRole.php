<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $table = 'role';

    public function userRole()
    {
        return $this->hasOne('App\UserDetail', 'role_id');
    }
}
