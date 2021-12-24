<?php 
    class comment extends DController{

        private $commentModel;
        private $userModel;

        public $comments = 'comments';
        public $user = 'user';

        public function __construct(){
            Session::checkSessionAuth();

            $data = array();
            $message = array();
            parent::__construct(); // parent từ cha nó DController
            $this->commentModel =  $this->load->model('CommentModel');
        }

        public function index() {
            try {
                // Session::checkSessionAuth();
                $data['comments'] = $this->commentModel->comment($this->comments);
               
                $this->load->view('Admin/Comments/index', $data);
            } catch (PDOException $e) {
                $error = $e->getMessage();
                echo 'Error creating' . $error;
                exit();
            }
        }

        public function delete($id)
        {
            try {
                $cond = "id='$id'";

                $result = $this->commentModel->deletecomment($this->comments, $cond);

                if ($result == 1) {
                    $_SESSION['alert']['msg'] = 'Delete data successfully';
                } else {
                    $_SESSION['alert']['error'] = 'Delete data failed';
                }
                header("Location:" . BASE_URL . "comment/index");
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                echo "Database error: $error_message";
            }
        }
      
    }
    
?>