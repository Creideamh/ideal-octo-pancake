<?php 

    class Login extends CI_Controller{

        // Load login.php page
        function index(){
            $this->load->view('modules/Login/login');
        }


        public function login_validate(){
            
            $this->form_validation->set_rules('user_email', 'user_email', 'trim|required|min_length[3]',array('min_length' => 'minimum 6 Characters'));
            $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[3]',array('min_length' => 'minimum 6 Characters'));

           

            if($this->form_validation->run() == FALSE ){
                
                            $data = array('errors' => validation_errors());
                
                            $this->session->set_flashdata('wrong input', 'Please try again');
                
                            redirect('login');
            }else{

                $user_email    = $this->input->post('user_email');
                $password      = $this->input->post('password');

                $user_info =  $this->user_model->loginUser($user_email, md5($password));
    
                if($user_info){
                    $user_data = array(
                        'user_id' => $user_info['user_id'],
                        'user_email' => $user_info['user_email'],
                        'user_type' => $user_info['user_type'],
                        'logged_in' => true
                    );
    
                    $this->session->set_userdata($user_data);
    
                    $this->session->set_flashdata('login_success', 'You are now logged in');
                    redirect('modules\dashboard');
    
   
                }else{
                    $this->session->set_flashdata('login_failed', 'username and password mismatch');              
                    redirect('login\index');
                }
            }
        }

    
    function registration(){

        $this->form_validation->set_rules('firstname', 'firstname', 'trim|required');
        $this->form_validation->set_rules('lastname', 'lastname', 'trim|required');
        $this->form_validation->set_rules('user_email', 'user_email', 'trim|required');
        $this->form_validation->set_rules('user_password', 'user_password', 'trim|required|min_length[8]',array('min_length' => 'minimum 8 Characters'));
        //$this->form_validation->set_rules('retype_password', 'retype_password', 'trim|required|min_length[8]',array('min_length' => 'minimum 8 Characters'));
    
        if($this->form_validation->run() == FALSE ){
                
            $data = array('errors' => validation_errors());

            $this->session->set_flashdata($data);

            redirect('modules/Login/register');

        }else{
            
            $firstname = $this->input->post('firstname');
            $lastname  = $this->input->post('lastname');
            $user_email = $this->input->post('user_email');
            $user_password = $this->input->post('user_password');
            $password_hash = md5($user_password);

            $reg_info = $this->user_model->user_reg($firstname, $lastname, $password_hash, $user_email);

        }       
    }

}