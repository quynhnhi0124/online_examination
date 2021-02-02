<?php

use Illuminate\Support\Facades\Hash;

if(!function_exists('hashInput')){
    function hashInput($input){
        return Hash::make($input);
    }
}