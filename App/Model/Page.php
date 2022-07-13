<?php
    class Page extends DModel
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function Category($categories)
        {
            $sql = "SELECT * FROM $categories  LIMIT 5";
            return $this->db->select($sql); // truyền tham số table vào select()
        }
        
        public function listPosts($posts)  // List Menu Post
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
        
        public function Post($posts)
        {            
            $sql = "SELECT * FROM $posts ORDER BY created_at DESC"; // Slide Home Page
            return $this->db->select($sql);
        }

       public function OtherPost($post, $categories){ //  tin kkhác home page
           $sql = "SELECT *, $post.id as 'post_id', $categories.id FROM $post INNER JOIN $categories ON $post.category_id = $categories.id  GROUP BY $post.created_at ASC LIMIT 4";
        //   $sql = "SELECT * FROM $post  ORDER BY created_at ASC, title DESC LIMIT 3  ";
          return $this->db->select($sql);
       }

        public function listPapulator($posts) {   // Popular Home Page lượt xem bài nhiều
            $sql = "SELECT * FROM $posts WHERE total_view > 40 ORDER BY total_view  DESC  ";
            
            return $this->db->select($sql);
        }

        public function LatestNew($posts, $categories)  // Last New Home Page
        {
            $sql = "SELECT *, $posts.id , $categories.category_name FROM $posts INNER JOIN $categories ON $posts.category_id = $categories.id  GROUP BY  $posts.category_id DESC"; // note  $posts.created_at  OR
            return $this->db->select($sql);
        }
      
        
        public function TrendingTags($posts, $categories){ //Trending tags  xu hướng người đọc hay xem
            $sql = " SELECT *, $posts.id, $categories.id FROM $posts INNER JOIN $categories ON $posts.category_id = $categories.id WHERE $posts.total_view >20 GROUP BY $categories.category_name; LIMIT 5 ";
             return $this->db->select($sql);
           
        }
        
        public function HotNew($postTable){ //  hiện thì bài viết có số lượt xem và comment nhiều nhất
            // $sql = "SELECT *, $postTable.id, $comment.id FROM $postTable INNER JOIN $comment ON $postTable.id = $comment.post_id ORDER BY $postTable.total_view LIMIT 5";
            $sql = "SELECT * FROM $postTable WHERE $postTable.hot_new = '1'  ORDER BY created_at DESC LIMIT 5 ";
            return $this->db->select($sql);

        }
        
        public function RecentPost($postTable){
            $sql = "SELECT * FROM $postTable  ORDER BY RAND() LIMIT 1";
           
            return $this->db->select($sql);
        }
        
        public function PostById($posts, $cond)
        {//sửa cái name á
            $sql = "SELECT * FROM $posts WHERE $cond ";
            return $this->db->select($sql);
        }

        public function CommentById($comment, $user,$postId)   // comment post detail
        {
            $sql = "SELECT * FROM $comment WHERE  $comment.post_id = $postId";
            // $sql = "SELECT *,$comment.id FROM $user, $comment WHERE  $comment.user_id=$user.id OR  ORDER BY $comment.created_at DESC"; 
            return $this->db->select($sql);
        }
        public function Comments($comment, $user, $posts) // created comment home page
        {
            $sql = "SELECT *, $comment.id , $user.name, $posts.id FROM (($comment INNER JOIN $user ON $comment.user_id = $user.id) INNER JOIN $posts ON $comment.post_id = $posts.id) LIMIT 6";
            return $this->db->select($sql); // truyền tham số table vào select()
        }

        public function insertComment($comment,  $data)
        {
            return $this->db->insert($comment,  $data);
        }

        public function  CategoryByIdHome($categories, $postTable, $id) // list of categories
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

        public function  ReCommended($comment, $post) /// lược xem nhiều nhất 
        {
            $sql = "SELECT *, $comment.id , posts.id FROM $comment  INNER JOIN $post ON $comment.post_id = $post.id WHERE $comment.comment = (SELECT MAX(comment) FROM $comment) LIMIT 1";
            // $sql = "SELECT * FROM $comment WHERE comment = (SELECT MAX(comment) FROM $comment) LIMIT 1";
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

        public function AuthorInfo($user, $posts, $cond){
           $sql = " SELECT *,  COUNT($user.id) as 'total_post' , $posts.id  FROM $user
                    INNER JOIN $posts ON $user.id = $posts.author_id
                    WHERE  $user.$cond";
            return $this->db->select($sql);

        }

    }