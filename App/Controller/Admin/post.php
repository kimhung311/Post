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

        $postmodel = $this->load->model('postmodel');
        $posts = 'posts';
        $categories = 'categories';
        $data['posts'] = $postmodel->post($posts, $categories);
        $this->load->view('Admin/Posts/index', $data);
    }

    public function add_post()
    {
        try {
            $postmodel =  $this->load->model('postmodel');
            $posts = 'posts';
            $data['posts'] = $postmodel->list_post($posts);

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
            $postmodel = $this->load->model('postmodel');
            $posts = 'posts';

            $name = $_POST['name'];
            $category_id = $_POST['category_id'];
            $user_id = $_POST['user_id'];
            $title = $_POST['title'];
            $content = $_POST['content'];
            $description = $_POST['description'];
            $picture = $_FILES['picture']['name'];
            $tmp_image = $_FILES['picture']['tmp_name'];
            $image_detail = $_FILES['image_detail']['name'];
            // $tmp_image = $_FILES['image_detail']['tmp_name'];

            $div = explode('.', $picture);
            $file_ext = strtolower(end($div));
            $unique_image = $div[0] . time() . '.' . $file_ext;
            // $unique_image_detali = $div[1] . time() . '.' . $file_ext;



            $path_uploads = "Public/Image-post/" . $unique_image;
            // $path_uploads = "Public/image-post-detail/" . $unique_image_detali;

            $data = array(
                'name' => $name,
                'category_id' => $category_id,
                'user_id' => $user_id,
                'title' => $title,
                'content' => $content,
                'description' => $description,
                'picture' => $unique_image,
                'image_detail' => $image_detail
            );
            $result = $postmodel->insertpost($posts, $data);

            if ($result == 1) {
                move_uploaded_file($tmp_image, $path_uploads);
                $message['msg'] = 'Thêm dữ liệu thành công';
            } else {
                $message['msg'] = 'Thêm dữ liệu thất bại';
            }
            var_dump($result);

            header("Location:" . BASE_URL . "post/index");
        } catch (PDOException $e) {
            var_dump($data);
            die();
            header("Location:" . BASE_URL . "post/add_post");

            $error = $e->getMessage();
            echo 'Error creating' . $error;
            exit();
        }
    }

    public function editpost($id)
    {
        var_dump($id);
        die();
        $postmodel = $this->load->model('postmodel');
        $posts = 'posts';

        $categorymodel = $this->load->model('categorymodel');
        $categories = 'categories';
        $data['categories'] = $categorymodel->category($categories);

        $usermodel = $this->load->model('usermodel');
        $user = 'user';
        $data['user'] = $usermodel->user($user);

        $cond = "id='$id'";
        $data['postbyid'] = $postmodel->postbyid($posts, $cond);

        $this->load->view('Admin/Categories/edit', $data);
    }

    public function updatepost($id)
    {

        $categorymodel = $this->load->model('categorymodel');
        $table = 'categories';
        $cond = "id='$id'";

        $name = $_POST['name'];
        $paren_id = $_POST['paren_id'];
        $user_id = $_POST['user_id'];

        $data = array(
            'name' => $name,
            'paren_id' => $paren_id,
            'user_id' =>  $user_id
        );

        $result = $categorymodel->updatepost($table, $data, $cond);

        if ($result == 1) {
            // $message['msg'] = 'Chỉnh sửa dữ liệu thành công';
            echo "thành công";
        } else {
            // $message['msg'] = 'Chỉnh sửa liệu thất bại';
            echo "Lỗi";
        }
    }


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