<?php
class homepage extends DController
{
    private $categoryModel;
    private $postModel;
    private $userModel;

    public $postTable = 'posts';
    public $categories = 'categories';

    public function __construct()
    {
        $data = array();
        parent::__construct(); // parent từ cha nó DController
        $this->categoryModel =  $this->load->model('CategoryModel');
        $this->userModel = $this->load->model('UserModel');
    }
    public function home()
    {
        $homemodel = $this->load->model('homemodel');
        $data['categories'] = $this->categoryModel->category($this->categories);
        // $data['posts'] = $this->postModel->post($this->postTable);
        $this->load->view('Home/Layouts/master',$data);
        $this->load->view('Home/Home', $data);
    }

    public function login_user()
    {
        $this->load->view('Home/Layouts/master');
        $this->load->view('Home/Login/login_home');
    }

    public function check_login(){
        try {
            $email = $_POST['email'];
            $password = md5($_POST['password']);

            $tabl_user = 'user';
            $loginmodel = $this->load->model('loginmodel');
            $count = $loginmodel->login($tabl_user, $email, $password);

            if ($count == 0) {
                $message['msg'] = "Error email or password please check your email password";
                header("Location:" . BASE_URL . "login/index");
            } else {
                $result =  $loginmodel->getlogin($tabl_user, $email, $password);
                Session::init();
                Session::set('login/login', true);  // kiểm tra người dùng đã đưng nhập chưa
                Session::set('email', $result[0]['email']);
                Session::set('id', $result[0]['id']);

                header("Location:" . BASE_URL . "login/dashboard");
            }
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "Database error: $error_message";
        }
    }
}