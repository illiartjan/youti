<?php
class Users extends CI_Controller{
    // Register user
    public function register(){
        $data['title'] = 'Sign Up';
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
        $this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');
        if($this->form_validation->run() === FALSE){
            $this->load->view('templates/header');
            $this->load->view('users/register', $data);
            $this->load->view('templates/footer');
        } else {

//            $post_image=$post_image =$this->picture->checkPicture($_FILES['userfile']['name']);
            // Encrypt password
            $enc_password = md5($this->input->post('password'));
            $this->user_model->register($enc_password);
            // Set message
            $this->session->set_flashdata('user_registered', 'You are now registered and can log in');
            redirect('users/login');
        }
    }

    public function index(){
        $offset = 0;
        $config['base_url'] = base_url() . 'posts/index/';
        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }
        $data['user']=$this->user_model->getUser(1);
        $this->load->view('templates/header');
        $this->load->view('users/index', $data);
        $this->load->view('templates/footer');

    }
    // Log in user
    public function login(){
        $data['title'] = 'Sign In';
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if($this->form_validation->run() === FALSE){
            $this->load->view('templates/header');
            $this->load->view('users/login', $data);
            $this->load->view('templates/footer');
        } else {

            // Get username
            $username = $this->input->post('username');
            // Get and encrypt the password
            $password = md5($this->input->post('password'));
            // Login user
            $user_id = $this->user_model->login($username, $password);
            if($user_id){
                // Create session
                $user_data = array(
                    'user_id' => $user_id,
                    'username' => $username,
                    'logged_in' => true
                );
                $this->session->set_userdata($user_data);
                // Set message
                $this->session->set_flashdata('user_loggedin', 'You are now logged in');
/*
                $this->load->view('templates/header');
                $this->load->view('pages/index', $data);
                $this->load->view('templates/footer');

*/redirect('', 'location');
            } else {
                // Set message
                $this->session->set_flashdata('login_failed', 'Login is invalid');
                redirect('users/login');
            }
        }
    }
    // Log user out
    public function logout(){
        // Unset user data
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('username');
        // Set message
        $this->session->set_flashdata('user_loggedout', 'You are now logged out');
        redirect('', 'location');
    }
    // Check if username exists
    public function check_username_exists($username){
        $userid="";
        if(isset($this->session->userdata['user_id'])){
            $userid=$this->session->userdata['user_id'];
        }
        $this->form_validation->set_message('check_username_exists', 'That username is taken. Please choose a different one');
        if($this->user_model->check_username_exists($username,$userid)){
            return true;
        } else {
            return false;
        }
    }
    // Check if email exists
    public function check_email_exists($email){
        $userid="";
        if(isset($this->session->userdata['user_id'])){
            $userid=$this->session->userdata['user_id'];
        }
        $this->form_validation->set_message('check_email_exists', 'That email is taken. Please choose a different one');
        if($this->user_model->check_email_exists($email,$userid)){
            return true;
        } else {
            return false;
        }
    }

    public function edit_user(){

        $data['user']=$this->user_model->getUser($this->session->userdata['user_id']);
        $data['title'] = 'Edit User';
        $this->load->view('templates/header');
        $this->load->view('users/edit', $data);
        $this->load->view('templates/footer');
    }
    public function update(){
        $data['title'] = 'Sign Up';
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
        $this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
        if($this->form_validation->run() === FALSE){
            $this->load->view('templates/header');
            $data['user']=$this->user_model->getUser($this->session->userdata['user_id']);
            $this->load->view('users/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $post_image = $this->picture->checkPicture($_FILES['userfile']['name']);
            $this->user_model->update_user($post_image,$this->session->userdata['user_id']);
            $this->session->set_flashdata('post_updated', 'Your post has been updated');

            redirect('users/index');

        }
    }
    public function showUser(){
        $data['user']=$this->user_model->getAllUser();
        $data['categories']=$this->category_model->get_categories();
        $data['title'] = 'Show User';
        $this->load->view('templates/header');
        $this->load->view('showAll/showAllUsers', $data);
        $this->load->view('templates/footer');
    }
    public function viewYoutube(){
        $data['youtube'] = 'https://www.youtube.com/embed/XGSy3_Czz8k';
        $data['user']=$this->user_model->getAllUser(1);
        $data['title'] = 'Show User';
        $this->load->view('templates/header');
        $this->load->view('users/youtube', $data);
        $this->load->view('templates/footer');
    }

    public function showUserSearch()
    {




        $username = "";
        $categorie = "";
        $all="";
        $users=[];
        $cars=[];
        $counter=0;

        $json = $_POST['detailsearch'];
        $json_Search=json_decode($json[0]);
        $username=$json_Search[0]->username;
        $categorie=$json_Search[0]->categorie;
        $all=$json_Search[0]->showAll;

        if($all){
            $data['user']=$this->user_model->getAllUser();
        }
        if($username===""&&$categorie===""){
            $data['user']=$this->user_model->getAllUser();
        }
        elseif ($username!==""){
            $username=$json_Search[0]->username;
            $data['user']=$this->user_model->findUserBySearch($username);
        }
        elseif ($categorie!==""){

            $data['user']=$this->user_model->findUserByCategorie($categorie);

        }



        foreach ($data['user'] as $user){
            $users[]=array(
                "id"=>$user["id"],
                "username"=>$user["username"],
                "biography"=>$user["biography"],
                "userprofile"=>$user["userprofile"],
                "register_date"=>$user["register_date"],
                "youtubeChannel"=>$user["youtubeChannel"],
                "twitterAccount"=>$user["twitterAccount"],
                "instagramAccount"=>$user["instagramAccount"],
                "ownBlog"=>$user["ownBlog"]);
        }


        echo json_encode($users);

    }



    private function loadUsers($user){

    }

    public function edit_password(){
        $data['user']=$this->user_model->getUser($this->session->userdata['user_id']);
        $data['title'] = 'Edit Passwort';
        $this->load->view('templates/header');
        $this->load->view('users/edit_password', $data);
        $this->load->view('templates/footer');
    }

    public function updatePassword(){
        $data['title'] = 'Sign Up';
        $password = md5($this->input->post('password'));

        $this->form_validation->set_rules('oldpassword', 'Oldpassword', 'required|callback_checkOldPassword');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');


        if($this->form_validation->run() === FALSE){
            $this->session->set_flashdata('passwor_change_Faild', 'Your password could not change');
            $this->load->view('templates/header');
            $data['user']=$this->user_model->getUser($this->session->userdata['user_id']);
            $this->load->view('users/edit_password', $data);
            $this->load->view('templates/footer');
        } else {

            $this->session->set_flashdata('password_change', 'Your password is changed');
            $this->user_model->updadtePasswort($password,$this->session->userdata['user_id']);

            redirect('users/index');

        }
    }

    public function checkOldPassword($oldpassword){
        $userid="";
        if(isset($this->session->userdata['user_id'])){
            $userid=$this->session->userdata['user_id'];
        }
        $oldpassword = md5($this->input->post('oldpassword'));
        if($this->user_model->check_password_isvalid($oldpassword,$userid)){
            return true;
        } else {
            return false;
        }
    }
    public function passwordforgotten(){

        $data['title']="Passwort Forgotten";
        $this->load->view('templates/header');
        $this->load->view('users/passwordForgot',$data);
        $this->load->view('templates/footer');

    }
    public function resetPassword(){

        $data['user']=$this->user_model->getUserWithName($this->input->post('usernameEmail'));
        if(isset($data['user'])){

            var_dump($data['user']);
            die;
        }

    }
    public function followUsers(){


    }
}