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
        $this->userModel = $this->load->model('User_M');

    }

    public function PostDetail($id)
    {
        try {

            $cond = "id='$id'";
            $this->postModel =  $this->load->model('Post_M');
            $data['postbyid'] = $this->postModel->PostById($this->postTable, $cond);
            $data['commentbyid'] = $this->post_home->CommentById($this->comment, $this->user, $id);
            $data['user'] = $this->post_home->User($this->user);
            $data['categories'] = $this->post_home->Category($this->categories);
            $data['recentpost'] = $this->post_home->RecentPost($this->postTable);
            $data['posts'] = $this->post_home->User($this->postTable);
            $data['popular'] = $this->post_home->listPapulator($this->postTable);
            $this->updateViewTotal($data['postbyid'], $cond);
            $this->load->view('Home/Layouts/master-3', $data);
            $this->load->view('Home/Posts/post_detail', $data);
        } catch (PDOException $e) {
            header("Location:" . BASE_URL . "admin/notfound");
            $error = $e->getMessage();
            echo 'Error creating' . $error;
            exit();
        }
    }

    public function RecentPostDetail($id){
        try {
            $cond = "id='$id'";
            $this->postModel =  $this->load->model('Post_M');
            $data['postbyid'] = $this->postModel->PostById($this->postTable, $cond);
            $data['commentbyid'] = $this->post_home->CommentById($this->comment, $this->user, $id);
            $data['user'] = $this->post_home->User($this->user);
            $data['categories'] = $this->post_home->Category($this->categories);
            $data['recentpost'] = $this->post_home->RecentPost($this->postTable);
            $data['posts'] = $this->post_home->User($this->postTable);
            $data['popular'] = $this->post_home->listPapulator($this->postTable);
            $this->updateViewTotal($data['postbyid'], $cond);
            $this->load->view('Home/Layouts/master-3', $data);
            $this->load->view('Home/Posts/recent_post', $data);
        } catch (PDOException $e) {
            header("Location:" . BASE_URL . "admin/notfound");
            $error = $e->getMessage();
            echo 'Error creating' . $error;
            exit();
        }
    }
    
    public function listPosts()
    {
        try {

            $data['user'] = $this->post_home->User($this->user);
            $data['categories'] = $this->post_home->Category($this->categories);
            // $this->postModel =  $this->load->model('Post_M');
            // $data['posts'] = $this->post_home->user($this->postTable);
            $data['list_posts'] = $this->post_home->listPosts($this->postTable);
            $this->load->view('Home/Layouts/master-2', $data);
            $this->load->view('Home/Posts/list_post', $data);
        } catch (PDOException $e) {
            header("Location:" . BASE_URL . "admin/notfound");
            $error = $e->getMessage();
            echo 'Error creating' . $error;
            exit();
        }
    }

    public function CategoryBydId($id)
    {
        try {
            $data['user'] = $this->post_home->User($this->user);
            $data['categories'] = $this->post_home->Category($this->categories);
            $this->postModel =  $this->load->model('Post_M');
            $data['posts'] = $this->post_home->User($this->postTable);
            $data['categoryby_id'] = $this->post_home->CategoryByIdHome($this->categories, $this->postTable, $id);
            $this->load->view('Home/Layouts/master-3', $data);
            $this->load->view('Home/Posts/list_category', $data);
        } catch (PDOException $e) {
            header("Location:" . BASE_URL . "admin/notfound");
            $error = $e->getMessage();
            echo 'Error creating' . $error;
            exit();
        }
    }

    public function insertComment()
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
              

                $result = $this->post_home->insertComment($this->comment,  $data);

                if ($result == 1) {
                    $_SESSION['alert']['msg'] = 'Successful Data Generation';
                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                    exit;
                } else {

                    $_SESSION['alert']['error'] = ' Data Generation failed';
                }
            } else {
            
                echo '<script language="javascript">';
                echo 'alert("Please  Login")';
                echo '</script>';
                header("Location:" . BASE_URL . "homepage/loginUser");
            }
        } catch (PDOException $e) {
            header("Location:" . BASE_URL . "admin/notfound");
            $error = $e->getMessage();
            echo 'Error creating' . $error;
            exit();
        }
    }




    public function ChangePassword($id)
    {
        try {
            $cond = "id='$id'";
            $this->userModel =  $this->load->model('User_M');
            $data['userbyid'] = $this->userModel->UserById($this->user, $cond);
            $this->load->view('Admin/Layouts/master-2', $data);
            $this->load->view('Admin/Auth/changePassword', $data);
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "Database error: $error_message";
        }
    }

    public function updateChangePassword($id)
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
                $data['userbyid'] = $this->userModel->UserBydI($this->user, $cond);
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
            $result = $this->userModel->updateUser($this->user, $data, $cond);
            if ($result == 1) {
                // $_SESSION['alert']['msg'] = 'Edit Successful data ';
                echo '<script language="javascript">';
                echo 'alert("Edit Successful data ")';
                echo '</script>';
                header("Location:" . BASE_URL . "login/index");
                unset($_SESSION['login/index']);
            } else {
                echo '<script language="javascript">';
                echo 'alert("Edit Fail data ")';
                echo '</script>';
                $_SESSION['alert']['error'] = 'Edit Whether Fail';
                header("Location:" . BASE_URL . "login/changePassword");
            }
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "Database error: $error_message";
        }
    }

    public function updateViewTotal($post, $cond)
    {
        // var_dump($post);
        // die();
        $totalVIew = $post['total_view'] + 1;
        $data = [
            'total_view' => $totalVIew,
        ];

      return   $this->postModel->updatePost($this->postTable, $data, $cond);
    }
}