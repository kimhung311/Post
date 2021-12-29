<?php
class Category extends DController
{
    private $categoryModel;
    private $userModel;

    public $categories = 'categories';
    public $user = 'user';
    public $post = 'posts';
    public $comments = 'comments';


    public function __construct()
    {
        Session::checkSessionAuth();
        $data = array();
        $message = array();
        parent::__construct(); // parent từ cha nó DController
        $this->categoryModel =  $this->load->model('CategoryModel');
        $this->userModel = $this->load->model('UserModel');
    }

    public function listCategory()
    {
        try {
            // $data['user'] = $this->userModel->user($this->user);
            $data['categories'] = $this->categoryModel->Category($this->categories, $this->user);

            $this->load->view('Admin/Layouts/master', $data);
            $this->load->view('Admin/Categories/index', $data);
        } catch (PDOException $e) {
            $error = $e->getMessage();
            echo 'Error creating' . $error;
            exit();
        }
    }

    public function addCategory()
    {
        try {
            $data['user'] = $this->userModel->user($this->user);
            $data['categories'] = $this->categoryModel->Category($this->categories, $this->user);
            $this->load->view('Admin/Layouts/master', $data);
            $this->load->view('Admin/Categories/create', $data);
        } catch (PDOException $e) {
            $error = $e->getMessage();
            echo 'Error creating' . $error;
            exit();
        }
    }
    public function insertCategory()
    {

        try {
            $category_name = $_POST['category_name'];
            $user_id = $_POST['user_id'];
            $data = array(
                'category_name' => $category_name,
                'user_id' => $user_id
            );
            $result = $this->categoryModel->insertCategory($this->categories, $data);
            if ($result == 1) {
                $_SESSION['alert']['msg'] = 'Successful Data Generation';
            } else {
                $_SESSION['alert']['error'] = ' Data Generation failed';
            }
            header("Location:" . BASE_URL . "Category/listCategory");
        } catch (PDOException $e) {
            $error = $e->getMessage();
            echo 'Error creating' . $error;
            exit();
        }
    }

    public function search($search)
    {
        try {

            $search = $_GET['search'];
            $data =  [
                'search' => $search
            ];

            $result = $this->categoryModel->search($this->categories, $search, $data);
            if ($result == 1) {
                $_SESSION['alert']['msg'] = 'Successful Data Generation';
            } else {
                $_SESSION['alert']['error'] = ' Data Generation failed';
            }
            header("Location:" . BASE_URL . "Category/listCategory");
        } catch (PDOException $e) {
            $error = $e->getMessage();
            echo 'Error creating' . $error;
            exit();
        }
    }


    public function editCate($id)
    {

        try {
            $data['user'] = $this->userModel->user($this->user);
            $cond = "id='$id'";
            $data['categorybyid'] = $this->categoryModel->CategoryByid($this->categories, $cond);
            $data['userbyid'] = $this->userModel->userbyid($this->user, $cond);
            $this->load->view('Admin/Layouts/master-2', $data);
            $this->load->view('Admin/Categories/edit', $data);
        } catch (PDOException $e) {
            $error = $e->getMessage();
            echo 'Error creating' . $error;
            exit();
        }
    }

    public function updateCategory($id)
    {
        try {
            $cond = "id='$id'";

            $category_name = $_POST['category_name'];
            $user_id = $_POST['user_id'];

            $data = array(
                'category_name' => $category_name,
                'user_id' =>  $user_id
            );

            $result = $this->categoryModel->updateCategory($this->categories, $data, $cond);

            if ($result == 1) {
                $_SESSION['alert']['msg'] = 'Edit Successful data ';
            } else {
                $_SESSION['alert']['error'] = 'Edit Whether Fail';
            }
            header("Location:" . BASE_URL . "Category/listCategory");
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "Database error: $error_message";
        }
    }

    public function deleteCate($id)
    {

        try {
            $cond = "id='$id'";
            $result = $this->categoryModel->deleteCategory($this->post, $this->categories, $cond);
            if ($result == 1) {
                $_SESSION['alert']['msg'] = 'Delete data successfully';
            } else {
                $_SESSION['alert']['error'] = 'Delete data failed';
            }
            header("Location:" . BASE_URL . "Category/listCategory");
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "Database error: $error_message";
        }
    }
}
