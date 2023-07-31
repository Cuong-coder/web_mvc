<?php

class Session{
    public static function init(){
        session_start();
    }

    public static function set($key, $val){
        $_SESSION[$key] = $val;
    }

    public static function get($key){
        if(isset($_SESSION[$key])){
            return $_SESSION[$key];
        }else{
            return false;
        }
    }
    public static function destroy(){
        session_destroy();
    }

    public static function unset($key){
        unset($_SESSION[$key]);
    }
    //hàm check login 
    public static function checkSession(){
        self::init(); //start session
        // trường hợp không có biến $_SESSION['login']
        if(self::get('login') == false){
            self::destroy();// Hủy toàn bộ session
            header('Location:'.BASE_URL."login");//trở về trang đăng nhập
        }else{

        }
    }


}

?>