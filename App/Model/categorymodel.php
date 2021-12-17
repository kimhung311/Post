<?php
class CategoryModel extends DModel
{
    public function __construct()
    {
        parent::__construct();
    }

    public function category($categories)
    {
        $sql = "SELECT * FROM $categories";
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

    public function deletecategory($posts, $cond)
    {
        return $this->db->delete($posts, $cond);
    }
}