<?php
class login extends DController
{
    public function __construct()
    {
        $data = array();
        $message = array();
        parent::__construct(); // parent từ cha nó DController
    }

    public function index()
    {
        $this->login();
    }
    public function login()
    {
        // var_dump(111);
        // die();
        $this->load->view('Admin/Auth/login');
    }

    public function authentication()
    {
        // var_dump(111);
        // die();
        echo   $email = $_POST['email'];
        echo   $password = $_POST['password'];
    }
}