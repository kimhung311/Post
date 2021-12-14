<?php
class homepage extends DController
{
    public function __construct()
    {
        $data = array();
        parent::__construct(); // parent từ cha nó DController
    }
    public function home()
    {
        // var_dump(11);
        $homemodel = $this->load->model('homemodel');
        $categories = 'categories';
        $data['categories'] = $homemodel->category($categories);
        $this->load->view('Home/Home', $data);
    }
}