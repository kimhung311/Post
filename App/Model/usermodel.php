<?php
class usermodel extends DModel
{
    public function __construct()
    {
        parent::__construct();
    }

    public function user($user)
    {
        $sql = "SELECT * FROM $user";
        return $this->db->select($sql); // truyền tham số table vào select()
    }

    public function userbyid($user, $id)
    {
        $sql = "SELECT * FROM $user WHERE id = :id ";
        $data = array(':id' => $id);
        return $this->db->select($sql, $data);
    }

    public function insertuser($user, $data)
    {
        return $this->db->insert($user, $data);
    }
}