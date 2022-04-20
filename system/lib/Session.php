<?php

namespace lib;

class Session
{
    public function __construct()
    {
    }
    public static function init()
    {
        session_start();
    }
    public static function setSession($key, $value)
    {
        $_SESSION[$key] = $value;
    }
    public static function getSession($key)
    {
        if (isset($_SESSION["$key"])) {
            return $_SESSION[$key];
        } else return false;
    }
    public static function destroySession()
    {
        session_destroy();
    }
    public static function unsetSession($key)
    {
        session_unset($key);
    }
}
