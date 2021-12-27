<?php
// session_start();
    class Comment_M  extends DModel
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function comment($comments)
        {
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
            } else {
                $page = 1;
            }
            $row = 2;
            $from = ($page - 1) * $row;
            $sql = "SELECT * FROM $comments LIMIT $from, $row ";
            return $this->db->select($sql); // truyền tham số table vào select()
        }

        public function deletecomment($posts, $cond)
        {
            return $this->db->delete($posts, $cond);
        }
    }