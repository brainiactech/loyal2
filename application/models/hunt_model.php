<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class hunt_model extends CI_Model
{
    function __construct()
    {
        //Call the Model constructor
        parent::__construct();
    }

   public function getUserDetails($user_id)
  {
    
    $this->db->from('user_details');
        $this->db->join('users', 'user_details.user_id = users.user_id');
        //$this->db->join('user_banks', 'users.user_id = user_banks.user_id');
       //$this->db->join('projects', 'users.user_id = projects.user_id');
       $querySelector = "users.user_id = $user_id";
       $this->db->where($querySelector); 
        $query = $this->db->get();
        return $query->result();
  }
public function getUserBit($user_id)
  {
    $this->db->from('user_details');
        $this->db->join('users', 'user_details.user_id = users.user_id');
        $this->db->join('bitcoin', 'user_details.user_id = bitcoin.user_id');
         //$this->db->join('projects', 'user_details.user_id = projects.user_id');
        $this->db->join('comfirm_paid_users', 'user_details.user_id = comfirm_paid_users.user_id AND comfirm_paid_users.amount != 0 AND comfirm_paid_users.paid != 1 ');
        $query = $this->db->get();
        return $query->result();
  }
public function getData($payer)
  {
   $this->db->select('users.*');
   $this->db->from('users');
$querySelector = "users.user_id = $payer";
// , projects.project_title, projects.project_description, projects.user_id, projects.amount
$this->db->join('user_details', 'users.user_id = user_details.user_id ');
    $this->db->where($querySelector); 
        $query = $this->db->get();
        return $query->result();
  }
}
?>