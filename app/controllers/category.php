<?php
    class category extends DController{
        
        public function __construct(){
            $data = array();
            Session::checkSession();
            $message = array();
            parent:: __construct();
            
        }
        public function homepage(){
            $this->load->view('header');
            $this->load->view('home');
            $this->load->view('footer');
        }

        public function list_category(){
            $this->load->view('header');
            $categorymodel = $this->load->model('categorymodel');
            $table_category_product = 'tbl_category_product';
            $data['category'] = $categorymodel->category($table_category_product);
            $this->load->view('list_category',$data);
            $this->load->view('footer');
        }

        public function categoryTitle(){
            $this->load->view('header');
            $categorymodel = $this->load->model('categorymodel');
            $table_category_product = 'tbl_category_product';
            $title = 'Mabook';
            $data['title'] = $categorymodel->categoryTitle($table_category_product,$title);
            $this->load->view('title',$data['title']);
            $this->load->view('footer');
        }

        public function catebyId(){
            $this->load->view('header');
            $categorymodel = $this->load->model('categorymodel');
            $id = 1;
            $table_category_product = 'tbl_category_product';
            $data['categorybyid'] = $categorymodel->categorybyid($table_category_product,$id);
            $this->load->view('categorybyid',$data);
            $this->load->view('footer');
        }

        public function addcategory(){
            $this->load->view('addcategory');
        }

        public function insertcategory(){
            $categorymodel = $this->load->model('categorymodel');
            $table_category_product = 'tbl_category_product';
            $title = $_POST['title'];
            $desc = $_POST['description'];

            $data = array(
                'title_category_product' => $title,
                'desc_category_product' => $desc
            );

            $result = $categorymodel->insertcategory($table_category_product,$data);
            if($result == 1){
                $message['msg'] = "Insert successfuly";
            }else{
                $message['msg'] = "Insert error";
            }
            
            $this->load->view('addcategory', $message);

        }

        public function updatecategory(){
            $categorymodel = $this->load->model('categorymodel');
            $table_category_product = 'tbl_category_product';
            // $title = $_POST['title'];
            // $desc = $_POST['description'];
            $id = 3;
            $cond = "tbl_category_product.id_category_product=$id";
            $data = array(
                'title_category_product' => 'Macbook air',
                'desc_category_product' => 'Giảm nửa giá'
            );

            $result = $categorymodel->updatecategory($table_category_product,$data,$cond);
            if($result == 1){
                echo  "Update successfuly";
            }else{
               echo "Update error";
            }


        }

        public function deletecategory(){
            $categorymodel = $this->load->model('categorymodel');
            $table_category_product = 'tbl_category_product';    

            $cond = "tbl_category_product.id_category_product=42";

            $result = $categorymodel->deletecategory($table_category_product,$cond);
            if($result == 1){
                echo  "Delete successfuly";
            }else{
               echo "Delete error";
            }
        }
    }


?>