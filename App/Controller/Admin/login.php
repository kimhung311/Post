<?php
class login extends DController
{
    public $userModel;

    public $user = 'user';

    public function __construct()
    {
        Session::checkSessionAuth();

        $data = array();
        $message = array();
        parent::__construct(); // parent từ cha nó DController

    }

    public function login()
    {
        try {
            if (Session::get('login/login') == true) {
                header("Location:" . BASE_URL . "login/dashboard");
            }else{
                echo '<script language="javascript">';
                echo 'alert("ERROR EMAIL OR PASSWORD")';
                echo '</script>';
                $this->load->view('Admin/Auth/login');
            }
          
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
            $count = $loginmodel->login($this->user, $email, $password);

            if ($count == 1) {

                $result =  $loginmodel->getlogin($this->user, $email, $password);
                Session::init();
                Session::set('login/login', true);  // kiểm tra người dùng đã đăng nhập 
                Session::set('email', $result[0]['email']);
                Session::set('id', $result[0]['id']);
                Session::set('name', $result[0]['name']);
                Session::set('avatar', $result[0]['avatar']);
            
                $_SESSION['alert']['msg'] = 'Login Successfully';
                $_SESSION['alert']['count'] = 0;
                echo '<script language="javascript">';
                echo 'alert("Login  Successfully")';
                echo '</script>';
                header("Location:" . BASE_URL . "login/dashboard");
            } else {
                echo '<script language="javascript">';
                echo 'alert("ERROR EMAIL OR PASSWORD")';
                echo '</script>';
                // $this->load->view("Admin/Auth/login");
            }
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "Database error: $error_message";
        }
    }

    public function dashboard()
    {
        $this->userModel =  $this->load->model('UserModel');

        $data['user'] = $this->userModel->user($this->user);
        $this->load->view('Admin/Layouts/master', $data);
        $this->load->view("Admin/List-admin/index");
    }

    public function change_password($id)
    {
        try {
            $cond = "id='$id'";
            $this->userModel =  $this->load->model('UserModel');
            $data['userbyid'] = $this->userModel->userbyid($this->user, $cond);
            $this->load->view('Admin/Layouts/master-2', $data);
            $this->load->view('Admin/Auth/change_password', $data);
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
                $data['userbyid'] = $this->userModel->userbyid($this->user, $cond);
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
            $this->userModel = $this->load->model('UserModel');
            $result = $this->userModel->update_user($this->user, $data, $cond);
            if ($result == 1) {
                // $_SESSION['alert']['msg'] = 'Edit Successful data ';
                echo '<script language="javascript">';
                echo 'alert("Edit Successful data ")';
                echo '</script>';
                header("Location:" . BASE_URL . "login/login");
                unset($_SESSION['login/login']);
            } else {
                echo '<script language="javascript">';
                echo 'alert("Edit Fail data ")';
                echo '</script>';
                $_SESSION['alert']['error'] = 'Edit Whether Fail';
                header("Location:" . BASE_URL . "login/change_password");
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
        $_SESSION['alert']['msg'] = 'Logout Successfully ';
        header("Location:" . BASE_URL . "login/login");
    }
}