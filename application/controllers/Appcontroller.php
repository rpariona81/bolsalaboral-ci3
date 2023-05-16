<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Support\Facades\Request;


class AppController extends CI_Controller {


    public function index()
    {
        
        $this->load->model('offerjobeloquent');
        
        $data = [];
        $data['rol'] = 'estudiante';
        //$data['rol'] = 'docente';
        
        $data['pagina'] = 'app/listConvocatorias';
        
        $data['query'] = Offerjobeloquent::where('status','=', 1)->get();
        
        //echo $data['query'];
		$this->load->view('app/layout/main', $data);

        //$data['rol'] = session()->userdata['role'];
        
        //echo "front";
    }

    public function viewConvocatoria()
    {
        $data['rol'] = 'estudiante';
        $data['pagina'] = 'app/viewConvocatoria';
        $this->load->view('app/layout/main', $data);
    }

    public function viewPerfil()
    {
        $data['rol'] = 'estudiante';
        $data['pagina'] = 'app/viewPerfil';
        $this->load->view('app/layout/main', $data);
    }

    public function viewPostulaciones()
    {
        $data['rol'] = 'estudiante';
        $data['pagina'] = 'app/listPostulaciones';
        $this->load->view('app/layout/main', $data);
    }

    public function viewCredenciales()
    {
        $data['rol'] = 'estudiante';
        $data['pagina'] = 'app/viewPerfil';
        $this->load->view('app/layout/main', $data);
    }

    
}

/* End of file Controllername.php */
