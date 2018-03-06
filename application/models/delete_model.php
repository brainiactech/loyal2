<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class delete_model extends CI_Model
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
       // $this->db->join('user_banks', 'user_details.user_id = user_banks.user_id');
       // $this->db->join('help_request', 'user_details.user_id = help_request.user_id');
        $query = $this->db->get();
        return $query->result();
  }
}
?>