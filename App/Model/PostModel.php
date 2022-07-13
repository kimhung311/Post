<?php
    class PostModel  extends DModel
    {
        const POST_TABLE = 'posts';

        public function __construct()
        {
            parent::__construct();
        }

        public function Post($posts, $categories, $user)
        {
            if (isset($_GET['page'])) {
            $page = $_GET['page'];
            } else {
                $page = 1;
            }
            $row = 5;
            $from = ($page - 1) * $row;

            $sql = "SELECT *, $posts.id as 'posts_id',  $categories.category_name, $user.name FROM (($posts INNER JOIN $categories ON $posts.category_id = $categories.id) INNER JOIN $user ON $posts.user_id = $user.id)  LIMIT $from, $row ";
            
            return $this->db->select($sql); // truyền tham số table vào select()
        }

        public function listPost($posts)
        {
            $sql = "SELECT * FROM $posts";
            return $this->db->select($sql); // truyền tham số table vào select()
        }

        public function insertPost($posts, $data)
        {
            return $this->db->insert($posts, $data);
        }

        public function PostById($posts, $cond)
        {
            $sql = "SELECT * FROM $posts WHERE $cond LIMIT 1";
            return $this->db->selectRowOnly($sql);
        }

        public function PostEditId($posts, $cond)
        {
            $sql = "SELECT * FROM $posts WHERE $cond LIMIT 1";
            return $this->db->select($sql);
        }

        public function PostViewById($posts, $categories, $user, $cond){
            $sql = "SELECT *, $posts.id as 'post_id', $categories.id, $user.id  , $user.name as 'user_name' 
            FROM (($posts INNER JOIN $categories ON $posts.category_id = $categories.id)
            INNER JOIN $user ON $posts.user_id = $user.id ) WHERE $posts.$cond";
            return $this->db->selectRowOnly($sql);
            
        }

        public function updatePost($table, $data, $cond)
        {
            return $this->db->update($table, $data, $cond);
        }

        public function deletePostComment($posts, $comments , $cond)
        {
            return $this->db->deletePostComment($posts, $comments,  $cond);
        }

    }