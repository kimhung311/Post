<?php
class index extends DController
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
        $posts = 'posts';
        $data['post'] = $homemodel->post($posts);
        $this->load->view('Home',$data);
    }

    
}