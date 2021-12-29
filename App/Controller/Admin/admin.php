<?php
// session_start();

class Admin extends DController
{
    private $userModel;
    private $adminTable = 'user';
    public function __construct()
    {
        Session::checkSessionAuth();
        $data = array();
        $message = array();
        parent::__construct(); // parent từ cha nó DController
        $this->userModel =  $this->load->model('UserModel');
    }

    public function homeAdmin()
    {
        $this->load->view('Admin/List-admin/index');
    }
    public function notfound()
    {
        $this->load->view('Error/error_404');
    }
    public function listAdmin()
    {
        try {
            $this->load->view('Admin/Layouts/master');
            $data['user'] = $this->userModel->User($this->adminTable);
            $this->load->view('Admin/Users/index', $data);
        } catch (PDOException $e) {
            $error = $e->getMessage();
            echo 'Error creating' . $error;
            exit();
        }
    }

    public function listCustomer()
    {
        try {
            $this->load->view('Admin/Layouts/master');
            $data['user'] = $this->userModel->Customer($this->adminTable);
            $this->load->view('Admin/Users/list_customer', $data);
        } catch (PDOException $e) {
            $error = $e->getMessage();
            echo 'Error creating' . $error;
            exit();
        }
    }

    public function Register()
    {
        $this->load->view('Admin/Layouts/master');

        $this->load->view('Admin/Users/create');
    }

    public function AddRegister()
    {
        try {
            $email = $_POST['email'];
            $password = md5($_POST['password']);
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

            $data = array(
                'email' => $email,
                'password' => $password,
                'role_id' => $role_id,
                'type' => $type,
                'address' => $address,
                'avatar' => $unique_image,
                'phone' => $phone
            );

            $result = $this->userModel->insertUser($this->adminTable, $data);

            if ($result == 1) {
                move_uploaded_file($tmp_image, $path_upload);
                header("Location:" . BASE_URL . "Admin/listAdmin");
                $_SESSION['alert']['msg'] = 'Successful Data Generation';
            } else {
                $_SESSION['alert']['error'] = ' Data Generation failed';
                header("Location:" . BASE_URL . "Admin/Register");
            }
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "Database error: $error_message";
        }
    }

    public  function editUser($id)
    {
        try {
            $this->load->view('Admin/Layouts/master-2');
            $data['user'] = $this->userModel->Customer($this->adminTable);
            $cond = "id='$id'";
            $data['userbyid'] = $this->userModel->UserByid($this->adminTable, $cond);
            $this->load->view('Admin/Users/edit', $data);
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "Database error: $error_message";
        }
    }

    public function updateUser($id)
    {
        try {
            $cond = "id='$id'";
            $email = $_POST['email'];
            $password = md5($_POST['password']);
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
                $data['userbyid'] = $this->userModel->userbyid($this->adminTable, $cond);
                foreach ($data['userbyid'] as $user) {
                    if ($user['avatar']) {
                        $path_unlink = "Public/User-image/";
                        unlink($path_unlink . $user['avatar']);
                    }
                }
                move_uploaded_file($tmp_image, $path_upload);
                $data = array(
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
                    'email' => $email,
                    'password' => $password,
                    'role_id' => $role_id,
                    'type' => $type,
                    'address' => $address,
                    'phone' => $phone
                );
            }

            $result = $this->userModel->updateUser($this->adminTable, $data, $cond);
            if ($result == 1) {
                $_SESSION['alert']['msg'] = 'Edit Successful data ';
                header("Location:" . BASE_URL . "Admin/listAdmin");
            } else {
                $_SESSION['alert']['error'] = 'Edit Whether Fail';
                header("Location:" . BASE_URL . "Admin/Register");
            }
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "Database error: $error_message";
        }
    }

    public function deleteUser($id)
    {
        try {
            $cond = "id='$id'";
            $result = $this->userModel->deleteUser($this->adminTable, $cond);

            if ($result == 1) {
                $_SESSION['alert']['msg'] = 'Delete data successfully';
                header("Location:" . BASE_URL . "Admin/listAdmin");
            } else {
                $_SESSION['alert']['error'] = 'Delete data failed';
                header("Location:" . BASE_URL . "Admin/listAdmin");
            }
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "Database error: $error_message";
        }
    }
}
