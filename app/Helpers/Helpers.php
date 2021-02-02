<?php

namespace App\Helpers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class StringHelper
{
    public static function hashInput($input){
        return Hash::make($input);
    }

    public static function createToken(){
        return (string) Str::uuid();
    }
}
