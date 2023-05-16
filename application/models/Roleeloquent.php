<?php

use \Illuminate\Database\Eloquent\Model as Eloquent;

class RoleEloquent extends Eloquent{
    
    protected $table = 't_roles';
    //protected $dateFormat = 'Ymd H:i:s';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'rolename',
        'slug',
        'description',
        'level'
    ];


}
