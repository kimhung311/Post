<?php
    class Post_M  extends DModel
    {
        const POST_TABLE = 'posts';

        public function __construct()
        {
            parent::__construct();
        }

        public function post($posts, $categories)
        {
            if (isset($_GET['page'])) {
            $page = $_GET['page'];
            } else {
                $page = 1;
            }
            $row = 4;
            $from = ($page - 1) * $row;

            $sql = "SELECT *, $posts.id as 'posts_id' FROM $posts, $categories WHERE  $posts.category_id=$categories.id  LIMIT $from, $row   ";
            return $this->db->select($sql); // truyền tham số table vào select()
        }

        public function list_post($posts)
        {
            $sql = "SELECT * FROM $posts";
            return $this->db->select($sql); // truyền tham số table vào select()
        }

        public function insertpost($posts, $data)
        {
            return $this->db->insert($posts, $data);
        }

        public function postbyid($posts, $cond)
        {
            $sql = "SELECT * FROM $posts WHERE $cond ";
            return $this->db->select($sql);
        }

        public function updatepost($table, $data, $cond)
        {
            return $this->db->update($table, $data, $cond);
        }

        public function deletepost($table, $cond)
        {
            return $this->db->delete($table, $cond);
        }
    }
?>