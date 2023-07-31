<?php
    class product extends DController{
        public $message=array();
        public function __construct(){
            Session::checkSession();
            parent:: __construct();
        }
        public function index(){
            $this->add_product();

        }
        public function product_detail(){
            $this->load->view('cpanel/header');
            $this->load->view('cpanel/menu');
            $this->load->view('cpanel/product/product_detail');
            $this->load->view('cpanel/footer');
        }        
        public function add_product(){
            $this->load->view('cpanel/header');
            $this->load->view('cpanel/menu');
            $this->load->view('cpanel/product/add_product');
            $this->load->view('cpanel/footer');
        }

        public function insert_product(){
            $title = $_POST['title_category_product'];
            $description = $_POST['desc_category_product'];
            $table = 'tbl_category_product';
            $data = array(
                'title_category_product' => $title,
                'desc_category_product' => $description
            );
            $category_model = $this->load->model('categorymodel');
            $result = $category_model->insertcategory($table,$data);
            if($result==1){
                Session::set('msg',"Thêm thành công");
                header('Location:'.BASE_URL."product");
            }else{
                Session::set('msg',"Thêm thất bại");
                header('Location:'.BASE_URL."product");
            }
        }
    }


?>