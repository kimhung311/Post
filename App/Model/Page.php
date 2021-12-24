<?php
class Page extends DModel
{
    public function __construct()
    {
        parent::__construct();
    }

    public function category($categories)
    {
        $sql = "SELECT * FROM $categories  ";
        return $this->db->select($sql); // truyền tham số table vào select()
    }

    public function post($posts)
    {
        $sql = "SELECT * FROM $posts ORDER BY created_at DESC";
        return $this->db->select($sql);
    }

    public function postbyid($posts, $cond)
    {//sửa cái name á
        $sql = "SELECT * FROM $posts WHERE $cond ";
        return $this->db->select($sql);
    }

    public function commentbyid($comment, $postId)
    {
        $sql = "SELECT * FROM $comment WHERE  $comment.post_id = $postId";
        return $this->db->select($sql);
    }
    public function topcomment($comment, $user)
    {
        $sql = "SELECT *, $comment.id  FROM $user, $comment WHERE  $comment.user_id=$user.id  ORDER BY $comment.comment DESC  LiMIT 5  ";
        return $this->db->select($sql); // truyền tham số table vào select()
    }

    public function insertcomment($comment,  $data)
    {
        return $this->db->insert($comment,  $data);
    }

    public function  categorybyid_home($categories, $postTable, $id)
    {
        $sql = "SELECT * FROM $categories, $postTable WHERE $categories.id = $postTable.category_id AND $postTable.category_id = '$id' ORDER BY $postTable.category_id DESC";
        return $this->db->select($sql);
    }

    public function  cate_relate($categories, $postTable)
    {
        $sql = "SELECT * FROM $categories, $postTable WHERE $categories.id = $postTable.category_id  ORDER BY $postTable.category_id DESC LIMIT 3";
        return $this->db->select($sql);
    }

    public function  best_of_the_week($categories, $postTable)
    {
        $sql = "SELECT * FROM $categories, $postTable WHERE $categories.id = $postTable.category_id  ORDER BY $postTable.category_id DESC ";
        return $this->db->select($sql);
    }

    public function user($user)
    {
        $sql = "SELECT * FROM $user";
        return $this->db->select($sql);
    }

    public function login_customer($tabl_user, $email, $password)
    {
        $sql = " SELECT * FROM $tabl_user WHERE email =? AND password =? ";
        return $this->db->affectedRows($sql, $email, $password); // truyền tham số table vào select()

    }

    public function check_login($tabl_user, $email, $password)
    {
        $sql = " SELECT * FROM $tabl_user WHERE email =? AND password =? ";
        return $this->db->selectadmin($sql, $email, $password); // truyền tham số table vào select()

    }


    public function search($table, $name, $value)
    {
        $sql = "SELECT * FROM $table WHERE $name LIKE $value ";
        return $this->db->search($table, $name, $value);
    }
}