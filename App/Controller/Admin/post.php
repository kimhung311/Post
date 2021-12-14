<?php
class post extends DController
{

    public function __construct()
    {
        $data = array();
        $message = array();
        parent::__construct();
    }

    public function index()
    {

        $categorymodel = $this->load->model('categorymodel');
        $posts = 'posts';
        $data['posts'] = $categorymodel->category($posts);
        $this->load->view('Admin/Posts/index', $data);
    }

    public function add_post()
    {
        try {
            $categorymodel =  $this->load->model('categorymodel');
            $categories = 'categories';
            $data['categories'] = $categorymodel->category($categories);

            $usermodel = $this->load->model('usermodel');
            $user = 'user';
            $data['user'] = $usermodel->user($user);

            $this->load->view('Admin/Posts/create', $data);
        } catch (PDOException $e) {
            $error = $e->getMessage();
            echo 'Error creating' . $error;
            exit();
        }
    }

    public function insert_post()
    {
        try {
            $categorymodel = $this->load->model('categorymodel');
            $posts = 'posts';

            $name = $_POST['name'];
            $category_id = $_POST['category_id'];
            $user_id = $_POST['user_id'];
            $title = $_POST['title'];
            $content = $_POST['content'];
            $description = $_POST['description'];
            $picture = $_POST['picture'];
            $image_detail = $_POST['image_detail'];

            $data = array(
                'name' => $name,
                'category_id' => $category_id,
                'user_id' => $user_id,
                'title' => $title,
                'content' => $content,
                'description' => $description,
                'picture' => $picture,
                'image_detail' => $image_detail
            );

            $result = $categorymodel->insertcategory($posts, $data);
            header("Location:" . BASE_URL . "post/index");
        } catch (PDOException $e) {

            header("Location:" . BASE_URL . "post/add_post");

            $error = $e->getMessage();
            echo 'Error creating' . $error;
            exit();
        }
    }

    // public function editcate($id)
    // {
    //     $categorymodel = $this->load->model('categorymodel');
    //     $categories = 'categories';

    //     $usermodel = $this->load->model('usermodel');
    //     $user = 'user';
    //     $data['user'] = $usermodel->user($user);

    //     $cond = "id='$id'";
    //     $data['categorybyid'] = $categorymodel->categorybyid($categories, $cond);

    //     $this->load->view('Admin/Categories/edit', $data);
    // }

    // public function updatecategory($id)
    // {

    //     $categorymodel = $this->load->model('categorymodel');
    //     $table = 'categories';
    //     $cond = "id='$id'";

    //     $name = $_POST['name'];
    //     $paren_id = $_POST['paren_id'];
    //     $user_id = $_POST['user_id'];

    //     $data = array(
    //         'name' => $name,
    //         'paren_id' => $paren_id,
    //         'user_id' =>  $user_id
    //     );

    //     $result = $categorymodel->updatecategory($table, $data, $cond);

    //     if ($result == 1) {
    //         // $message['msg'] = 'Chỉnh sửa dữ liệu thành công';
    //         echo "thành công";
    //     } else {
    //         // $message['msg'] = 'Chỉnh sửa liệu thất bại';
    //         echo "Lỗi";
    //     }
    // }


    public function delete_post($id)
    {
        try {
            $postmodel = $this->load->model('postmodel');
            $table = 'posts';
            $result = $postmodel->post($table);

            $cond = "id='$id'";

            $result = $postmodel->deletepost($table, $cond);
            if ($result == 1) {
                // $message['msg'] = 'Chỉnh sửa dữ liệu thành công';
                echo "xoá thành công";
                header("Location:" . BASE_URL . "post/index");
            } else {
                $message['msg'] = 'Chỉnh sửa liệu thất bại';
                header("Location:" . BASE_URL . "post/index");
            }
        } catch (PDOException $e) {
            $error = $e->getMessage();
            echo 'Error creating' . $error;
            exit();
        }
    }
}