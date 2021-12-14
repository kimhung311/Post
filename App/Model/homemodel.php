<?php
class homemodel extends DModel
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


    public function post($posts)
    {
        $sql = "SELECT * FROM $posts";
        return $this->db->select($sql); 
    }


    public function user($user)
    {
        $sql = "SELECT * FROM $user";
        return $this->db->select($sql); 
    }
}