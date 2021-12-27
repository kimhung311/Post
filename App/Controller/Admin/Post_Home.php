<?php
class Post_Home extends DController
{
    private $post_home;

    public $postTable = 'posts';
    public $comment = 'comments';
    public $post_id = 'post_id';
    public $user = 'user';
    public $categories = 'categories';

    public function __construct()
    {
        session_start();
        $data = array();
        parent::__construct(); // parent từ cha nó DController
        $this->post_home = $this->load->model('Page');
    }

    public function post_detail($id)
    {
        try {

            $cond = "id='$id'";
            $data['post_relate'] = $this->post_home->cate_relate($this->categories, $this->postTable);
            $data['user'] = $this->post_home->user($this->user);
            $data['categories'] = $this->post_home->category($this->categories);
            $this->postModel =  $this->load->model('Post_M');
            $data['posts'] = $this->post_home->user($this->postTable);
            $data['postbyid'] = $this->postModel->postbyid($this->postTable, $cond);
            $data['commentbyid'] = $this->post_home->commentbyid($this->comment, $this->user, $id);
            $this->load->view('Home/Layouts/master-3', $data);
            $this->load->view('Home/Posts/post_detail', $data);
        } catch (PDOException $e) {
            header("Location:" . BASE_URL . "post/add_post");
            $error = $e->getMessage();
            echo 'Error creating' . $error;
            exit();
        }
    }
    public function list_posts()
    {
        try {

            $data['user'] = $this->post_home->user($this->user);
            $data['categories'] = $this->post_home->category($this->categories);
            // $this->postModel =  $this->load->model('Post_M');
            // $data['posts'] = $this->post_home->user($this->postTable);
            $data['list_posts'] = $this->post_home->list_posts($this->postTable);
            $this->load->view('Home/Layouts/master-2', $data);
            $this->load->view('Home/Posts/list_post', $data);
        } catch (PDOException $e) {
            header("Location:" . BASE_URL . "post/add_post");
            $error = $e->getMessage();
            echo 'Error creating' . $error;
            exit();
        }
    }

    public function categoryby_id($id)
    {
        try {
            $data['user'] = $this->post_home->user($this->user);
            $data['categories'] = $this->post_home->category($this->categories);
            $this->postModel =  $this->load->model('Post_M');
            $data['posts'] = $this->post_home->user($this->postTable);
            $data['categoryby_id'] = $this->post_home->categorybyid_home($this->categories, $this->postTable, $id);
            $this->load->view('Home/Layouts/master-3', $data);
            $this->load->view('Home/Posts/list_category', $data);
        } catch (PDOException $e) {
            header("Location:" . BASE_URL . "post/add_post");
            $error = $e->getMessage();
            echo 'Error creating' . $error;
            exit();
        }
    }

    public function insertcomment()
    {
        try {
            if (isset($_SESSION['auth_user']) == true) {

                $user_id = $_SESSION['auth_user']['id'];
                $post_id = $_POST['post_id'];
                $comment = $_POST['comment'];

                $data = array(
                    'user_id' => $user_id,
                    'post_id' => $post_id,
                    'comment' => $comment
                );

                $result = $this->post_home->insertcomment($this->comment,  $data);

                if ($result == 1) {
                    $_SESSION['alert']['msg'] = 'Successful Data Generation';
                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                    exit;
                } else {

                    $_SESSION['alert']['error'] = ' Data Generation failed';
                }
            } else {
                // var_dump('sai');
                // die();
                echo '<script language="javascript">';
                echo 'alert("Please  Login")';
                echo '</script>';
                header("Location:" . BASE_URL . "homepage/login_user");
            }
        } catch (PDOException $e) {
            header("Location:" . BASE_URL . "post/add_post");
            $error = $e->getMessage();
            echo 'Error creating' . $error;
            exit();
        }
    }




    public function change_password($id)
    {
        try {
            $cond = "id='$id'";
            $this->userModel =  $this->load->model('User_M');
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
            $this->userModel = $this->load->model('User_M');
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
}