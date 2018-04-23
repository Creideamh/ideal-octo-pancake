<?php 

    class Categories extends CI_Controller{

        function category_status($category_status){
            if($category_status === 'inactive'){
                return '<span class="label label-danger">Inactive</span>';
            }else if($category_status === 'active'){
                return '<span class="label label-success">Active</span>';                
            }
        }

        function categories_List(){
                
            $cDtable = $this->categories_model->cTable();
            $data = array();
            foreach ($cDtable as $rows){
                array_push($data,
                    array(
                        $rows['category_id'],
                        $rows['category_name'],
                        $this->category_status($rows['category_status']),
                        '<a href="'.base_url().'modules/edit_Category/'.$rows['category_id'].'" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#editModal"><i class="fa fa-edit"></i></a>
                        <a href="'.base_url().'modules/delete_Category/'.$rows['category_id'].'" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash"></i></a>' 
                    )
                );
            }
            $this->output->set_content_type('application/json')->set_output(json_encode(array('data'=>$data)));
        }
    
        // Add_Category 
        function add_Category(){
            $this->form_validation->set_rules('category_name', 'category_name', 'trim|required');
            $this->form_validation->set_rules('category_status', 'category_status', 'trim|required');

            if ($this->form_validation->run() == FALSE)
            {
                $data = array(
                    'errors' => validation_errors()
                );
    
                $this->session->set_flashdata($data);
                $msg = 0;
                echo 'Error Occured';
            }else{
                $category_name  = $this->input->post('category_name');
                $category_status = $this->input->post('category_status');
                $category_info  = $this->categories_model->add_Category($category_name, $category_status);
            }

        }

    }