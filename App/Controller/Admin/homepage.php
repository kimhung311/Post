<?php
class Homepage extends DController
{
    private $login_user;
    public $postTable = 'posts';
    public $user = 'user';
    public $categories = 'categories';
    public $comment = 'comments';
    public $post_id = 'post_id';
    public function __construct()
    {
        session_start();
        $data = array();
        parent::__construct(); // parent từ cha nó DController
        $this->login_user = $this->load->model('Page');
    }

    public function loginUser()
    {
        Session::check_login_user();
        if (isset($_SESSION['auth_user']) == true) {
            $data['user'] = $this->login_user->User($this->user);
            $data['categories'] = $this->login_user->User($this->categories);
            $data['posts'] = $this->login_user->User($this->postTable);
            $this->load->view('Home/Layouts/master-2', $data);
            $this->load->view('Home/Home', $data);
        }else{
            $data['categories'] = $this->login_user->User($this->categories);
            $data['posts'] = $this->login_user->User($this->postTable);
            $this->load->view('Home/Layouts/master-2', $data);
            $this->load->view('Home/Login/login_home', $data);
        // header("Location:" . BASE_URL . "homepage/login_user");
        }
    }

    public function checkLogin()
    {
        try {
            $email = $_POST['email'];
            $password = md5($_POST['password']);

            $tabl_user = 'user';
            $count = $this->login_user->loginCustomer($this->user, $email, $password);
            if ($count == 1) {
                $result =  $this->login_user->checkLogin($tabl_user, $email, $password);

                $_SESSION['auth_user'] = [
                    // 'homepage/login_user' => true,
                    'email' => $result[0]['email'],
                    'id' => $result[0]['id'],
                    'name' => $result[0]['name'],
                    'avatar' => $result[0]['avatar'],
                ];

                $_SESSION['alert']['msg'] = 'Login Successfully';
                $_SESSION['alert']['count'] = 0;
                echo '<script language="javascript">';
                echo 'alert("ERROR EMAIL OR PASSWORD")';
                echo '</script>';
                header("Location:" . BASE_URL . "homepage");
                exit();

            } else {
                
                echo '<script type="text/javascript"';
                echo 'alert("ERROR EMAIL OR PASSWORD")';
                echo '</script>';
                header("Location:" . BASE_URL . "homepage/loginUser");
                exit();
            }
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "Database error: $error_message";
        }
    }

    public function Register(){
        try{
            $data['user'] = $this->login_user->User($this->user);
            $data['categories'] = $this->login_user->User($this->categories);
            $data['posts'] = $this->login_user->User($this->postTable);
            $this->load->view('Home/Layouts/master-2', $data);
            $this->load->view('Home/Login/register_home');
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "Database error: $error_message";
            exit();
        }
    }

  
    public function AddRegister()
    {
        try {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = md5($_POST['password']);
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
            $data = array(
                'name' => $name,
                'email' => $email,
                'password' => $password,
                'role_id' => 3,
                'type' => 'admin',
                'address' => $address,
                'avatar' => $unique_image,
                'phone' => $phone
            );

            $this->userModel =  $this->load->model('User_M');
            $result = $this->userModel->insertUser($this->user, $data);
            if ($result == 1) {
                move_uploaded_file($tmp_image, $path_upload);
                header("Location:" . BASE_URL . "homepage/loginUser");
                $_SESSION['alert']['msg'] = 'Successful Data Generation';
                $_SESSION['alert']['count'] = 0;
            } else {
                $_SESSION['alert']['error'] = ' Data Generation failed';
                header("Location:" . BASE_URL . "admin/register");
            }
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "Database error: $error_message";
        }
    }

    public function logoutUser()
    {
        Session::init();
        session_destroy();
        // unset($_SESSION['homepage/login_user']);
        $_SESSION['alert']['msg'] = 'Logout Successfully ';
        header("Location:" . BASE_URL . "homepage/loginUser");
    }

    public function home()
    {
        $data['categories'] = $this->login_user->Category($this->categories);
        $data['posts'] = $this->login_user->Post($this->postTable);
        $data['latestnew'] = $this->login_user->LatestNew($this->postTable, $this->categories);
        $data['commenttop'] = $this->login_user->Comments($this->comment, $this->user, $this->postTable);
        $data['hotnew'] = $this->login_user->HotNew($this->postTable);
        $data['popular'] = $this->login_user->listPapulator($this->postTable);
        $data['user'] = $this->login_user->User($this->user);
        $data['recomended'] = $this->login_user->ReCommended($this->comment, $this->postTable);
        $data['trendingtags'] = $this->login_user->TrendingTags($this->postTable, $this->categories);
        $data['othernew'] = $this->login_user->OtherPost($this->postTable, $this->categories);
        $this->load->view('Home/Layouts/master', $data);
        $this->load->view('Home/Home', $data);
    }
}