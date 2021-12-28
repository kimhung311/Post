<?php
class Category_M  extends DModel
{
    public function __construct()
    {
        parent::__construct();
    }

    public function Category($categories, $user)
    {
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
        $row = 10;
        $from = ($page - 1) * $row;

        $sql = "SELECT *, $categories.id  FROM $categories, $user WHERE $categories.user_id=$user.id LIMIT $from, $row  ";

        return $this->db->select($sql); // truyền tham số table vào select()
    }

    // public function Search($categories, $search, $data)
    // {
    //     $sql = "SELECT * FROM $categories WHERE category_name LIKE '%$search%'";
    //     return $this->db->select($sql); // truyền tham số table vào select()
    // }

    public function insertCategory($categories, $data)
    {
        return $this->db->insert($categories, $data);
    }

    public function CategoryByid($category, $cond)
    {
        $sql = "SELECT * FROM $category WHERE $cond ";
        return $this->db->select($sql);
    }

    public function updateCategory($categories, $data, $cond)
    {
        return $this->db->update($categories, $data, $cond);
    }

    public function deleteCategory($user, $posts, $categories, $comments, $cond)
    {
        return $this->db->delete($user, $posts, $categories, $comments, $cond);
    }
}