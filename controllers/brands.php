<?php 

    class Brands extends CI_Controller{

        function brand_status($brand_status){
            if($brand_status === 'inactive'){
                return '<span class="label label-danger">Inactive</span>';
            }else if($brand_status === 'active'){
                return '<span class="label label-success">Active</span>';                
            }
        }

        // Display the category name in the brand list table
        function category_name($category_id){
            $this->db->where('category_id', $category_id);
            $this->db->select('category_name');
            $results = $this->db->get('category');
            return $results->row()->category_name;

        }

        
        function brands_List(){
                
            $cDtable = $this->brands_model->cTable();
            $data = array();
            foreach ($cDtable as $rows){
                array_push($data,
                    array(
                        $rows['brand_id'],
                        $rows['brand_name'],
                        $this->category_name($rows['category_id']),
                        $this->brand_status($rows['brand_status']),
                        '<a href="'.base_url().'modules/edit_Brand/'.$rows['brand_id'].'"  class="btn btn-warning btn-xs" data-toggle="modal" data-target="#editModal"><i class="fa fa-edit"></i></a>
                        <a href="'.base_url().'modules/delete_Brand/'.$rows['brand_id'].'" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash"></i></a>' 
                    )
                );
            }
            $this->output->set_content_type('application/json')->set_output(json_encode(array('data'=>$data)));
        }



        // Add_Brand 
        function add_Brand(){
            $this->form_validation->set_rules('brand_name', 'brand_name', 'trim|required');
            $this->form_validation->set_rules('brand_status', 'brand_status', 'trim|required');
            $this->form_validation->set_rules('category_id', 'category_id', 'trim|required');


            if ($this->form_validation->run() == FALSE)
            {
                $data = array(
                    'errors' => validation_errors()
                );
    
                $this->session->set_flashdata($data);
                $msg = 0;
                echo 'Error Occured';
            }else{
                $brand_name  = $this->input->post('brand_name');
                $brand_status = $this->input->post('brand_status');
                $category_id = $this->input->post('category_id');

                $category_info  = $this->brands_model->add_Brand($brand_name, $brand_status, $category_id);
            }

        }


        // Edit Brand 
        function edit_Brand(){
            $this->form_validation->set_rules('brand_name', 'brand_name', 'trim|required');
            $this->form_validation->set_rules('brand_status', 'brand_status', 'trim|required');
            $this->form_validation->set_rules('category_id', 'category_id', 'trim|required');


            if ($this->form_validation->run() == FALSE)
            {
                $data = array(
                    'errors' => validation_errors()
                );
    
                $this->session->set_flashdata($data);
                $msg = 0;
                echo 'Error Occured';
            }else{
                $brand_name  = $this->input->post('brand_name');
                $brand_status = $this->input->post('brand_status');
                $category_id = $this->input->post('category_id');
                $brand_id    = $this->input->post('brand_id');

                $category_info  = $this->brands_model->edit_Brand($brand_name, $brand_id, $brand_status, $category_id);
            }

        }

        function delete_Brand(){
            $this->form_validation->set_rules('brand_id', 'brand_id', 'trim|required');


            if ($this->form_validation->run() == FALSE)
            {
                $data = array(
                    'errors' => validation_errors()
                );
    
                $this->session->set_flashdata($data);
                $msg = 0;
                echo 'Error Occured';
            }else{
                $brand_id    = $this->input->post('brand_id');

                $delete_info  = $this->brands_model->delete_Brand($brand_id);
            }

        }




    }
?>