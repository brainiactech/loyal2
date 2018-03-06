<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class block_model extends CI_Model
{
    function __construct()
    {
        //Call the Model constructor
        parent::__construct();
    }
public function block_user($user_id)
  {
    $requester_change = array(
        'blocked' => 1,
      );
  $reqCheck = "user_id = ".$user_id."";
  $this->db->where($reqCheck);
 $helper= $this->db->update('users', $requester_change);
return $helper;
      }
public function unblock_user($user_id)
  {
    $requester_change = array(
        'blocked' => 0,
      );
  $reqCheck = "user_id = ".$user_id."";
  $this->db->where($reqCheck);
 $helper= $this->db->update('users', $requester_change);
return $helper;
      }
   public function getUserDetails($user_id)
  {
    $this->db->from('user_details');
        $this->db->join('users', 'user_details.user_id = users.user_id');
       
        $query = $this->db->get();
        return $query->result();
  }
public function getBlockedList($user_id)
  {
    $this->db->from('user_details');
        $this->db->join('users', 'user_details.user_id = users.user_id');
        $reqCheck = "blocked = 1";
  $this->db->where($reqCheck);
        $query = $this->db->get();
        return $query->result();
  }
public function getFlaggedReceiver()
  {
      $this->db->select('payment.*, user_details.first_name,user_details.last_name, user_details.user_id, users.*');
    $this->db->from('payment');
    $querySelector = 'flagged = 1';
    $this->db->join('user_details', 'user_details.user_id = payment.payer_id','inner');
    $this->db->join('users', 'users.user_id = user_details.user_id','left');
    $this->db->where($querySelector);
    $details = $this->db->get();
    return $details->result();
  }
}
?>