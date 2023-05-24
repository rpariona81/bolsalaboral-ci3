<?php

use \Illuminate\Database\Eloquent\Model as Eloquent;

class PostulateJobEloquent extends Eloquent
{

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

    protected $dates = ['date_postulation', 'created_at', 'updated_at'];

    protected $casts = [
        'date_publish' => 'datetime:Y-m-d',
        'status' => 'boolean'
    ];

    public static function getPostulations($user_id)
    {
        //return PostulateJobEloquent::where('user_id', '=',$user_id)->get();
        return PostulateJobEloquent::join('t_offersjob', 't_postulatejob.offer_id', '=', 't_offersjob.id')
            ->where('t_postulatejob.user_id', '=', $user_id)
            ->orderBy('t_postulatejob.date_postulation', 'desc')
            ->get();
    }

    public static function getPostulation($id)
    {
        //return PostulateJobEloquent::where('user_id', '=',$user_id)->get();
        return PostulateJobEloquent::leftjoin('t_offersjob', 't_postulatejob.offer_id', '=', 't_offersjob.id')
            ->leftjoin('t_users', 't_postulatejob.user_id', '=', 't_users.id')
            ->leftjoin('t_careers', 't_offersjob.career_id', '=', 't_careers.id')
            ->select('t_postulatejob.id','t_postulatejob.user_id','t_postulatejob.offer_id','t_offersjob.career_id','t_postulatejob.msg_postulant','t_postulatejob.result','t_postulatejob.date_postulation','t_postulatejob.review','t_postulatejob.status','t_postulatejob.filecv','t_careers.career_title','t_offersjob.title','t_offersjob.salary', 't_offersjob.type_offer','t_offersjob.detail','t_offersjob.date_publish','t_offersjob.date_vigency','t_offersjob.vacancy_numbers','t_users.name','t_users.paternal_surname','t_users.maternal_surname','t_users.email','t_users.username','t_users.mobile','t_users.document_type','t_users.document_number','t_users.graduated')
            ->where('t_postulatejob.id', '=', $id)
            ->first();
    }

    public static function getReportPostulations($career_id = NULL)
    {
        if ($career_id == NULL) {
            return PostulateJobEloquent::leftjoin('t_offersjob', 't_postulatejob.offer_id', '=', 't_offersjob.id')
                ->leftjoin('t_users', 't_postulatejob.user_id', '=', 't_users.id')
                ->leftjoin('t_careers', 't_offersjob.career_id', '=', 't_careers.id')
                ->select('t_postulatejob.id', 't_postulatejob.user_id', 't_postulatejob.offer_id', 't_postulatejob.result', 't_postulatejob.date_postulation', 't_postulatejob.filecv','t_postulatejob.status', 't_offersjob.title', 't_offersjob.type_offer', 't_offersjob.date_publish', 't_offersjob.date_vigency', 't_offersjob.salary', 't_offersjob.vacancy_numbers', 't_careers.career_title', 't_offersjob.career_id', 't_users.name', 't_users.paternal_surname', 't_users.maternal_surname', 't_users.email', 't_users.graduated', 't_users.mobile')
                ->orderBy('t_postulatejob.date_postulation', 'desc')
                ->get();
        } else {
            return PostulateJobEloquent::leftjoin('t_offersjob', 't_postulatejob.offer_id', '=', 't_offersjob.id')
                ->leftjoin('t_users', 't_postulatejob.user_id', '=', 't_users.id')
                ->leftjoin('t_careers', 't_offersjob.career_id', '=', 't_careers.id')
                ->select('t_postulatejob.id', 't_postulatejob.user_id', 't_postulatejob.offer_id', 't_postulatejob.result', 't_postulatejob.date_postulation', 't_postulatejob.filecv','t_postulatejob.status', 't_offersjob.title', 't_offersjob.type_offer', 't_offersjob.date_publish', 't_offersjob.salary', 't_offersjob.date_vigency', 't_careers.career_title', 't_offersjob.career_id', 't_users.name', 't_users.paternal_surname', 't_users.maternal_surname', 't_users.email', 't_users.graduated', 't_users.mobile')
                ->where('t_offersjob.career_id', '=', $career_id)
                ->orderBy('t_postulatejob.date_postulation', 'desc')
                ->get();
        }
    }
}
