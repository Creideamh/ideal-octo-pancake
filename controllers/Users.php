<?php 

    class Users extends CI_Controller{

                // Validate string
                function name_validate($string){
                    if (1 !== preg_match('/^([a-zA-Z]+[\'-]?[a-zA-Z]+[ ]?)+$/', $string))
                    
                        {
                            $this->form_validation->set_message('name_validate', '%s must be at least 6 characters and must contain at least one lower case letter, one upper case letter and one digit');
                            return FALSE;
                        }
                    
                        else
                    
                        {
                            return TRUE;
                        }
                }
        
                // Validate Cellphone Number
                function cellphoneNumber($string){
                    if(1 !== preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{3}-[0-9]{3}$/", $string)) {
                        $this->form_validation->set_message('cellphoneNumber', 'wrong number format 233-234-748-596');  
                        return FALSE;            
                       
                    }
                }
                
                // Validate Email
                function email_validate($string){
                    if(1 !== preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $string)){
                        $this->form_validation->set_message('email_validate', 'invalid email address, e.g john.dow@gmail.com');
                        return FALSE;            
                    }
                }

        function user_status($user_status){
            if($user_status === 'Inactive'){
                return '<span class="label label-danger">Inactive</span>';
            }else if($user_status === 'Active'){
                return '<span class="label label-success">Active</span>';                
            }
        }

        function user_List(){
           
            $cDtable = $this->user_model->cTable();
            $data = array();
            foreach ($cDtable as $rows){
                array_push($data,
                    array(
                        $rows['user_id'],
                        $rows['user_email'],
                        $rows['firstname'].', '.$rows['lastname'],
                        $this->user_status($rows['user_status']),
                        '<a href="'.base_url().'modules/edit_User/'.$rows['user_id'].'" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#editModal"><i class="fa fa-edit"></i></a>
                         <a href="'.base_url().'modules/delete_User/'.$rows['user_id'].'" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash"></i></a>
                         <a href="'.base_url().'modules/info_User/'.$rows['user_id'].'" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#infoModal"><i class="fa fa-info"></i></a>' 
                    )
                );
            }
            $this->output->set_content_type('application/json')->set_output(json_encode(array('data'=>$data)));
        }


        function user_update(){

            $this->form_validation->set_rules('firstname', 'firstname', 'trim|required');
            $this->form_validation->set_rules('lastname', 'lastname', 'trim|required');
            $this->form_validation->set_rules('user_email', 'user_email', 'trim|required');
            $this->form_validation->set_rules('user_status', 'user_status', 'trim|required');
            $this->form_validation->set_rules('user_type', 'user_type', 'trim|required');
            

            if ($this->form_validation->run() == FALSE)
            {
                $data = array(
                    'errors' => validation_errors()
                );
    
                $this->session->set_flashdata($data);
                $msg = 0;
                echo json_encode($msg);
            }
            else
            {
            
            if($this->input->post('user_password') === ''){

                $firstname = $this->input->post('firstname');
                $lastname = $this->input->post('lastname');
                $user_email = $this->input->post('user_email');
                $user_type = $this->input->post('user_type');
                $user_status = $this->input->post('user_status');
                $user_id  = $this->input->post('user_id');

            
                if($this->db->query("UPDATE `users` SET `firstname`='$firstname',
                                                        `lastname`='$lastname',`user_email`='$user_email',
                                                        `user_type`='$user_type',`user_status`='$user_status' WHERE user_id = '$user_id'"))
                  {
                    $msg = 1;
                    echo json_encode($msg);
                    }else{
                    $msg = 2;
                    echo json_encode($msg);                                    
                  }
                
            
            }else{
                    $firstname = $this->input->post('firstname');
                    $lastname = $this->input->post('lastname');
                    $user_email = $this->input->post('user_email');
                    $user_password = md5($this->input->post('user_password'));
                    $user_type = $this->input->post('user_type');
                    $user_status = $this->input->post('user_status');
                    $user_id     = $this->input->post('user_id');


                    if($this->db->query("UPDATE `users` SET `firstname`='$firstname',
                    `lastname`='$lastname',`user_email`='$user_email',
                    `user_password`='$user_password',`user_type`='$user_type',
                    `user_status`='$user_status' WHERE user_id = '$user_id'"))
                  {
                    $msg = 1;
                    echo json_encode($msg);
                    }else{
                    $msg = 2;
                    echo json_encode($msg);                                    
                  }
            }

        }


        } // user_update

        // Edit Logged in profile
        function user_Profile(){

            $this->form_validation->set_rules('firstname', 'firstname', 'trim|required');
            $this->form_validation->set_rules('lastname', 'lastname', 'trim|required');
            $this->form_validation->set_rules('user_email', 'user_email', 'trim|required');
            $this->form_validation->set_rules('user_password', 'user_password', 'trim|required');

            if ($this->form_validation->run() == FALSE)
            {
                $data = array(
                    'errors' => validation_errors()
                );
    
                $this->session->set_flashdata($data);
                $msg = 0;
                echo json_encode($msg);
            }else{
                    
                $firstname = $this->input->post('firstname');
                $lastname = $this->input->post('lastname');
                $user_email = $this->input->post('user_email');
                $user_password = md5($this->input->post('user_password'));
                $user_id  = $this->input->post('user_id');

                $user_info = $this->user_model->update_Profile($firstname, $lastname, $user_email, $user_password, $user_id);
            }
        }

        // Update the email displayed when the logged in user update his/her profile
        function refresher(){
            $dataString = $this->input->post('dataString');

            $sql = "SELECT user_email FROM users WHERE user_id = '$dataString'";
            $result = $this->db->query($sql);

            return $result->row_array();
            

        }

        function user_delete(){
            $user_id = $this->input->post('user_id');
            $delete_info = $this->user_model->user_Delete($user_id);            
        }

    }