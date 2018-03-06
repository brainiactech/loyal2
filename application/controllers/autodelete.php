<?php


class Autodelete extends CI_Controller {

    protected $currentUserId;

    public function __construct()
    {
      parent::__construct();
      //$this->load->database();//What are you doing with this library. I dont think you need it
      //$this->load->library('session'); //Why not autoload your session ?
     // $this->authenticate->verifyUserType();
     // $this->authenticate->checkLogInState();
     $this->currentUserId = $this->session->userdata['user_id'];
	//$this->load->model('autodelete_model');

    }

    public function index()
    {
    
    }

    
  	public function delete_users()
    {
      //$this->load->model('autodelete_model');
      //echo hello;
        $payer_id= $this->currentUserId;
        $this->db->where('user_id', $payer_id);
        $this->db->delete('users');
$this->db->where('user_id', $payer_id);
 $this->db->delete('user_details');
$this->db->where('user_id', $payer_id);
 $this->db->delete('user_banks');
$this->db->where('user_id', $payer_id);
 $this->db->delete('help_request');
  	}

}
