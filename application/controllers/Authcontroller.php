<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AuthController extends CI_Controller {

    
    public function index_User()
    {
        $this->load->view('auth/loginUser');
    }

    public function loginUser()
    {
        $username = $this->input->post('username', true);
        $password = $this->input->post('password', true);
        //print_r($username);
        $this->load->library('loginLib');
        $util = new loginLib();
        $checkUser = $util->getLoginUser($username, $password);
        if($checkUser){
            redirect('/users');
        }else{
            redirect('/wp-login');
        }
    }

    public function index_Admin()
    {
        $this->load->view('auth/loginAdmin');
    }

    public function loginAdmin()
    {
        $username = $this->input->post('username', true);
        $password = $this->input->post('password', true);
        //print_r($username);
        $this->load->library('loginLib');
        $util = new loginLib();
        $checkAdmin = $util->getLoginAdmin($username, $password);
        if($checkAdmin){
            redirect('/admin');
        }else{
            redirect('/wp-admin');
        }
    }

}
