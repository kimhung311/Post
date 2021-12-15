<?php
class category extends DController
{

    public function __construct()
    {
        $data = array();
        $message = array();
        parent::__construct(); // parent từ cha nó DController
    }

    public function list_category()
    {
        try {
            $categorymodel = $this->load->model('categorymodel');
            $categories = 'categories';
            $data['categories'] = $categorymodel->category($categories);
            $this->load->view('Admin/Categories/index', $data);
        } catch (PDOException $e) {
            $error = $e->getMessage();
            echo 'Error creating' . $error;
            exit();
        }
    }

    public function addcategory()
    {
        try {
            $categorymodel = $this->load->model('categorymodel');
            $categories = 'categories';
            $data['categories'] = $categorymodel->category($categories);

            $usermodel = $this->load->model('usermodel');
            $user = 'user';
            $data['user'] = $usermodel->user($user);

            $this->load->view('Admin/Categories/create', $data);
        } catch (PDOException $e) {
            $error = $e->getMessage();
            echo 'Error creating' . $error;
            exit();
        }
    }
    public function insertcategory()
    {

        try {

            $categorymodel = $this->load->model('categorymodel');
            $categories = 'categories';
            $category_name = $_POST['category_name'];
            $paren_id = $_POST['paren_id'];
            $user_id = $_POST['user_id'];

            $data = array(
                'category_name' => $category_name,
                'paren_id' => $paren_id,
                'user_id' => $user_id
            );
            $result = $categorymodel->insertcategory($categories, $data);
            var_dump($result);
            if ($result == 1) {
                $message['msg'] = 'Thêm dữ liệu thành công';
            } else {
                $message['msg'] = 'Thêm dữ liệu thất bại';
            }
            header("Location:" . BASE_URL . "category/list_category");
        } catch (PDOException $e) {
            $error = $e->getMessage();
            echo 'Error creating' . $error;
            exit();
        }
    }

    public function editcate($id)
    {
        $categorymodel = $this->load->model('categorymodel');
        $categories = 'categories';

        $usermodel = $this->load->model('usermodel');
        $user = 'user';
        $data['user'] = $usermodel->user($user);

        $cond = "id='$id'";
        $data['categorybyid'] = $categorymodel->categorybyid($categories, $cond);

        $this->load->view('Admin/Categories/edit', $data);
    }

    public function updatecategory($id)
    {

        $categorymodel = $this->load->model('categorymodel');
        $table = 'categories';
        $cond = "id='$id'";

        $category_name = $_POST['category_name'];
        $paren_id = $_POST['paren_id'];
        $user_id = $_POST['user_id'];

        $data = array(
            'category_name' => $category_name,
            'paren_id' => $paren_id,
            'user_id' =>  $user_id
        );

        $result = $categorymodel->updatecategory($table, $data, $cond);

        if ($result == 1) {
            // $message['msg'] = 'Chỉnh sửa dữ liệu thành công';
            echo "thành công";
        } else {
            // $message['msg'] = 'Chỉnh sửa liệu thất bại';
            echo "Lỗi";
        }
    }

    public function deletecate($id)
    {
        $categorymodel = $this->load->model('categorymodel');
        $categories = 'categories';
        $result = $categorymodel->category($categories);

        $cond = "id='$id'";

        $result = $categorymodel->deletecategory($categories, $cond);
        if ($result == 1) {
            // $message['msg'] = 'Chỉnh sửa dữ liệu thành công';
            echo "xoá thành công";
            header("Location:" . BASE_URL . "category/list_category");
        } else {
            $message['msg'] = 'Chỉnh sửa liệu thất bại';
            header("Location:" . BASE_URL . "category/list_category");
        }
    }
}