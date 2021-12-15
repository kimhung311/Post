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
        if (self::get('login/login') == false) {
            self::destroy();
            return true;
        }

        header("Location:" . BASE_URL . "admin/index");
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