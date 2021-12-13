<?php
class homemodel extends DModel
{
    public function __construct()
    {
        parent::__construct();
    }
    public function post($posts)
    {
        return $this->db->select($posts); // truyền tham số table vào select()
    }
    public function admin($user)
    {
        $sql = "SELECT * FROM $user";
        return $this->db->select($sql); // truyền tham số table vào select()
    }
}