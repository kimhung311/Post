<?php
class admin extends DController
{
    public $adminTable = 'user';
    public function __construct()
    {
        $data = array();
        $message = array();
        parent::__construct(); // parent từ cha nó DController
        $this->userModel =  $this->load->model('UserModel');
    }

    public function index()
    {
        $this->homeadmin();
    }
    public function homeadmin()
    {
        $this->load->view('Admin/List-admin/index');
    }
    public function notfound()
    {
        $this->load->view('Error/error_404');
    }
    public function list_admin()
    {
        try {

            $data['user'] = $this->userModel->user($this->adminTable);
            $this->load->view('Admin/Users/index', $data);
        } catch (PDOException $e) {
            $error = $e->getMessage();
            echo 'Error creating' . $error;
            exit();
        }
    }

    public function register()
    {
        $this->load->view('Admin/Users/create');
    }

    public function add_register()
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $role_id = $_POST['role_id'];
        $type = $_POST['type'];
        $address = $_POST['address'];
        $avatar = $_FILES['avatar']['name'];
        $tmp_image = $_FILES['avatar']['tmp_name'];
        $phone = $_POST['phone'];
        $path_upload = [];
        $div = explode('.', $avatar);
        $file_ext = strtolower(end($div));
        if(strtolower(end($div))){
            foreach($file_ext as $file_ext){
                $unique_image = $div[0] . time() . '.' . $file_ext;
                $path_upload = "Public/User-image/" . $unique_image;
            }
        }
     

        $data = array(
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'role_id' => $role_id,
            'type' => $type,
            'address' => $address,
            'avatar' => $unique_image,
            'phone' => $phone
        );


        $result = $this->userModel->insertuser($this->adminTable, $data);

        if ($result == 1) {
            move_uploaded_file($tmp_image, $path_upload);
            header("Location:" . BASE_URL . "admin/register");
            var_dump($result);
            $message['msg'] = 'Thêm dữ liệu thành công';
        } else {
            $message['msg'] = 'Thêm dữ liệu thất bại';
            header("Location:" . BASE_URL . "admin/register");
        }
    }

    public  function edit_user($id)
    {
        $cond = "id='$id'";
        $data['userbyid'] = $this->userModel->userbyid($this->adminTable, $cond);
        $this->load->view('Admin/Users/edit', $data);
    }
}