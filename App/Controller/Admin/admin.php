<?php
class admin extends DController
{
    public function __construct()
    {
        $data = array();
        $message = array();
        parent::__construct(); // parent từ cha nó DController
    }

    public function index()
    {
        // Session::checkSessionAuth();

        $this->homeadmin();
    }
    public function homeadmin()
    {
        // Session::checkSessionAuth();
        // $homemodel = $this->load->model('homemodel');
        // $user = 'user';
        // $data['user'] = $homemodel->admin($user);

        // $this->load->view('Admin/List-admin/index', $data);
        $this->load->view('Admin/List-admin/index');
    }
    public function notfound()
    {
        $this->load->view('Error/error_404');
    }
}
