<?php 

    class Logout extends CI_Controller{

    public function index(){
        $logout = $this->input->post('Submit');

        $user_id = $this->session->sess_destroy();
        redirect('modules/login');
        }



    }

?>