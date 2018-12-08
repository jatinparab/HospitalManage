<?php

//session_start(); //we need to start session in order to access it through CI

Class Auth extends CI_Controller {
    public function __construct() {
        parent::__construct();
        
        // Load form helper library
     //   $this->load->helper('form');
        
        // Load form validation library
      //  $this->load->library('form_validation');
        
        // Load session library
        $this->load->library('session');
        
        // Load database
        $this->load->model('login_database');
    }

    // Show login page
    public function validate(){
           // $this->load->library('password');
            
            $data = array(
            'username' => $this->input->post('username'),
            'password' => sha1($this->input->post('password'))
            );
          //  echo  $data['password'];
            $result = $this->login_database->login($data);
            //echo $result;
            if ($result == TRUE) {
            
            $username = $this->input->post('username');
            $result = $this->login_database->read_user_information($username);
          // print_r($result);
            if ($result != false) {
            $session_data = array(
            'username' => $result[0]->username,
            'name' => $result[0]->name,
            );
           //print_r($session_data);
            //Add user data in session
            $this->session->set_userdata('logged_in', $session_data);
            redirect('/user_main');
            }
            }else{
                $data['error'] = "Incorrect Details";
                $this -> load -> view('templates/header',$data);
                $this -> load -> view('pages/login',$data);
                $this -> load -> view('templates/footer',$data);
               // redirect('/login');
            }
        
        
        //redirect('/logout');
    }
    
   
}

?>