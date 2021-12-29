<?php
// session_start();
    class CommentModel  extends DModel
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function Comment($comments, $posts, $user)
        {
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
            } else {
                $page = 1;
            }
            $row = 5;
            $from = ($page - 1) * $row;
            $sql = "SELECT *, $comments.id , $posts.title, $user.name FROM (($comments INNER JOIN $posts ON $comments.post_id = $posts.id) INNER JOIN $user ON $comments.user_id = $user.id) LIMIT $from, $row ";
            return $this->db->select($sql); // truyền tham số table vào select()
        }

        public function deleteComment($posts, $cond)
        {
            return $this->db->delete($posts, $cond);
        }
    }