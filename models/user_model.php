<?php

        class User_Model extends CI_Model{

            public function loginUser($user_email, $password){

                    $this->db->where('user_email', $user_email);
                    $this->db->where('user_password', $password);
                    
                    $result = $this->db->get('users');

                    if($result->num_rows() == 1){
                        return $result->row_array();
                    }else{
                        return false; 
                    }
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
                $this->db->from('users');
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
