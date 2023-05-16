<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthController extends CI_Controller {

    public function index_User()
    {
        $this->load->view('auth/loginUser');
    }

    public function index_Admin()
    {
        $this->load->view('auth/loginAdmin');
    }
}
