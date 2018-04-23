<?php 

function categories_List(){

    function category_status($category_status){
        if($category_status === 'Inactive'){
            return '<span class="label label-danger">Inactive</span>';
        }else if($user_status === 'Active'){
            return '<span class="label label-success">Active</span>';                
        }
    }
           
    $cDtable = $this->categories_model->cTable();
    $data = array();
    foreach ($cDtable as $rows){
        array_push($data,
            array(
                $rows['category_id'],
                $rows['category_name'],
                $this->category_status($rows['category_id']),
                '<a href="'.base_url().'modules/edit_Category/'.$rows['category_id'].'" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#editModal"><i class="fa fa-edit"></i></a>
                 <a href="'.base_url().'modules/delete_Category/'.$rows['category_id'].'" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash"></i></a>' 
            )
        );
    }
    $this->output->set_content_type('application/json')->set_output(json_encode(array('data'=>$data)));
}
    