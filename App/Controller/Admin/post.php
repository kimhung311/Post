<?php

class Post extends DController
{
    private $categoryModel;
    private $postModel;
    private $userModel;

    public $postTable = 'posts';
    public $categories = 'categories';
    public $user = 'user';
    public $comments = 'comments';


    public function __construct()
    {
        Session::checkSessionAuth();

        $data = array();
        $message = array();
        parent::__construct();
        $this->categoryModel =  $this->load->model('Category_M');
        $this->userModel = $this->load->model('User_M');
        $this->postModel =  $this->load->model('Post_M');
    }

    public function Index()
    {
        $data['posts'] = $this->postModel->Post($this->postTable, $this->categories, $this->user);
        $this->load->view('Admin/Layouts/master', $data);
        $this->load->view('Admin/Posts/index', $data);
    }

    public function Detail($id)
    {
        $cond = "id='$id'";
        $data['postbyid'] = $this->postModel->PostById($this->postTable, $cond);
        // $data['posts'] = $this->postModel->post($this->postTable, $this->categories);
        $this->load->view('Admin/Layouts/master-2', $data);
        $this->load->view('Admin/Posts/post_detail', $data);
    }

    public function addPost()
    {
        try {
            $data['posts'] = $this->postModel->listPost($this->postTable);
            $data['categories'] = $this->postModel->listPost($this->categories);
            // $data['user'] = $this->userModel->user($this->user);
            $this->load->view('Admin/Layouts/master', $data);
            $this->load->view('Admin/Posts/create', $data);
        } catch (PDOException $e) {
            $error = $e->getMessage();
            echo 'Error creating' . $error;
            exit();
        }
    }

    public function insertPost()
    {
        try {

            $category_id = $_POST['category_id'];
            $user_id = $_POST['user_id'];
            $title = $_POST['title'];
            $content = $_POST['content'];
            $hot_new = $_POST['hot_new'];
            $description = $_POST['description'];

            $picture = $_FILES['picture']['name'];
            $tmp_image = $_FILES['picture']['tmp_name'];
            $image_detail = $_FILES['image_detail']['name'];
            $tmp_detail = $_FILES['image_detail']['tmp_name'];

            $div = explode('.', $picture);
            $div1 = explode('.', $image_detail);

            $file_ext = strtolower(end($div));
            $file_ext1 = strtolower(end($div1));
            $unique_image = $div[0] . time() . '.' . $file_ext;
            $unique_image_detali = $div1[0] . time() . '.' . $file_ext1;

            $path_uploads = "Public/Image-post/" . $unique_image;
            $path_upload = "Public/image-post-detail/" . $unique_image_detali;

            $data = array(
                'category_id' => $category_id,
                'user_id' => $user_id,
                'title' => $title,
                'content' => $content,
                'hot_new' => $hot_new,
                'description' => $description,
                'picture' => $unique_image,
                'image_detail' => $unique_image_detali
            );
            // var_dump($data);
            // die();
            $result = $this->postModel->insertPost($this->postTable, $data);

            if ($result == 1) {
                move_uploaded_file($tmp_image, $path_uploads);
                move_uploaded_file($tmp_detail, $path_upload);
                $_SESSION['alert']['msg'] = 'Successful Data Generation';
            } else {
                $_SESSION['alert']['error'] = ' Data Generation failed';
            }
            header("Location:" . BASE_URL . "Post/Index");
        } catch (PDOException $e) {
            header("Location:" . BASE_URL . "post/add_post");
            $error = $e->getMessage();
            echo 'Error creating' . $error;
            exit();
        }
    }

    public function editPost($id)
    {
        $data['categories'] = $this->categoryModel->Category($this->categories, $this->user);
        $data['user'] = $this->userModel->user($this->user);
        $cond = "id='$id'";
        $data['postbyid'] = $this->postModel->PostById($this->postTable, $cond);
        // var_dump($data['postbyid']);
        // die();
        $this->load->view('Admin/Layouts/master-2', $data);
        $this->load->view('Admin/Posts/edit', $data);
        exit();
    }

    public function updatepost($id)
    {
        try {
            $cond = "id='$id'";
            $category_id = $_POST['category_id'];
            $user_id = $_POST['user_id'];
            $title = $_POST['title'];
            $content = $_POST['content'];
            $hot_new = $_POST['hot_new'];
            $description = $_POST['description'];

            $picture = $_FILES['picture']['name'];
            $tmp_image = $_FILES['picture']['tmp_name'];
            $image_detail = $_FILES['image_detail']['name'];
            $tmp_detail = $_FILES['image_detail']['tmp_name'];

            $div = explode('.', $picture);
            $div1 = explode('.', $image_detail);
            $file_ext = strtolower(end($div));
            $file_ext1 = strtolower(end($div1));
            $unique_image = $div[0] . time() . '.' . $file_ext;
            $unique_image_detali = $div1[0] . time() . '.' . $file_ext1;
            $path_uploads = "Public/Image-post/" . $unique_image;
            $path_upload = "Public/image-post-detail/" . $unique_image_detali;

            if ($picture || $image_detail) {
                $data['postbyid'] = $this->postModel->PostEditId($this->postTable, $cond);
                // var_dump($data['postbyid']);
                // die();
                foreach ($data['postbyid'] as $key => $value) {
                    if ($value['picture'] || $value['image_detail']) {
                        $path_unlink = "Public/image-post-detail/";
                        unlink($path_unlink . $value['picture']);
                        unlink($path_unlink . $value['image_detail']);
                    }
                }
                move_uploaded_file($tmp_image, $path_upload);
                move_uploaded_file($tmp_detail, $path_uploads);
                $data = array(
                    'category_id' => $category_id,
                    'user_id' => $user_id,
                    'title' => $title,
                    'content' => $content,
                    'hot_new' => $hot_new,
                    'description' => $description,
                    'picture' => $unique_image,
                    'image_detail' => $unique_image_detali
                );
            } else {
                $data = array(
                    'category_id' => $category_id,
                    'user_id' => $user_id,
                    'title' => $title,
                    'content' => $content,
                    'hot_new' => $hot_new,
                    'description' => $description,
                );
            }
            $result = $this->postModel->updatepost($this->postTable, $data, $cond);

            if ($result == 1) {
                $_SESSION['alert']['msg'] = 'Edit Successful data ';
            } else {
                $_SESSION['alert']['error'] = 'Edit Whether Fail';
            }
            header("Location:" . BASE_URL . "post/index");
        } catch (PDOException $e) {
            header("Location:" . BASE_URL . "post/edit");

            $error = $e->getMessage();
            echo 'Error creating' . $error;
            exit();
        }
    }

    public function deletePost($id)
    {
        try {
            $cond = "id='$id'";
            $result = $this->postModel->deletePostComment($this->postTable, $this->comments, $id);
            if ($result == 1) {
                $_SESSION['alert']['msg'] = 'Delete data successfully';
            } else {
                $_SESSION['alert']['error'] = 'Delete data failed';
            }
            // var_dump($result);
            // die();
            header("Location:" . BASE_URL . "post/index");
        } catch (PDOException $e) {
            $error = $e->getMessage();
            echo 'Error creating' . $error;
            exit();
        }
    }
}