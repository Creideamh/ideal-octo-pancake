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

        // Add  Category
        function add_Category(){
            $this->load->view('modules/categories/add_Category');
        }

        // Edit  Category
        function edit_Category($category_id){
            $data['rows'] = $this->categories_model->category_data($category_id);
            $this->load->view('modules/categories/edit_Category', $data);
        }

        // Delete Category
        function delete_Category($category_id){
            $data['rows'] = $this->categories_model->category_data($category_id);
            $this->load->view('modules/categories/delete_Category', $data);
        }



        /******** BRANDS MODULE *****/

        //  Manage Brands
        function manage_brands(){
            $data['title'] = "Manage Brands";
            $this->load->view('includes/header', $data);
            $this->load->view('modules/brands/manage_brands');
            $this->load->view('includes/footer.php', $data);
        }        

        // Add  Brand
        function add_Brand(){
            $list['results'] =  $this->categories_model->categories_data();
            $this->load->view('modules/brands/add_Brand', $list);
        }

        // Edit  Brand
        function edit_Brand($brand_id){
            $data['rows'] = $this->brands_model->brand_Data($brand_id);
            $this->load->view('modules/brands/edit_Brand', $data);
        }

        // Delete Category
        function delete_Brand($brand_id){
            $data['rows'] = $this->brands_model->brand_Data($brand_id);
            $this->load->view('modules/brands/delete_Brand', $data);
        }









    }
