<?php

use \Illuminate\Database\Eloquent\Model as Eloquent;

class AdminEloquent extends Eloquent{
    protected $table = 't_admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username','email','password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'birthdate' => 'datetime:Y-m-d',
        'status' => 'boolean'
    ];

    public static function getAdminBy($column, $value)
    {
        return AdminEloquent::where($column, '=',$value)->first();
    }


}