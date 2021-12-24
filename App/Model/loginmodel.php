<?php
class LoginModel  extends DModel
{

    public function __construct()
    {
        parent::__construct();
    }
    public function login($tabl_user, $email, $password)
    {
        $sql = " SELECT * FROM $tabl_user WHERE email =? AND password =? ";
        return $this->db->affectedRows($sql, $email, $password); // truyền tham số table vào select()
      
    }

    public function getlogin($tabl_user, $email, $password) {
        $sql = " SELECT * FROM $tabl_user WHERE email =? AND password =? ";
        return $this->db->selectadmin($sql, $email, $password); // truyền tham số table vào select()
        
    }


 

}

?>