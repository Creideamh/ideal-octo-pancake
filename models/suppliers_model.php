<?php

        class Suppliers_Model extends CI_Model{

            public function cTable(){
                $this->db->select('*');
                $this->db->from('suppliers');
                $query = $this->db->get();
                return $query->result_array();
            }


            function add_Supplier($supplier_name, $supplier_email, $gh_number, $supplier_address){
                
                $this->db->where('supplier_name',  $supplier_name);
                $this->db->where('supplier_email', $supplier_email);

                $results = $this->db->get('suppliers');
    
                if($results->num_rows() == 0){
                    $sql = "INSERT INTO `suppliers`(`supplier_name`, `supplier_mobile_number`, `supplier_email`, `supplier_address`)
                             VALUES ('$supplier_name', '$gh_number', '$supplier_email', '$supplier_address')";
                    
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





    }

?>
