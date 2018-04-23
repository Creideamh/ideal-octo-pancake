<?php  

    class Categories_Model extends CI_Model{

        public function cTable(){
            $this->db->select('*');
            $this->db->from('category');
            $query = $this->db->get();
            return $query->row_array();
        }


        function add_Category($category_name,$category_status){
            $this->db->where('category_name',  $category_name);
            $results = $this->db->get('category');

            if($results->num_rows() == 0){
                $sql = "INSERT INTO `category`(`category_name`, `category_status`) 
                         VALUES ('$category_name', '$category_status')";
                
                if($this->db->query($sql)){
                    echo 'Category, '.$category_name.' with status '.$category_status.'  created succesfully';
                }else{
                    echo 'Category, '.$category_name.' with status '.$category_status.'  could not be created';                   
                }


            }
        }

    }






?>