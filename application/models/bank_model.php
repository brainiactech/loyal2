<?php
class Bank_model extends CI_Model {

  function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->load->library('session');
  }

  public function getAllBanks()
  {
    $this->db->select('bank_id, bank_name');
    $this->db->from('bank');
    $details = $this->db->get();
    return $details->result();
  }
  public function getKey()
  {
    $this->db->select('key.key');
    $this->db->from('key');
    $querySelector = "status = 0";
    $this->db->where($querySelector);
    $details = $this->db->get();
    if ($details->num_rows) {
      return $details->result()[0];
    }
    else {
      return null;
    }
  }
  public function getUserBank($user_id)
  {
    $this->db->select('bank.bank_name, user_banks.*');
    $this->db->from('bank, user_banks');
    $querySelector = "bank.bank_id = user_banks.bank_id AND user_id = {$user_id}";
    $this->db->where($querySelector);
    $details = $this->db->get();
    if ($details->num_rows) {
      return $details->result()[0];
    }
    else {
      return null;
    }
  }
public function getAllBitcoins()
  {
    $this->db->select('user_id, bitcoin_address');
    $this->db->from('bitcoin');
    $details = $this->db->get();
    return $details->result();
  }

 public function getUserBitcoin($user_id)
  {
    $this->db->select('bitcoin.bitcoin_address');
    $this->db->from('bitcoin');
    $querySelector = "user_id = {$user_id}";
    $this->db->where($querySelector);
    $details = $this->db->get();
    if ($details->num_rows) {
      return $details->result()[0];
    }
    else {
      return null;
    }
  }
public function getConfirm($user_id)
  {
    $this->db->select('comfirm_paid_users.amount');
    $this->db->from('comfirm_paid_users');
    $querySelector = "user_id = {$user_id}";
    $this->db->where($querySelector);
    $details = $this->db->get();
    if ($details->num_rows) {
      return $details->result()[0];
    }
    else {
      return null;
    }
  }
 public function addUserBitcoin($bitcoin_address, $user_id)
  {
      $data = array(
          'bitcoin_address' => $bitcoin_address,
          'user_id' => $user_id
      );
    $bitcoin_insert = $this->db->insert('bitcoin', $data);
    return $bitcoin_insert;
  }
  public function addUserBank($bank_id, $account_name, $account_number, $user_id)
  {
      $data = array(
          'bank_id' => $bank_id,
          'account_name' => $account_name,
          'account_number' => $account_number,
          'user_id' => $user_id
      );
    $bank_insert = $this->db->insert('user_banks', $data);
    return $bank_insert;
  }
}

?>
