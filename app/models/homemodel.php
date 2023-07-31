<?php
    class homemodel extends Dmodel{
       public function __construct(){
            parent:: __construct();
        }
        public function list_category($table_category_product){
            return $this->db->select($table_category_product);
            // $sql = "SELECT * FROM tbl_category_product ORDER BY id_category_product DESC";
            // $query = $this->db->query($sql);
            // $result = $query->fetchAll();
            // return $result;
        }
        public function categorybyid($table_category_product,$id){
            $sql = "SELECT * FROM  $table_category_product WHERE id_category_product=:id";
            $data = array(':id' => $id);

            return $this->db->select($sql,$data);
    
        }
        public function categoryTitle($table_category_product,$title){
            $sql = "SELECT * FROM  $table_category_product WHERE title_category_product=:title";
            $data = array('title' => $title);

            return $this->db->select($sql,$data);
    
        }

    }
?>