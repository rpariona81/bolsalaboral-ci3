<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AppController extends CI_Controller {


    public function index()
    {
        $this->load->model('offerjobeloquent');
        $data = [];
        //$data['rol'] = 'estudiante';
        $data['rol'] = 'docente';
        $data['contenido'] = 'app/listConvocatorias';
        $data['query'] = Offerjobeloquent::where('status','=', 1)->get();
        //echo $data['query'];
		$this->load->view('app/layout/main', $data);

        //$data['rol'] = session()->userdata['role'];
        
        //echo "front";
    }

}

/* End of file Controllername.php */
