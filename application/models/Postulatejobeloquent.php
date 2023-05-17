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

    protected $dates = ['date_postulation','created_at', 'updated_at'];


    public static function getPostulations($user_id)
    {
        //return PostulateJobEloquent::where('user_id', '=',$user_id)->get();
        return PostulateJobEloquent::join('t_offersjob', 't_postulatejob.offer_id','=','t_offersjob.id')
            ->where('t_postulatejob.user_id', '=',$user_id)
            ->orderBy('t_postulatejob.date_postulation','desc')
            ->get();
    }

}
