<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserContact extends Model
{
    protected $table = 'user_contact';

    public function userContact()
    {
        return $this->belongsTo('App\User');
    }

}
