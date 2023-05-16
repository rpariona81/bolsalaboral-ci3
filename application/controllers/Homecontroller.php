<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {

    public function index()
    {
        $this->load->view('home');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('/');
    }

}

/* End of file Controllername.php */
