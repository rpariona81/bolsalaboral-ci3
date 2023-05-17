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
}
