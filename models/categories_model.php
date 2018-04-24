<?php  

    class Categories_Model extends CI_Model{

        public function cTable(){
            $this->db->select('*');
            $this->db->from('category');
            $query = $this->db->get();
            return $query->result_array();
        }


        function add_Category($category_name,$category_status){
            $this->db->where('category_name',  $category_name);
            $results = $this->db->get('category');

            if($results->num_rows() == 0){
                $sql = "INSERT INTO `category`(`category_name`, `category_status`) 
                         VALUES ('$category_name', '$category_status')";
                
                if($this->db->query($sql)){
                    $msg = 1;
                    echo  json_encode($msg);                
                }else{
                    $msg = 2;   
                    echo json_encode($msg) ;
                }


            }
        }

        function category_data($category_id){
            $this->db->where('category_id', $category_id);
            $this->db->select('*');
            $this->db->from('category');
            $query = $this->db->get();
            return $query->row_array();
        }

        function edit_Category($category_id, $category_name , $category_status){

            
                $sql = "UPDATE `category` SET `category_name`='$category_name',`category_status`='$category_status' WHERE category_id = $category_id";
                
                if($this->db->query($sql)){
                    $msg = 'Category, '.$category_name.' with status '.$category_status.'  updated succesfully';
                   echo  json_encode($msg);

                }else{
                    $msg = 'Category, '.$category_name.' with status '.$category_status.'  could not be created';   
                   echo json_encode($msg);                
                } 
        }

    }






?>