<?php
class User_model extends CI_Model{

    public function __construct()
    {

        // placing it here should work as the parent class has added that property
        // during it's own constructor
        $this->load->database();
    }

    public function register($enc_password){
        $data=array(
            'name'=>$this->input->post('name'),
            'email'=>$this->input->post('email'),
            'username'=>$this->input->post('username'),
            'password'=>$enc_password,
            'zipcode'=>$this->input->post('zipcode'),


        );
        return $this->db->insert('users',$data);
    }


    public function get_profilpicture($userid){



        $query=$this->db->query('SELECT userprofile  FROM users WHERE id='.$userid);
        //$query=$this->db->query('SELECT * FROM comments');
        //$test=$query->result_array();

        return $query->result_array();
    }



    public function login($username,$password){
        $this->db->where('username',$username);
        $this->db->where('password',$password);
        $result=$this->db->get('users');
        if($result->num_rows()==1){
            return $result->row(0)->id;
        }
        else{
        return false;
        }
    }

    function getUser($userid){
        $this->db->where('id',$userid);
        $result=$this->db->get('users');
        if($result->num_rows()==1){
            return $result->result_array();;
        }
        else{
            return false;
        }
    }
    public function check_username_exists($username,$id){
        $query=$this->db->get_where('users',array('username'=>$username));
        if(isset($id)){
            $testuser=$query->result_array();
        }

        if(empty($query->row_array())){
            return true;
        }
        else if (isset($id) &&isset($testuser)){
           if($testuser[0]['username']===$username){
               return true;

           }
           else{
               return false;
           }
        }
        else{
            return false;
        }
    }

    public function check_email_exists($email,$id){
        $query=$this->db->get_where('users',array('email'=>$email));
        if(isset($id)){
            $testuser=$query->result_array();
        }

        if(empty($query->row_array())){
            return true;
        }

        else if (isset($id) &&isset($testuser)){
            if($testuser[0]['email']===$email){
                return true;

            }
            else{
                return false;
            }
        }
        else{
            return false;
        }
    }
    public function update_user($user_picture,$userid){
        $slug=url_title($this->input->post('title'));
        $query=$this->db->get_where('users',array('id'=>$userid));
        $result=$query->result_array();
        if($user_picture=="noimage.jpg"&&$result[0]['userprofile']!="noimage.jpg" ){
            $userprofile=$result[0]['userprofile'];
        }
        else{
            $userprofile=$user_picture;
        }


        $data=array(
            'name'=>$this->input->post('name'),
            'email'=>$this->input->post('email'),
            'zipcode'=>$this->input->post('zipcode'),
            'userprofile'=>$userprofile,
            'username'=>$this->input->post('username'),
            'youtubeChannel'=>$this->input->post('youtubchannel'),
            'twitterAccount'=>$this->input->post('twitteraccount'),
            'instagramAccount'=>$this->input->post('instagramaccount'),
            'ownBlog'=>$this->input->post('ownblog'),
            'biography'=>$this->input->post('biography')
        );
        $this->db->where('id',$this->input->post('id'));
        return $this->db->update('users',$data);
    }

    public function getAllUser(){
        $result=$this->db->get('users');
        return $result->result_array();
    }

    public function findUserBySearch($username){

        $query=$this->db->get_where('users',array('username'=>$username));

        return $result=$query->result_array();

    }

    public function findUserByCategorie($categorie){

        $query=$this->db->get_where('users',array('categorie_id'=>$categorie));

        return $result=$query->result_array();

    }

    public function check_password_isvalid($oldPassword,$id){

        $this->db->where('id',$id);
        $this->db->where('password',$oldPassword);
        $result=$this->db->get('users');
            var_dump($result->num_rows());
        if($result->num_rows()==1){
            return true;
        }
        else{
            return false;
        }
    }

    public function updadtePasswort($password,$id){
        $data=array(
            'password '=>$password,
        );
        $this->db->where('id',$id);
        return $this->db->update('users',$data);
    }
    public function getUserWithName($email){
        $query=$this->db->get_where('users',array('email'=>$email));
        return $result=$query->result_array();
    }
}