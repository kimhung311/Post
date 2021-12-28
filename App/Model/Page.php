<?php
    class Page extends DModel
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function Category($categories)
        {
            $sql = "SELECT * FROM $categories  ";
            return $this->db->select($sql); // truyền tham số table vào select()
        }

        public function Post($posts)
        {            
            $sql = "SELECT * FROM $posts ORDER BY created_at DESC"; // note 
            return $this->db->select($sql);
        }

          public function LatestNew($posts, $categories)
        {            
            $sql = "SELECT *, $posts.id as 'posts_id', $categories.category_name FROM $posts INNER JOIN $categories ON $posts.category_id = $categories.id  ORDER BY posts.created_at DESC"; // note 
            return $this->db->select($sql);
        }

        public function listPosts($posts)
        {
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
            } else {
                $page = 1;
            }
            $row = 4;
            $from = ($page - 1) * $row;
            $sql = "SELECT * FROM $posts ORDER BY created_at DESC LIMIT $from, $row ";
            return $this->db->select($sql);
        }

        public function listPapulator($posts) {
            $sql = "SELECT * FROM $posts WHERE total_view > 10 ORDER BY total_view DESC  ";
            return $this->db->select($sql);
        }
        
        public function TrendingTags($posts, $categories){
            $sql = "SELECT *, $posts.id as 'posts_id', $categories.category_name FROM $posts INNER JOIN $categories ON $posts.category_id = $categories.id WHERE $posts.total_view > 10 ORDER BY total_view DESC LIMIT 10 ";
             return $this->db->select($sql);
            
        }
        
        public function RecentPost($postTable){
            $sql = "SELECT * FROM $postTable ORDER BY created_at DESC LIMIT 1";
           
            return $this->db->select($sql);
        }
        
        public function PostById($posts, $cond)
        {//sửa cái name á
            $sql = "SELECT * FROM $posts WHERE $cond ";
            return $this->db->select($sql);
        }

        public function CommentById($comment, $user,$postId)
        {
            $sql = "SELECT * FROM $comment WHERE  $comment.post_id = $postId";
            // $sql = "SELECT *,$comment.id FROM $user, $comment WHERE  $comment.user_id=$user.id OR  ORDER BY $comment.created_at DESC"; 
            return $this->db->select($sql);
        }
        public function Comments($comment, $user, $posts)
        {
            $sql = "SELECT *, $comment.id , $user.name, $posts.id FROM (($comment INNER JOIN $user ON $comment.user_id = $user.id) INNER JOIN $posts ON $comment.post_id = $posts.id) LIMIT 6";
            return $this->db->select($sql); // truyền tham số table vào select()
        }

        public function insertComment($comment,  $data)
        {
            return $this->db->insert($comment,  $data);
        }

        public function  CategoryByIdHome($categories, $postTable, $id)
        {
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
            } else {
                $page = 1;
            }
            $row = 2;
            $from = ($page - 1) * $row;
            $sql = "SELECT * FROM $categories, $postTable WHERE $categories.id = $postTable.category_id AND $postTable.category_id = '$id' ORDER BY $postTable.category_id DESC LIMIT $from, $row";
            return $this->db->select($sql);
        }

        public function  ReCommended($postTable)
        {
            $sql = "SELECT * FROM $postTable WHERE total_view = (SELECT MAX(total_view) FROM $postTable) LIMIT 1";
            return $this->db->select($sql);
        }

        public function  Bestoftheweek($comment, $postTable)
        {
            $sql = "SELECT * FROM $comment, $postTable WHERE $comment.post_id = $postTable.id  ORDER BY $postTable.id, $comment.created_at DESC ";
            return $this->db->select($sql);
        }

        public function User($user)
        {
            $sql = "SELECT * FROM $user";
            return $this->db->select($sql);
        }

        public function loginCustomer($tabl_user, $email, $password)
        {
            $sql = " SELECT * FROM $tabl_user WHERE email =? AND password =? ";
            return $this->db->affectedRows($sql, $email, $password); // truyền tham số table vào select()

        }

        public function checkLogin($tabl_user, $email, $password)
        {
            $sql = " SELECT * FROM $tabl_user WHERE email =? AND password =? ";
            return $this->db->selectadmin($sql, $email, $password); // truyền tham số table vào select()

        }


        // public function search($table, $name, $value)
        // {
        //     $sql = "SELECT * FROM $table WHERE $name LIKE $value ";
        //     return $this->db->search($table, $name, $value);
        // }
    }