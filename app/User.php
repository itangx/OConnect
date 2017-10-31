<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class User extends Model implements AuthenticatableContract
{
    use Authenticatable;

    protected $table = 'corp_per_rel';

    protected $fillable = [
        'username', 'password'
    ];

    public function getAuthPassword() {
        return $this->password;
    }   
}
