<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResetPasswordModel extends Model
{
    public $table = 'password_reset';

    protected $fillable = [
        'email', 'token','active'
    ];
}
