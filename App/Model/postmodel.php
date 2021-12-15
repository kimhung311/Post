<?php
class postmodel extends DModel
{
    public function __construct()
    {
        parent::__construct();
    }

    public function post($posts, $categories)
    {
        $sql = "SELECT * FROM $posts, $categories WHERE  $posts.category_id=$categories.id ORDER BY $posts.category_id DESC";
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
        $sql = "SELECT * FROM $posts WHERE id = :id ";
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