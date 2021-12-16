<?php
class post extends DController
{
    private $categoryModel;
    private $postModel;
    private $userModel;

    public $postTable = 'posts';
    public $categories = 'categories';
    public $user = 'user';

    public function __construct()
    {
        $data = array();
        $message = array();
        parent::__construct();
        $this->categoryModel =  $this->load->model('CategoryModel');
        $this->userModel = $this->load->model('UserModel');
        $this->postModel =  $this->load->model('PostModel');
    }

    public function index()
    {

        // $postModel = $this->load->model('postModel');
        $data['posts'] = $this->postModel->post($this->postTable, $this->categories);
        $this->load->view('Admin/Posts/index', $data);
    }

    public function add_post()
    {
        try {
            $data['posts'] = $this->postModel->list_post($this->postTable);

            $data['categories'] = $this->categoryModel->category($this->categories);

            $data['user'] = $this->userModel->user($this->user);

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

            $name = $_POST['name'];
            $category_id = $_POST['category_id'];
            $user_id = $_POST['user_id'];
            $title = $_POST['title'];
            $content = $_POST['content'];
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
                'name' => $name,
                'category_id' => $category_id,
                'user_id' => $user_id,
                'title' => $title,
                'content' => $content,
                'description' => $description,
                'picture' => $unique_image,
                'image_detail' => $unique_image_detali
            );
            $result = $this->postModel->insertpost($this->postTable, $data);

            if ($result == 1) {
                // $pathpic = $_SERVER['DOCUMENT_ROOT'] . '/Shop_go/images/' . $picture;
                move_uploaded_file($tmp_image, $path_upload);
                move_uploaded_file($tmp_detail, $path_uploads);
                $message['msg'] = 'Thêm dữ liệu thành công';
            } else {
                $message['msg'] = 'Thêm dữ liệu thất bại';
            }

            header("Location:" . BASE_URL . "post/index");
        } catch (PDOException $e) {
            die();
            header("Location:" . BASE_URL . "post/add_post");

            $error = $e->getMessage();
            echo 'Error creating' . $error;
            exit();
        }
    }

    public function editpost($id)
    {

        $data['categories'] = $this->categoryModel->category($this->categories);
        
        $data['user'] = $this->userModel->user($this->user);

        $cond = "id='$id'";
        $data['postbyid'] = $this->postModel->postbyid($this->postTable, $cond);
        $this->load->view('Admin/Posts/edit', $data);
    }

    public function updatepost($id)
    {
        try {
            $cond = "id='$id'";


            $name = $_POST['name'];
            $category_id = $_POST['category_id'];
            $user_id = $_POST['user_id'];
            $title = $_POST['title'];
            $content = $_POST['content'];
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
                $data['postbyid'] = $this->postModel->postbyid($this->postTable, $cond);
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
                    'name' => $name,
                    'category_id' => $category_id,
                    'user_id' => $user_id,
                    'title' => $title,
                    'content' => $content,
                    'description' => $description,
                    'picture' => $unique_image,
                    'image_detail' => $unique_image_detali
                );
            } else {
                $data = array(
                    'name' => $name,
                    'category_id' => $category_id,
                    'user_id' => $user_id,
                    'title' => $title,
                    'content' => $content,
                    'description' => $description,
                  
                );
            }
            $result = $this->postModel->updatepost($this->postTable, $data, $cond);

            if ($result == 1) {
                $message['msg'] = 'Thêm dữ liệu thành công';
            } else {
                $message['msg'] = 'Thêm dữ liệu thất bại';
            }

            header("Location:" . BASE_URL . "post/index");
        } catch (PDOException $e) {
            header("Location:" . BASE_URL . "post/edit");

            $error = $e->getMessage();
            echo 'Error creating' . $error;
            exit();
        }
    }


    public function delete_post($id)
    {
        try {
            $cond = "id='$id'";

            $result = $this->postModel->deletepost($this->postTable, $cond);
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