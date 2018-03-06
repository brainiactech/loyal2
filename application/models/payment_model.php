<?php
class Payment_model extends CI_Model {

  function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->load->library('session');
  }

  public function getNewUserToRecieve($user_id)
  {
    $this->db->select('payment.*, user_details.first_name,user_details.last_name, user_details.user_id, users.*');
    $this->db->from('payment');
    $querySelector = 'payment.reciever_id ='.$user_id.' AND payment.status != 1';
    $this->db->join('user_details', 'user_details.user_id = payment.payer_id','inner');
    $this->db->join('users', 'users.user_id = user_details.user_id','left');
   $this->db->join('bitcoin', 'bitcoin.user_id = user_details.user_id','left');
    $this->db->where($querySelector);
    $details = $this->db->get();
    return $details->result();
  }
 public function getNewUserToRecieveTbc($user_id)
  {
    $this->db->select('payment_tbc.*, user_details.first_name,user_details.last_name, user_details.user_id, users.*');
    $this->db->from('payment_tbc');
    $querySelector = 'payment_tbc.reciever_id ='.$user_id.' AND payment_tbc.status != 1';
    $this->db->join('user_details', 'user_details.user_id = payment_tbc.payer_id','inner');
    $this->db->join('users', 'users.user_id = user_details.user_id','left');
   $this->db->join('bitcoin', 'bitcoin.user_id = user_details.user_id','left');
    $this->db->where($querySelector);
    $details = $this->db->get();
    return $details->result();
  }
public function saveChanges($user_id, $username, $password, $firstname, $lastname, $email,$level, $phone_number  )
  {
     $requester_change = array(
        'first_name' => $firstname,
         'last_name' => $lastname,
          'level' => $level
      );
$users = array(
        'username' => $username,
         'password' => $password,
          'email' => $email,
          'phone_number' => $phone_number
      );
$this->db->where('user_id', $user_id);
 $this->db->update('users', $users);
$this->db->where('user_id', $user_id);
 $this->db->update('user_details', $requester_change);
//$this->db->where('user_id', $user_id);
// $this->db->delete('user_banks');
//$this->db->where('user_id', $user_id);
// $this->db->delete('bitcoin');

return true;
  }
public function getNewUserConfirm($user_id)
  {
    $this->db->select('payment.*, user_details.first_name,user_details.last_name, user_details.user_id, users.*');
    $this->db->from('payment');
    $querySelector = 'payment.reciever_id ='.$user_id.' AND payment.status = 2';
    $this->db->join('user_details', 'user_details.user_id = payment.payer_id','inner');
    $this->db->join('users', 'users.user_id = user_details.user_id','left');
    $this->db->join('bitcoin', 'bitcoin.user_id = user_details.user_id','left');
    $this->db->where($querySelector);
    $details = $this->db->get();
    return $details->result();
  }
  public function getNewUserToPay($user_id)
  {
   
   $this->db->select ('payment.*, user_details.first_name,user_details.last_name, user_details.user_id,  users.* ,user_banks.*, bank.bank_name ,  ');
    $this->db->from('payment');
    $querySelector = 'payment.status != 1 AND payment.payer_id = '.$user_id;
    $this->db->join('user_details', 'user_details.user_id = payment.reciever_id', 'left ');
    $this->db->join('user_banks', 'user_details.user_id = user_banks.user_id', 'left');
   $this->db->join('bank', 'bank.bank_id = user_banks.bank_id', 'left');
    $this->db->join('users', 'users.user_id = user_details.user_id','left');
   $this->db->join('bitcoin', 'bitcoin.user_id = user_details.user_id','left');
    // bitcoin.*
    $this->db->where($querySelector);
    $details = $this->db->get();
    return $details->result();
  }
public function getNewUserToPayTbc($user_id)
  {
   
   $this->db->select ('payment_tbc.*, user_details.first_name,user_details.last_name, user_details.user_id,  users.* ,user_banks.*, bank.bank_name , bitcoin.*  ');
    $this->db->from('payment_tbc');
    $querySelector = 'payment_tbc.status != 1 AND payment_tbc.payer_id = '.$user_id;
    $this->db->join('user_details', 'user_details.user_id = payment_tbc.reciever_id', 'left ');
    $this->db->join('user_banks', 'user_details.user_id = user_banks.user_id', 'left');
   $this->db->join('bank', 'bank.bank_id = user_banks.bank_id', 'left');
    $this->db->join('users', 'users.user_id = user_details.user_id','left');
   $this->db->join('bitcoin', 'bitcoin.user_id = user_details.user_id','left');
    $this->db->where($querySelector);
    $details = $this->db->get();
    return $details->result();
  }
public function getNewUserToPaybit($user_id)
  {
    $this->db->select('payment.*, user_details.first_name,user_details.last_name, user_details.user_id, bitcoin.*');
    $this->db->from('payment');
    $querySelector = 'payment.status != 1 AND payment.payer_id = '.$user_id;
    $this->db->join('user_details', 'user_details.user_id = payment.reciever_id', 'left');
    $this->db->join('bitcoin', 'user_details.user_id = bitcoin.user_id', 'left');
    $this->db->join('users', 'users.user_id = user_details.user_id','left');
    $this->db->where($querySelector);
    $details = $this->db->get();
    return $details->result();
  }

  public function get_any_user_pair($user_id){
    $this->db->select('payer_id');
    $this->db->from('payment');
    $querySelector = "payment.payer_id = $user_id AND status != 1" ;
    $this->db->where($querySelector);
    $details = $this->db->get();
    $n = count($details->result());
    return $n;
  }
   public function confirmPayTbc($payment_id,$trans_type,$user_id,$amount)
  {
    $this->db->trans_start(); # Starting Transaction
    $this->db->trans_strict(FALSE); # See Note 01. If you wish can remove as well
    if ($trans_type == 'received') {
      $data = array(
          'status' => 1,
        );
    }
    elseif ($trans_type == 'paid') {
      $data = array(
          'status' => 2,
        );
    }
    else {
      return 0;
    }
    $this->db->where('payment_id', $payment_id);
    $update = $this->db->update('payment_tbc', $data);
    if ($update) {
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
    else {
      return $update;
    }
  }
 public function upload_reciept_tbc($payment_id,$file_name){
    $this->db->trans_start(); # Starting Transaction
    $this->db->trans_strict(FALSE);
    $data = array(
          'reciept_url' => $file_name,
        );
    $this->db->where('payment_id', $payment_id);
    $update = $this->db->update('payment_tbc', $data);
    if ($update) {
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
    else {
      return $update;
    }
  }
  public function upload_reciept($payment_id,$file_name){
    $this->db->trans_start(); # Starting Transaction
    $this->db->trans_strict(FALSE);
    $data = array(
          'reciept_url' => $file_name,
        );
    $this->db->where('payment_id', $payment_id);
    $update = $this->db->update('payment', $data);
    if ($update) {
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
    else {
      return $update;
    }
  }
  public function confirmPay($payment_id,$trans_type,$user_id,$amount)
  {
    $this->db->trans_start(); # Starting Transaction
    $this->db->trans_strict(FALSE); # See Note 01. If you wish can remove as well
    if ($trans_type == 'received') {
      $data = array(
          'status' => 1,
        );
    }
    elseif ($trans_type == 'paid') {
      $data = array(
          'status' => 2,
        );
    }
    else {
      return 0;
    }
    $this->db->where('payment_id', $payment_id);
    $update = $this->db->update('payment', $data);
    if ($update) {
  $to_receive = ($amount/400);
      $data = array(
          'user_id' => $user_id,
          'amount' =>  $to_receive
      );
    $confirm_insert = $this->db->insert('comfirm_paid_users', $data);
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
    else {
      return $update;
    }
  }

  public function pairHelperToRequester($payer_amount, $sponsor, $payer_id)
  {
    $this->db->trans_start(); # Starting Transaction
    $this->db->trans_strict(FALSE); # See Note 01. If you wish can remove as well
    $data = array(
        'payer_id' => $payer_id,
        'payer_amount' => $payer_amount,
        'reciever_id' => $sponsor,
        'reciever_amount' => $payer_amount,
      );
      
  
  $this->db->insert('payment', $data);
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
 public function getSponsor($user_id)
  {
    $this->db->select('user_details.referred_by');
    $this->db->from('user_details');
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
  public function checkDownline($user_id)
  {
    $this->db->select('reffered_who');
    $this->db->from('referral');
    $querySelector = "user_id = '".$user_id."'";
    $this->db->where($querySelector);
    $details = $this->db->get();
    return $details->result();
  }
 public function pairHelperToRequesters($amount, $requester_id, $payer, $requester_db_id)
  {
    $this->db->trans_start(); # Starting Transaction
    $this->db->trans_strict(FALSE); # See Note 01. If you wish can remove as well
    $data = array(
        'payer_id' => $payer,
        'payer_amount' => $amount,
        'reciever_id' => $requester_id,
        'reciever_amount' => $amount,
      );
      $requester_change = array(
        'paid' => 1,
         'amount' => $amount
      );
  
  $this->db->insert('payment_tbc', $data);
 $reqCheck = "user_id = $requester_id AND comfirm_paid_users = $requester_db_id";
  $this->db->where($reqCheck);
  $this->db->update('comfirm_paid_users', $requester_change);
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
public function getLevel($user_id)
  {
    $this->db->select('user_details.level');
    $this->db->from('user_details');
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
public function getActivation($user_id)
  {
    $this->db->select('user_details.activated');
    $this->db->from('user_details');
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
 public function level_up($levels, $user_id)
  {
   $this->db->trans_start(); # Starting Transaction
    $this->db->trans_strict(FALSE); # See Note 01. If you wish can remove as well
   // $levs= 2;
   // $level_up = $levels + 1;
  // $data7 = array(
   // 'level' => 'level + 1'
   //   );
$this->db->where('user_id', $user_id);
$this->db->set('level', 'level+1', FALSE);
    $update = $this->db->update('user_details');
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
public function beenPaid($user_id)
  {
    $this->db->select('user_details.paid');
    $this->db->from('user_details');
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
  public function totalRecieved($user_id)
  {
    $sql = "SELECT sum(payer_amount) as total_recieved FROM payment WHERE reciever_id = ? AND status = ?";
    $result = $this->db->query($sql, array($user_id, 1));
    // $result = $this->db->get();
    return $result->result()[0];
  }
public function totalRecievedTbc($user_id)
  {
    $sql = "SELECT sum(payer_amount) as total_recieved_tbc FROM payment_tbc WHERE reciever_id = ? AND status = ?";
    $result = $this->db->query($sql, array($user_id, 1));
    // $result = $this->db->get();
    return $result->result()[0];
  }
  public function totalPaid($user_id)
  {
    $sql = "SELECT sum(payer_amount) as total_paid FROM payment WHERE payer_id = ? AND status = ?";
    $result = $this->db->query($sql, array($user_id, 1));
    // $result = $this->db->get();
    return $result->result()[0];
  }
 public function totalPaidTbc($user_id)
  {
    $sql = "SELECT sum(payer_amount) as total_paid_tbc FROM payment_tbc WHERE payer_id = ? AND status = ?";
    $result = $this->db->query($sql, array($user_id, 1));
    // $result = $this->db->get();
    return $result->result()[0];
  }
 public function currentBalance($user_id)
  {
    $sql = "SELECT sum(amount) as current_balance FROM comfirm_paid_users WHERE amount != 0 AND paid = 0 AND user_id = $user_id";
    $result = $this->db->query($sql, array($user_id, 1));
    // $result = $this->db->get();
    return $result->result()[0];
  }
 public function currentBalanceTbc($user_id)
  {
    $sql = "SELECT sum(amount) as current_balance FROM comfirm_paid_users WHERE amount != 0 AND paid = 0 AND user_id = $user_id";
    $result = $this->db->query($sql, array($user_id, 1));
    // $result = $this->db->get();
    return $result->result()[0];
  }
function countRef($user_id)
{
  $this->db->select('referral_id');
  $this->db->from('referral');
 //$querySelector = 'referral.user_id =  '.$user_id;
   // $this->db->where($querySelector);
  $this->db->where('referral_id', $user_id);
  $query = $this->db->get();
 //$details = $this->db->get();
    $n = count( $query->result());
    return $n;
}
public function countRefer($sponsor)
  {
    $this->db->select('referral_id');
    $this->db->from('referral');
    $querySelector = "referral.referral_id = {$sponsor}";
    $this->db->where($querySelector);
    $details = $this->db->get();
    if ($details->num_rows) {
      return $details->result()[0];
    }
    else {
      return null;
    }
  }
  public function myReferrals($user_id){
    $sql = "SELECT  * FROM referral LEFT JOIN user_details  as refer ON refer.user_id = referral.reffered_who WHERE referral.user_id = ? ORDER BY referral.status ASC";
    $result = $this->db->query($sql, array($user_id));
    // $result = $this->db->get();
    return $result->result();
  }

}
?>
