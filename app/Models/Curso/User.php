<?php

namespace App\Models\Curso;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public static $rules = [
    'name' => 'required|min:2|max:10',
    'email' => 'required|min:2',
    'password' => 'required',
    ];
}
