<?php  

        class Suppliers extends CI_Controller{


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

            function suppliers_List(){
           
                $cDtable = $this->suppliers_model->cTable();
                $data = array();
                foreach ($cDtable as $rows){
                    array_push($data,
                        array(
                            $rows['supplier_id'],
                            $rows['supplier_name'],
                            $rows['supplier_mobile_number'],
                            $this->user_status($rows['user_status']),
                            '<a href="'.base_url().'modules/edit_Supplier/'.$rows['supplier_id'].'" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#editModal"><i class="fa fa-edit"></i></a>
                             <a href="'.base_url().'modules/delete_Supplier/'.$rows['supplier_id'].'" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash"></i></a>
                             <a href="'.base_url().'modules/info_Supplier/'.$rows['supplier_id'].'" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#infoModal"><i class="fa fa-info"></i></a>' 
                        )
                    );
                }
                $this->output->set_content_type('application/json')->set_output(json_encode(array('data'=>$data)));
            }
            

        // Add Suppliers 
        function add_Supplier(){

            $this->form_validation->set_rules('supplier_name', 'suppier_name', 'trim|required');
            $this->form_validation->set_rules('supplier_email', 'supplier_email', 'trim|required|call_back_email_validate');
            $this->form_validation->set_rules('supplier_mnb', 'supplier_mnb', 'trim|required|call_back_cellphoneNumber');
            $this->form_validation->set_rules('supplier_address', 'supplier_address', 'trim|required');
            


            if ($this->form_validation->run() == FALSE)
            {
                $data = array(
                    'errors' => validation_errors()
                );
    
                $this->session->set_flashdata($data);
                $msg = 0;
                echo 'Error';
            }else{
                $supplier_name  = $this->input->post('supplier_name');
                $supplier_email = $this->input->post('supplier_email');
                $supplier_address = $this->input->post('supplier_address');
                $supplier_mnb = $this->input->post('supplier_mnb');

                $insert_info  = $this->brands_model->add_Supplier($supplier_name, $supplier_email, $supplier_mnb, $supplier_address);
            }

        }






        }