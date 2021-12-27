<?php
class Category extends DController
{
    private $categoryModel;
    private $userModel;

    public $categories = 'categories';
    public $user = 'user';
    public $post = 'posts';

    public function __construct()
    {
        Session::checkSessionAuth();
        $data = array();
        $message = array();
        parent::__construct(); // parent từ cha nó DController
        $this->categoryModel =  $this->load->model('Category_M');
        $this->userModel = $this->load->model('User_M');
    }

    public function list_category()
    {
        try {
            $data['user'] = $this->userModel->user($this->user);
            $data['categories'] = $this->categoryModel->category($this->categories, $this->user);
            $this->load->view('Admin/Layouts/master', $data);
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
            $data['user'] = $this->userModel->user($this->user);
            $data['categories'] = $this->categoryModel->category($this->categories, $this->user);
            $this->load->view('Admin/Layouts/master', $data);
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
            if (isset($paren_id) == null) {
                $paren_id = $_POST['paren_id']  = 0;
            }
            $user_id = $_POST['user_id'];

            $data = array(
                'category_name' => $category_name,
                'paren_id' => $paren_id,
                'user_id' => $user_id
            );
            $result = $this->categoryModel->insertcategory($this->categories, $data);
            if ($result == 1) {
                $_SESSION['alert']['msg'] = 'Successful Data Generation';
            } else {
                $_SESSION['alert']['error'] = ' Data Generation failed';
            }
            header("Location:" . BASE_URL . "category/list_category");
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
            $data['userbyid'] = $this->userModel->userbyid($this->user, $cond);
            $this->load->view('Admin/Layouts/master-2', $data);
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
                $_SESSION['alert']['msg'] = 'Edit Successful data ';
            } else {
                $_SESSION['alert']['error'] = 'Edit Whether Fail';
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
            if(isset($result)){ 
                $sql = "DELETE FROM posts WHERE posts.category_id=category.$cond";
                $result = $sql;
                return $result;
                var_dump($result);
                die();
            }
            if ($result == 1) {
                $_SESSION['alert']['msg'] = 'Delete data successfully';
            } else {
                $_SESSION['alert']['error'] = 'Delete data failed';
            }
            header("Location:" . BASE_URL . "category/list_category");
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "Database error: $error_message";
        }
    }
}