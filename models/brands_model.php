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

            public function user_reg($firstname, $lastname, $user_password, $user_email){

                $this->db->where('user_email', $user_email);
                $this->db->where('firstname', $firstname);
                $this->db->where('lastname', $lastname);
                $result = $this->db->get('users');

                if($result->num_rows() == 0){                

                    $query = "INSERT INTO `users`(`firstname`, `lastname`, `user_email`, `user_password`, `user_type`, `user_status`) 
                                VALUES ('$firstname','$lastname','$user_email','$user_password','user','active')";

                    if($this->db->query($query)){
                        $msg = 1;
                        echo json_encode($msg);
                    }else{
                        $msg = 0;
                        echo  json_encode($msg);
                    }
                }else{
                    $msg = 2;
                    echo json_encode($msg);
                }
  
            }

            public function cTable(){
                $this->db->select('*');
                $this->db->from('brand');
                $query = $this->db->get();
                return $query->result_array();
            }

            // Select User details for editing
            function user_data($user_id){
                $this->db->select('*');
                $this->db->from('users');
                $this->db->where('user_id', $user_id);
                $query = $this->db->get();
                return $query->row_array();
            }


            // Update profile
            function update_Profile($firstname, $lastname, $user_email, $user_password, $user_id){

                if($this->db->query("UPDATE `users` SET `firstname`='$firstname',
                `lastname`='$lastname',`user_email`='$user_email',
                `user_password`='$user_password' WHERE user_id = '$user_id'"))
              {
                $msg = 1;
                echo json_encode($msg);
                }else{
                $msg = 0;
                echo json_encode($msg);  
                }

            }


            // Delete User
            function user_Delete($user_id){
                if($this->db->query("DELETE FROM users WHERE user_id='$user_id'")){
                    $msg = 1;
                  echo  json_encode($msg);
                }else{
                    $msg = 0;
                  echo  json_encode($msg);
                }
            }
        }

?>
