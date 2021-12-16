<?php
class UserModel extends DModel
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


    public function insertuser($user, $data)
    {
        return $this->db->insert($user, $data);
    }

    public function userbyid($user, $cond)
    {
        $sql = "SELECT * FROM $user WHERE $cond ";
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