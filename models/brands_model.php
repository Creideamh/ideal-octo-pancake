<?php

        class Brands_Model extends CI_Model{

            function add_Brand($brand_name, $brand_status, $category_id){
                $this->db->where('brand_name',  $brand_name);
                $results = $this->db->get('brand');
    
                if($results->num_rows() == 0){
                    $sql = "INSERT INTO `brand`(`category_id`, `brand_name`, `brand_status`)
                             VALUES ('$category_id', '$brand_name', '$brand_status')";
                    
                    if($this->db->query($sql)){
                        $msg = 1;                
                        echo  json_encode($msg);
                    }else{
                        $msg = 2;   
                        echo json_encode($msg) ;
                    }    
                }
            }

            function edit_Brand($brand_name, $brand_id, $brand_status, $category_id){

    
                    $sql = "UPDATE `brand` SET `category_id`='$category_id',`brand_name`='$brand_name',`brand_status`='$brand_status' 
                            WHERE brand_id = '$brand_id' ";
                    
                    if($this->db->query($sql)){
                        $msg = 1;                
                        echo  json_encode($msg);
                    }else{
                        $msg = 2;   
                        echo json_encode($msg) ;
                    }    
            }


            function delete_Brand($brand_id){
    
                $sql = "DELETE FROM `brand` WHERE `brand_id` = '$brand_id' ";
                
                if($this->db->query($sql)){
                    $msg = 1;                
                    echo  json_encode($msg);
                }else{
                    $msg = 2;   
                    echo json_encode($msg) ;
                }    
            }

            // Select Brand details for editing
            function brand_Data($brand_id){
                $this->db->select('*');
                $this->db->from('brand');
                $this->db->where('brand_id', $brand_id);
                $query = $this->db->get();
                return $query->row_array();
            }

        // Display the category name in the brand list table
        function category_name($category_id){
            $this->db->where('category_id', $category_id);
            $this->db->select('category_name');
            $results = $this->db->get('category');
            return $results->row()->category_name;

        }

            public function cTable(){
                $this->db->select('*');
                $this->db->from('brand');
                $query = $this->db->get();
                return $query->result_array();
            }

    }

?>
