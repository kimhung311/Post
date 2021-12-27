<?php
class Category_M  extends DModel
{
    public function __construct()
    {
        parent::__construct();
    }

    public function category($categories, $user)
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

    public function search($categories, $search, $data)
    {
        $sql = "SELECT * FROM $categories WHERE category_name LIKE '%$search%'";
        return $this->db->select($sql); // truyền tham số table vào select()
    }

    public function insertcategory($categories, $data)
    {
        return $this->db->insert($categories, $data);
    }

    public function categorybyid($category, $cond)
    {
        $sql = "SELECT * FROM $category WHERE $cond ";
        return $this->db->select($sql);
    }

    public function updatecategory($categories, $data, $cond)
    {
        return $this->db->update($categories, $data, $cond);
    }

    public function deletecategory($categories, $cond)
    {
        return $this->db->delete($categories, $cond);
    }
}