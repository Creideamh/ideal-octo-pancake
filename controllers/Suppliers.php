<?php  

        class Suppliers extends CI_Controller{

            function suppliers_List(){
           
                $cDtable = $this->suppliers_model->cTable();
                $data = array();
                foreach ($cDtable as $rows){
                    array_push($data,
                        array(
                            $rows['supplier_id'],
                            $rows['supplier_name'],
                            $rows['supplier_mobile_number'],
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

            $this->form_validation->set_rules('supplier_name', 'supplier_name', 'trim|required');
            $this->form_validation->set_rules('supplier_email', 'supplier_email', 'trim|required');
            $this->form_validation->set_rules('gh_number', 'gh_number', 'trim|required');
            $this->form_validation->set_rules('supplier_address', 'supplier_address', 'trim|required');
            


            if ($this->form_validation->run() == FALSE)
            {
                $data = array(
                    'errors' => validation_errors()
                );
    
                $this->session->set_flashdata($data);
                $msg = 0;
                echo 'Error Occured';

            }else{

                $supplier_name  = $this->input->post('supplier_name');
                $supplier_email = $this->input->post('supplier_email');
                $supplier_address = $this->input->post('supplier_address');
                $gh_number = $this->input->post('gh_number');

                $insert_info  = $this->suppliers_model->add_Supplier($supplier_name, $supplier_email, $gh_number, $supplier_address);
            }

        }






        }