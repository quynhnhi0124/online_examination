<?php

namespace App;

use App\Helpers\StringHelper;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    public $table='users';
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname','lastname','username', 'email', 'password','mobile','role','status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Mutator function
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = StringHelper::hash($password);
    }

    public static function scopeSearchByKeyword($query, $keyword)
    {
        if($keyword != " "){
            $query->where(function ($query) use ($keyword){
                $query->where("firstname", "LIKE", "%$keyword%")
                        ->orWhere("lastname", "LIKE", "%$keyword%")
                        ->orWhere("username", "LIKE", "%$keyword%")
                        ->orWhere("email", "LIKE", "%$keyword%")
                        ->orWhere("mobile", "LIKE", "%$keyword%");
            });
        }
        return $query;
    }

}
