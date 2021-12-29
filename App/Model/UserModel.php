<?php
    class UserModel  extends DModel
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function User($user)
        {
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
            } else {
                $page = 1;
            }
            $row = 5;
            $from = ($page - 1) * $row;
            // $sql = "SELECT type  FROM $user WHERE type = 'admin' LIMIT $from, $row ";
            $sql = "SELECT *, type FROM user WHERE type = 'admin' LIMIT $from, $row ";
            return $this->db->select($sql); // truyền tham số table vào select()
        }

        public function Customer($user)
        {
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
            } else {
                $page = 1;
            }
            $row = 5;
            $from = ($page - 1) * $row;
            // $sql = "SELECT type  FROM $user WHERE type = 'admin' LIMIT $from, $row ";
            $sql = "SELECT *, type FROM user WHERE type = 'user' LIMIT $from, $row ";
            return $this->db->select($sql); // truyền tham số table vào select()
        }


        public function insertUser($user, $data)
        {
            return $this->db->insert($user, $data);
        }

        public function UserByid($user, $cond)
        {
            $sql = "SELECT * FROM $user WHERE $cond ";
            return $this->db->select($sql);
        }

        public function updateUser($table, $data, $cond)
        {
            return $this->db->update($table, $data, $cond);
        }

        public function deleteUser($table, $cond)
        {
            return $this->db->delete($table, $cond);
        }

    }
?>