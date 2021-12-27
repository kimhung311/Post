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
        $this->userModel =  $this->load->model('User_M');
    }

    public function homeadmin()
    {
        $this->load->view('Admin/List-admin/index');
    }
    public function notfound()
    {
        $this->load->view('Error/error_404');
    }
    public function list_admin()
    {
        try {
            $this->load->view('Admin/Layouts/master');
            $data['user'] = $this->userModel->user($this->adminTable);
            $this->load->view('Admin/Users/index', $data);
        } catch (PDOException $e) {
            $error = $e->getMessage();
            echo 'Error creating' . $error;
            exit();
        }
    }

    public function list_customer()
    {
        try {
            $this->load->view('Admin/Layouts/master');
            $data['user'] = $this->userModel->customer($this->adminTable);
            $this->load->view('Admin/Users/list_customer', $data);
        } catch (PDOException $e) {
            $error = $e->getMessage();
            echo 'Error creating' . $error;
            exit();
        }
    }

    public function register()
    {
        $this->load->view('Admin/Layouts/master');

        $this->load->view('Admin/Users/create');
    }

    public function add_register()
    {
        try {
            $name = $_POST['name'];
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
                'name' => $name,
                'email' => $email,
                'password' => $password,
                'role_id' => $role_id,
                'type' => $type,
                'address' => $address,
                'avatar' => $unique_image,
                'phone' => $phone
            );

            $result = $this->userModel->insertuser($this->adminTable, $data);

            if ($result == 1) {
                move_uploaded_file($tmp_image, $path_upload);
                header("Location:" . BASE_URL . "admin/list_admin");
                $_SESSION['alert']['msg'] = 'Successful Data Generation';
            } else {
                $_SESSION['alert']['error'] = ' Data Generation failed';
                header("Location:" . BASE_URL . "admin/register");
            }
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "Database error: $error_message";
        }
    }

    public  function edit_user($id)
    {
        try {
            $this->load->view('Admin/Layouts/master-2');
            $cond = "id='$id'";
            $data['userbyid'] = $this->userModel->userbyid($this->adminTable, $cond);
            $this->load->view('Admin/Users/edit', $data);
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "Database error: $error_message";
        }
    }

    public function update_user($id)
    {
        try {
            $cond = "id='$id'";
            $name = $_POST['name'];
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
                    'name' => $name,
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
                    'name' => $name,
                    'email' => $email,
                    'password' => $password,
                    'role_id' => $role_id,
                    'type' => $type,
                    'address' => $address,
                    'phone' => $phone
                );
            }

            $result = $this->userModel->update_user($this->adminTable, $data, $cond);
            if ($result == 1) {
                $_SESSION['alert']['msg'] = 'Edit Successful data ';
                header("Location:" . BASE_URL . "admin/list_admin");
            } else {
                $_SESSION['alert']['error'] = 'Edit Whether Fail';
                header("Location:" . BASE_URL . "admin/register");
            }
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "Database error: $error_message";
        }
    }

    public function delete_user($id)
    {
        try {
            $cond = "id='$id'";
            $result = $this->userModel->deleteuser($this->adminTable, $cond);
            if ($result == 1) {
                $_SESSION['alert']['msg'] = 'Delete data successfully';
                header("Location:" . BASE_URL . "admin/list_admin");
            } else {
                $_SESSION['alert']['error'] = 'Delete data failed';
                header("Location:" . BASE_URL . "admin/list_admin");
            }
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "Database error: $error_message";
        }
    }
}