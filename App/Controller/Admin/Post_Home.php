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
            $data['user'] = $this->post_home->user($this->user);
            $data['categories'] = $this->post_home->category($this->categories);
            $this->postModel =  $this->load->model('PostModel');
            $data['posts'] = $this->post_home->user($this->postTable);
            $data['postbyid'] = $this->postModel->postbyid($this->postTable, $cond);
            $data['commentbyid'] = $this->post_home->commentbyid($this->comment, $id);
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
            $this->postModel =  $this->load->model('PostModel');
            $data['posts'] = $this->post_home->user($this->postTable);
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
            $this->postModel =  $this->load->model('PostModel');
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
}