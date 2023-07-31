<?php
    class post extends DController{

        public function __construct(){
            Session::checkSession();
            parent:: __construct();

            
        }
        public function index() {
            $this->post_detail();
        }
        public function post_detail(){
            $this->load->view('cpanel/header');
            $this->load->view('cpanel/menu');
            $this->load->view('cpanel/post/post_detail');
            $this->load->view('cpanel/footer');
        }
        public function add_post(){
            $this->load->view('cpanel/header');
            $this->load->view('cpanel/menu');
            $this->load->view('cpanel/post/add_post');
            $this->load->view('cpanel/footer');
        }



    }


?>