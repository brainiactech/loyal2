<?php
class link_model extends CI_Model {

  function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->load->library('session');
  }
public function saveUserInfo($username, $firstname, $lastname, $address, $phone, $password, $email, $package,$bank_id,$account_name,$account_number,$has_refer, $referrer_id)
  {
    
    $hash = strtoupper(md5($username.$firstname));
   
    // return $help_amount;
    // return $help_amount;
    $this->db->trans_start(); # Starting Transaction
    $this->db->trans_strict(FALSE); # See Note 01. If you wish can remove as well
    $dataForUser = array(
        'username' => $username,
        'password' => $password,
        'email'    => $email,
        'phone_number' => $phone,
        'address' => $address
      );
      $trans = $this->db->insert('users', $dataForUser);
      // return $this->db->insert_id();
      // return;
      $insert_id = $this->db->insert_id();
      if (has_refer=1) {
        $dataForUserDetails = array(
        'first_name' => $firstname,
        'last_name' => $lastname,
        'address'    => $address,
        'hash_key' => $hash,
        'user_id' => $insert_id,
        'referred_by' => $referrer_id
      );
      
      $dataForRefer = array(
        'amount_to_get' => 0,
        'reffered_who' => $insert_id,
        'user_id' => $referrer_id
      );
      $this->db->insert('referral', $dataForRefer);
    }
    else {
      $dataForUserDetails = array(
        'first_name' => $firstname,
        'last_name' => $lastname,
        'address'    => $address,
        'hash_key' => $hash,
        'user_id' => $insert_id,
      );
    }
    
  $this->db->insert('user_details', $dataForUserDetails);
  
 
    $this->db->trans_complete();
    if ($this->db->trans_status() === TRUE) {
       $this->db->trans_commit();
      return true;
    }
    else {
       $this->db->trans_rollback();
       return false;
    }
  }
 public function linkTogether($payer_amount, $receiver, $receiver_amount, $payer_id, $balance)
  {
    $this->db->trans_start(); # Starting Transaction
   // $this->db->trans_strict(FALSE); # See Note 01. If you wish can remove as well
    $data = array(
        'payer_id' => $payer_id,
        'payer_amount' => $payer_amount,
        'reciever_id' => $receiver,
        'reciever_amount' => $receiver_amount,
      );     
       $requester_change = array(
        'paid' => 1,
       'amount' => $balance
      );
  $reqCheck = "user_id = ".$receiver.";
  $this->db->insert('payment', $data);
  $this->db->where($reqCheck);
  $this->db->update('comfirm_paid_users', $requester_change);
  $helper_change = array(
    'status' => 1,
    'amount' => $balance
  );
  $HepCheck = "user_id = ".$receiver.";
  $this->db->where($HepCheck);
  $this->db->update('projects', $helper_change);
  $this->db->trans_complete();
    if ($this->db->trans_status() === TRUE) {
       $this->db->trans_commit();
      return true;
    }
    else {
      $this->db->trans_rollback();
      return false;
    }
  }
 
 }
?>
