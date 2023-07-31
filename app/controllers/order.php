<?php
    class order extends DController{

        public function __construct(){
            parent:: __construct();
            Session::checkSession();
            
        }
        public function index(){
            $this->order();
        }
        public function order(){

            $this->load->view('cpanel/header');
            $this->load->view('cpanel/menu');

            $this->load->view('cpanel/order/order');
            $this->load->view('cpanel/footer');
        }

        public function add_order(){
            $this->load->view('cpanel/header');
            $this->load->view('cpanel/menu');

            $this->load->view('cpanel/order/add_order');
            $this->load->view('cpanel/footer');
        }

    }


?>