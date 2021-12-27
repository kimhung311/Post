<?php
class Session
{

    public static function init()
    {  // khởi tạo session
        session_start();
    }

    public static function set($key, $value)
    {

        $_SESSION[$key] = $value;
    }

    public static function get($key)
    {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        } else {
            return false;
        }
    }

    public static function checkSessionAuth()
    {
        self::init();
        if (!self::get('login/login') && $_SERVER['REQUEST_URI'] != '/Post/login/login') {
           
            header("Location:" . BASE_URL . "login/login");
            return false;
        }
        return true;
    }

    public static function check_role() {
        if(isset($_SESSION['role_id' == 3]) == true) {
            session_destroy();
            header("Location:" . BASE_URL . "login/login");
        }
    }

    public static function check_login_user(){
        self::init();
        if(isset($_SESSION['auth_user']) == true){
            header("Location:" . BASE_URL . "homepage/");
            return true;
        }
        // return false;
    }

    public static function destroy()
    { // huỷ session
        session_destroy();
    }

    public static function unset($key)
    {
        session_unset($key);
    }
}