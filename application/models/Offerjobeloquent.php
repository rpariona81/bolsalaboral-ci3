<?php

use \Illuminate\Database\Eloquent\Model as Eloquent;

class OfferJobEloquent extends Eloquent{
    
    protected $table = 't_offersjob';
    //protected $dateFormat = 'Ymd H:i:s';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'type_offer',
        'detail',
        'vacancy_numbers',
        'date_publish',
        'date_vigency',
        'career_id',
    ];

    protected $dates = ['date_publish','date_vigency', 'updated_at'];

    protected $casts = [
        'date_publish' => 'datetime:Y-m-d',
        'status' => 'boolean',
        'vacancy_numbers' => 'integer'
    ];

    public static function getOffersjobs()
    {
        //return PostulateJobEloquent::where('user_id', '=',$user_id)->get();
        return OfferJobEloquent::join('t_careers', 't_offersjob.career_id','=','t_careers.id')
            ->orderBy('t_offersjob.date_publish','desc')
            ->get();
    }
}
