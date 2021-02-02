<?php

namespace App\Helpers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class StringHelper
{
    public static function hash($input){
        return Hash::make($input);
    }

    public static function generateUnique(){
        return (string) Str::uuid();
    }
}
