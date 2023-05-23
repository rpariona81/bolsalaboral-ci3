<?php

use \Illuminate\Database\Eloquent\Model as Eloquent;
//use \Illuminate\Database\Query\Builder as DB;

//use \Illuminate\Support\Facades\DB;
use \Illuminate\Database\Capsule\Manager as DB;
//use  \Illuminate\Database\Eloquent\Builder as DB;
//use Illuminate\Support\Facades\DB as FacadesDB;

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
        'career',
        'vacancy_numbers',
        'date_publish',
        'date_vigency',
        'career_id'
    ];

    protected $dates = ['date_publish','date_vigency', 'updated_at'];

    protected $casts = [
        'date_publish' => 'datetime:Y-m-d',
        'status' => 'boolean',
        'vacancy_numbers' => 'integer'
    ];

    public static function getOffersjob($id = NULL)
    {
        return OfferJobEloquent::leftjoin('t_careers', 't_offersjob.career_id','=','t_careers.id')
            ->select('t_offersjob.id','t_offersjob.title','t_offersjob.type_offer','t_offersjob.vacancy_numbers','t_offersjob.date_publish','t_offersjob.date_vigency','t_offersjob.status','t_offersjob.career_id','t_careers.career_title')
            ->first();
            
    }
    public static function getOffersjobs()
    {
        /*$recuentoPostulantes = DB::table('t_postulatejob')
                ->select('offer_id as offer_id_job', DB::raw('COUNT(id) as cant_postulantes'))
                        ->where('status', true)
                                ->groupBy('offer_id');
        
        return OfferJobEloquent::leftjoin('t_careers', 't_offersjob.career_id','=','t_careers.id')
            ->select('t_offersjob.id','t_offersjob.title','t_offersjob.type_offer','t_offersjob.vacancy_numbers','t_offersjob.date_publish','t_offersjob.date_vigency','t_offersjob.status','t_offersjob.career_id','t_careers.career_title')
            ->leftjoinSub($recuentoPostulantes, 'recuentoPostulantes', function ($join) {
                $join->on('t_offersjob.id', '=', 'recuentoPostulantes.offer_id_job');
            })
            ->orderBy('t_offersjob.date_publish','desc')
            ->get();
            //->get();*/

        $data = DB::select('SELECT t1.id,t1.title,t1.type_offer,t1.vacancy_numbers,t1.detail,t1.date_publish,t1.date_vigency,t1.status,t1.career_id,t2.career_title,t3.cant_postulantes FROM t_offersjob t1 LEFT JOIN t_careers t2 ON t1.career_id = t2.id LEFT JOIN (select offer_id, count(id) as cant_postulantes from t_postulatejob GROUP BY offer_id) t3 ON t3.offer_id = t1.id');
        return $data;
            
    }
}
