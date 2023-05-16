<?php

use \Illuminate\Database\Eloquent\Model as Eloquent;

class PostulateJobEloquent extends Eloquent{
    
    protected $table = 't_postulatejob';
    //protected $dateFormat = 'Ymd H:i:s';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'offer_id',
        'route_filecv',
        'msg_postulant',
        'result',
        'email_notification',
        'date_postulation',
        'review',
        'filecv'
    ];


}
