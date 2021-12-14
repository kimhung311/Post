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

    public static function checkSession()
    {
        self::init();
        if (self::get('login/login') == false) {
            self::destroy();
            header("Location:" . BASE_URL . "login/login");
        } else {
        }
    }

    public static function destroy()
    { // huỷ session
        session_destroy();
    }

    public static function unset($key)
    { //
        session_unset($key);
    }
}