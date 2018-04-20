<?php 

    class Modules extends CI_Controller{

        // Login
        function login(){
            $this->load->view('modules/Login/login');
        }


        // Register New User 
        function registration(){
            $this->load->view('modules/Login/register');
        }

        // Dasboard
        function dashboard(){
            $data['title'] = "Dashboard";
            $this->load->view('includes/header', $data);
            $this->load->view('dashboard');
            $this->load->view('includes/footer.php', $data);
        }

        //  Manage Users
        function manage_users(){
            $data['title'] = "Manage Users";
            $this->load->view('includes/header', $data);
            $this->load->view('modules/users/manage_users');
            $this->load->view('includes/footer.php', $data);
        }

        // Edit User
        function edit_user($user_id){
            $data['rows'] = $this->user_model->user_Data($user_id);
            $this->load->view('modules/users/edit_User', $data);
        }

        // Edit Profile
        function edit_Profile($user_id){
            $data['rows'] = $this->user_model->user_data($user_id);
            $this->load->view('modules/users/edit_Profile', $data);
        }

        // Delete User
        function delete_User($user_id){
            $data['rows'] = $this->user_model->user_data($user_id);
            $this->load->view('modules/users/delete_User', $data);
        }


        /******** CATEGORIES MODULE *****/

        //  Manage Categories
        function manage_categories(){
            $data['title'] = "Manage Categories";
            $this->load->view('includes/header', $data);
            $this->load->view('modules/categories/manage_categories');
            $this->load->view('includes/footer.php', $data);
        }        

    }
