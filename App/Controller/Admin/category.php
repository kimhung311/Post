<?php
session_start();
class category extends DController
{
    private $categoryModel;
    private $userModel;

    public $categories = 'categories';
    public $user = 'user';
    public function __construct()
    {
        $data = array();
        $message = array();
        parent::__construct(); // parent từ cha nó DController
        $this->categoryModel =  $this->load->model('CategoryModel');
        $this->userModel = $this->load->model('UserModel');
    }

    public function list_category()
    {
        try {
            $data['categories'] = $this->categoryModel->category($this->categories);
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
            $data['categories'] = $this->categoryModel->category($this->categories);
            $data['user'] = $this->userModel->user($this->user);
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
            $category_name = $_POST['category_name'];
            $paren_id = $_POST['paren_id'];
            $user_id = $_POST['user_id'];

            $data = array(
                'category_name' => $category_name,
                'paren_id' => $paren_id,
                'user_id' => $user_id
            );
            $result = $this->categoryModel->insertcategory($this->categories, $data);
            if ($result == 1) {
                $_SESSION['msg'] = 'Successful Data Generation';
            } else {
                $_SESSION['error'] = ' Data Generation failed';
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

        try {
            $data['user'] = $this->userModel->user($this->user);
            $cond = "id='$id'";
            $data['categorybyid'] = $this->categoryModel->categorybyid($this->categories, $cond);
            $this->load->view('Admin/Categories/edit', $data);
        } catch (PDOException $e) {
            $error = $e->getMessage();
            echo 'Error creating' . $error;
            exit();
        }
    }

    public function updatecategory($id)
    {
        try {
            $cond = "id='$id'";

            $category_name = $_POST['category_name'];
            $paren_id = $_POST['paren_id'];
            $user_id = $_POST['user_id'];

            $data = array(
                'category_name' => $category_name,
                'paren_id' => $paren_id,
                'user_id' =>  $user_id
            );

            $result = $this->categoryModel->updatecategory($this->categories, $data, $cond);

            if ($result == 1) {
                $_SESSION['msg'] = 'Edit Successful data ';
            } else {
                $_SESSION['error'] = 'Edit Whether Fail';
            }
            header("Location:" . BASE_URL . "category/list_category");
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "Database error: $error_message";
        }
    }

    public function deletecate($id)
    {
        try {
            $cond = "id='$id'";

            $result = $this->categoryModel->deletecategory($this->categories, $cond);

            if ($result == 1) {
                $_SESSION['msg'] = 'Delete data successfully';
            } else {
                $_SESSION['error'] = 'Delete data failed';
            }
            header("Location:" . BASE_URL . "category/list_category");
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "Database error: $error_message";
        }
    }
}