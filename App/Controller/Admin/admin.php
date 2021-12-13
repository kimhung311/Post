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
        $this->homeadmin();
    }
    public function homeadmin()
    {

        $homemodel = $this->load->model('homemodel');
        $user = 'user';
        // var_dump($user);
        // die();
        $data['user'] = $homemodel->admin($user);

        $this->load->view('index', $data);
    }
    public function notfound()
    {
        $this->load->view('Error/error_404');
    }

    // public function list_category()
    // {
    //     $categorymodel = $this->load->model('categorymodel');
    //     $categories = 'categories';
    //     $data['categories'] = $categorymodel->category($categories);
    //     $this->load->view('category', $data);
    // }

    // public function editcate()
    // {
    //     $categorymodel = $this->load->model('categorymodel');
    //     $categories = 'categories';
    //     $id = 11;
    //     $data['categorybyid'] = $categorymodel->categorybyid($categories, $id);
    //     $this->load->view('categorybyid', $data);
    // }
    // public function addcategory()
    // {
    //     $categorymodel = $this->load->model('categorymodel');
    //     $categories = 'categories';
    //     $data['categories'] = $categorymodel->category($categories);
    //     $usermodel = $this->load->model('usermodel');
    //     $user = 'user';
    //     $data['user'] = $usermodel->user($user);

    //     $this->load->view('create', $data);
    // }
    // public function insertcategory()
    // {

    //     $categorymodel = $this->load->model('categorymodel');
    //     $categories = 'categories';
    //     $name = $_POST['name'];
    //     $paren_id = $_POST['paren_id'];
    //     $user_id = $_POST['user_id'];

    //     $data = array(
    //         'name' => $name,
    //         'paren_id' => $paren_id,
    //         'user_id' => $user_id
    //     );
    //     $result = $categorymodel->insertcategory($categories, $data);
    //     echo "insertcategory successfully";
    //     if ($result == 1) {
    //         $message['msg'] = 'Thêm dữ liệu thành công';
    //     } else {
    //         $message['msg'] = 'Thêm dữ liệu thất bại';
    //     }
    //     $this->load->view('create', $data, $message);
    // }

    // public function updatecategory()
    // {

    //     $categorymodel = $this->load->model('categorymodel');
    //     $categories = 'categories';
    //     $id = 10;
    //     $cond = "categories.id='$id'";
    //     $data = array(
    //         'name' => 'mới sửa',
    //         'paren_id' =>  2,
    //         'user_id' => 4
    //     );
    //     $result = $categorymodel->updatecategory($categories, $data, $cond);
    //     if ($result == 1) {
    //         // $message['msg'] = 'Chỉnh sửa dữ liệu thành công';
    //         echo "thành công";
    //     } else {
    //         // $message['msg'] = 'Chỉnh sửa liệu thất bại';
    //         echo "Lỗi";
    //     }
    // }
    // public function deletecategory()
    // {
    //     $categorymodel = $this->load->model('categorymodel');
    //     $categories = 'categories';
    //     $cond = "id=48";

    //     $result = $categorymodel->deletecategory($categories, $cond);
    //     if ($result == 1) {
    //         // $message['msg'] = 'Chỉnh sửa dữ liệu thành công';
    //         echo "xoá thành công";
    //     } else {
    //         // $message['msg'] = 'Chỉnh sửa liệu thất bại';
    //         echo "xoá Lỗi";
    //     }
    // }

}