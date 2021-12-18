<?php
class login extends DController
{
    private $userModel;
    private $adminTable = 'user';
    public function __construct()
    {
        $data = array();
        $message = array();
        parent::__construct(); // parent từ cha nó DController
        $this->userModel =  $this->load->model('UserModel');

    }

    public function index()
    {
        // var_dump(111);
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
            $loginmodel = $this->load->model('loginmodel');
            $count = $loginmodel->login($this->adminTable, $email, $password);

            if ($count == 1) {
                $result =  $loginmodel->getlogin($this->adminTable, $email, $password);
                Session::init();
                Session::set('login/login', true);  // kiểm tra người dùng đã đăng nhập 
                Session::set('email', $result[0]['email']);
                Session::set('id', $result[0]['id']);
                $_SESSION['msg'] = 'Login Successfully';
                header("Location:" . BASE_URL . "login/dashboard");
            } else {
                echo '<script language="javascript">';
                echo 'alert("ERROR EMAIL OR PASSWORD")';
                echo '</script>';
                $this-> load->view("Admin/Auth/login");
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

    public function change_password($id){
        try {
            // var_dump(11);
            // die();
            $cond = "id='$id'";
            $data['userbyid'] = $this->userModel->userbyid($this->adminTable, $cond);
            $this->load->view('Admin/Auth/change_password',$data);
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "Database error: $error_message";
        }
    }
    
    public function update_change_password($id)
    {
        try {
           
            $cond = "id='$id'";
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = md5($_POST['password']);
            password_hash($password, PASSWORD_DEFAULT);
            $role_id = $_POST['role_id'];
            $type = $_POST['type'];
            $address = $_POST['address'];

            $avatar = $_FILES['avatar']['name'];
            $tmp_image = $_FILES['avatar']['tmp_name'];
            $phone = $_POST['phone'];

            $div = explode('.', $avatar);
            $file_ext = strtolower(end($div));
            $unique_image = $div[0] . time() . '.' . $file_ext;
            $path_upload = "Public/User-image/" . $unique_image;


            if ($avatar) {
                $data['userbyid'] = $this->userModel->userbyid($this->adminTable, $cond);
                foreach ($data['userbyid'] as $user) {
                    if ($user['avatar']) {
                        $path_unlink = "Public/User-image/";
                        unlink($path_unlink . $user['avatar']);
                    }
                }
                move_uploaded_file($tmp_image, $path_upload);
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
            } else {
                $data = array(
                    'name' => $name,
                    'email' => $email,
                    'password' => $password,
                    'role_id' => $role_id,
                    'type' => $type,
                    'address' => $address,
                    'phone' => $phone
                );
            }

            $result = $this->userModel->update_user($this->adminTable, $data, $cond);
            if ($result == 1) {
                $_SESSION['msg'] = 'Edit Successful data ';
                echo '<script language="javascript">';
                echo 'alert("Edit Successful data ")';
                echo '</script>';
                $this->load->view("Admin/Auth/login");
            } else {
                $_SESSION['error'] = 'Edit Whether Fail';
                header("Location:" . BASE_URL . "admin/register");
            }
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "Database error: $error_message";
        }
    }
    public function logout()
    {
        Session::init();
        unset($_SESSION['login/login']);
        header("Location:" . BASE_URL . "login/index");
    }
}