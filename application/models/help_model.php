<?php
class Help_model extends CI_Model {

  function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->load->library('session');
  }

  public function getNewHelpers()
  {
    $this->db->select('help_request.*, user_details.first_name,user_details.last_name, user_details.user_id');
    $this->db->from('help_request');
    $querySelector = 'help_request.status = 0';
    $this->db->join('user_details', 'user_details.user_id = help_request.user_id');
    $this->db->where($querySelector);
    $details = $this->db->get();
    return $details->result();
  }
  public function getPendingPairs()
  {
    $this->db->select('payment.*, user_details.first_name,user_details.last_name, user_details.user_id, user_banks.*, bank.bank_name');
    $this->db->from('payment');
    $querySelector = 'payment.status = 0 OR payment.status = 2 AND payment.payer_id ='.$user_id;
    $this->db->join('user_details', 'user_details.user_id = payment.reciever_id', 'left');
    $this->db->join('user_banks', 'user_details.user_id = user_banks.user_id', 'left');
    $this->db->join('bank', 'bank.bank_id = user_banks.bank_id', 'left');
    $this->db->where($querySelector);
    $details = $this->db->get();
    return $details->result();
  }

  public function getNewConfirmPaid($user_id)
  {
    $this->db->select('comfirm_paid_users.*, user_details.first_name,user_details.last_name, user_details.user_id');
    $this->db->from('comfirm_paid_users');
    $querySelector = 'comfirm_paid_users.paid = 0 AND referral.referral_id = '.$user_id;
    $this->db->join('user_details', 'user_details.user_id = comfirm_paid_users.user_id');
    $this->db->join('referral', 'referral.reffered_who = comfirm_paid_users.user_id');
    $this->db->where($querySelector);
    $details = $this->db->get();
    return $details->result();
  }
}
