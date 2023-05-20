<?php

use \Illuminate\Database\Eloquent\Model as Eloquent;
use \Illuminate\Database\Capsule\Manager as DB;
class UserEloquent extends Eloquent{
    protected $table = 't_users';

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
        'is_admin' => 'boolean',
    ];

    public static function getUserBy($column, $value)
    {
        return UserEloquent::where($column, '=',$value)->first();
    }

    public static function getUserEstudiantes()
    {
        $data = DB::select('SELECT t1.id, t1.name, t1.paternal_surname, t1.maternal_surname, t1.document_type, t4.document_type_label, t1.document_number, t1.address, t1.mobile, t1.gender, t1.birthdate, t1.status, t1.role_id, t3.rolename, t1.career_id, t2.career_title, t1.graduated, t1.username FROM t_users t1 LEFT JOIN t_careers t2 ON t1.career_id=t2.id LEFT JOIN t_roles t3 ON t1.role_id=t3.id LEFT JOIN t_document_type t4 ON t1.document_type = t4.id WHERE t1.role_id=4');
        return $data;    
    }

    public static function getUserDocentes()
    {
        $data = DB::select('SELECT t1.id, t1.name, t1.paternal_surname, t1.maternal_surname, t1.document_type, t4.document_type_label, t1.document_number, t1.address, t1.mobile, t1.gender, t1.birthdate, t1.status, t1.role_id, t3.rolename, t1.career_id, t2.career_title, t1.graduated, t1.username FROM t_users t1 LEFT JOIN t_careers t2 ON t1.career_id=t2.id LEFT JOIN t_roles t3 ON t1.role_id=t3.id LEFT JOIN t_document_type t4 ON t1.document_type = t4.id WHERE t1.role_id=3');
        return $data;    
    }


}