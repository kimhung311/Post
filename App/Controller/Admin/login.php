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
        // var_dump(Session::checkSessionAuth());
        // die();
        Session::checkSessionAuth();
        $this->login();
    }

    public function login()
    {
   
        try {
            Session::checkSessionAuth();
            if (Session::get('login/login') == true) {
                header("Location:" . BASE_URL . "login/dashboard");
            }

            $this->load->view('Admin/Auth/login');
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "Database error: $error_message";
        }
    }

    public function authentication()
    {
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

    public function dashboard()
    {
        Session::checkSessionAuth();
        $this->load->view("Admin/List-admin/index");
    }

    public function logout()
    {
        Session::init();
        // Session::destroy();
        unset($_SESSION['login/login']);
        header("Location:" . BASE_URL . "login/index");
    }
}