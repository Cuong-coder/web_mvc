<?php

    class login extends DController{
        
        public function __construct(){
            $message = array();
            $data = array();
            Session::checkSession();
            parent:: __construct();
            Session::set('login',true);
            
        }

        public function index(){
           $this->login();
        }
        public function login(){

            $this->load->view('header');
            Session::init();
            if(Session::get('login') == true){
                header("Location:".BASE_URL."login/dashboard");
            }
            $this->load->view('cpanel/login_form');
            $this->load->view('footer');
        }

        public function dashboard(){
            Session::init();
            $this->load->view('cpanel/header');
            $this->load->view('cpanel/menu');
            $this->load->view('cpanel/dashboard');
            $this->load->view('cpanel/footer');

        }

        public function login_authen(){

           
           $username = $_POST['username'];
           $password = md5($_POST['password']);
           $table_admin = 'tbl_admin';
           $login_model = $this->load->model('login_model');
           $count = $login_model->login($table_admin,$username, $password);

            if($count == 0){
                $message['msg'] = "User name hoac mat khau sai";
                header("Location:".BASE_URL."login");
                echo "khoong ton tai";
            }else{
                $result = $login_model->getlogin($table_admin,$username, $password);
                Session::init();
                Session::set('login',true);
                Session::set('username',$result[0]['username']);
                Session::set('userid',$result[0]['admin_id']);

                header("Location:".BASE_URL."login/dashboard");
               // header("Location:".BASE_URL."index");

            }

        }

        public function logout(){
            Session::init();
            Session::destroy();
            header('Location:'.BASE_URL."login");
        }





    }



?>