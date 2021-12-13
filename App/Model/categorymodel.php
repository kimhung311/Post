<?php
class categorymodel extends DModel
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

    public function categorybyid($categories, $id)
    {
        $sql = "SELECT * FROM $categories WHERE id = :id ";
        $data = array(':id' => $id);
        return $this->db->select($sql, $data);
    }

    public function insertcategory($categories, $data)
    {
        return $this->db->insert($categories, $data);
    }

    public function updatecategory($table, $data, $cond)
    {
        return $this->db->update($table, $data, $cond);
    }

    public function deletecategory($table, $cond)
    {
        return $this->db->delete($table, $cond);
    }
}