<?php
class lola_model extends CI_Model {

  function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->load->library('session');
  }

 public function check_login_details($username, $password)
  {
    $this->load->library('session');
    $this->db->select('username, user_id, email, user_type');
    $this->db->from('users');
   // $password = md5($password);
    $querySelector = "username = '{$username}' AND password = '{$password}' AND  blocked != 1";
    $this->db->where($querySelector);
    $existLogin = $this->db->get();
    if ($existLogin->num_rows) {
      $data = $existLogin->result();
      $InitSet = array(
        'username'  => $data[0]->username,
        'email'     => $data[0]->email,
        'user_id'   => $data[0]->user_id,
        'logged_in' => TRUE,
        'user_type' => $data[0]->user_type
      );
    $this->session->set_userdata($InitSet);
      return json_encode([
        'status' => true,
        'message' => 'Your Login is Successful',
        'user_type' => $data[0]->user_type
      ]);

    }
    else {
      return json_encode([
        'status' => false,
        'message' => 'Incorrect Login Credentials'
      ]);
    }
  }

  public function sendWelcomeEmail($email, $username){
      $config = Array(
          'useragent' => "CodeIgniter",
          'mailpath' => "/usr/bin/sendmail",
          'protocol' => 'smtp',
          'smtp_host' => 'smtp.myachieversdream.com',
          'smtp_port' => 465,
          'smtp_user' => ' myachieversdreamcom',
          'smtp_pass' => 'Jg#!&b@M0921G&Jh!@82',
          'mailtype'  => 'html', 
          'charset'   => 'iso-8859-1'
      );
      $this->load->library('email', $config);
      $this->email->set_newline("\r\n");

      $this->email->from('noreply@tbc2naira.trade', 'Tbc2Trade');
      $this->email->to($email); 

      $this->email->subject('Welcome to Tbc2Trade');
      $this->email->message("Dear ".$username .", \r We are glad to welcome you to Tbc2Trade, ensure you get the required referrals and keep progressing . Thanks");  

      $this->email->send();
    }
  public function getUserDetails($user_id)
  {
    $this->db->select('*');
    $this->db->from('user_details');
    $querySelector = "user_details.user_id = $user_id";
    $this->db->where($querySelector);
    $this->db->join('users', 'users.user_id = user_details.user_id','inner');
     $this->db->join('bitcoin', 'bitcoin.user_id = user_details.user_id','inner');
       //$this->db->join('help_request', 'help_request.user_id = user_details.user_id','inner');
    $details = $this->db->get();
    return $details->result()[0];
  }

 public function getSponsorDetails($user_id)
  {
    $this->db->select('*');
    $this->db->from('user_details');
    $querySelector = "user_details.user_id = $user_id";
    $this->db->where($querySelector);
    $this->db->join('users', 'users.user_id = user_details.user_id','inner');
     //$this->db->join('bitcoin', 'bitcoin.user_id = user_details.user_id','inner');
       //$this->db->join('help_request', 'help_request.user_id = user_details.user_id','inner');
    $details = $this->db->get();
    return $details->result()[0];
  }
  public function checkValidator($value, $type)
  {
    $this->db->select('count(user_id) as count');
    $this->db->from('users');
    // $querySelector = $type." = $value";
    $this->db->where($type, $value);
    $details = $this->db->get();
    return $details->result()[0];
  }
public function getKey()
  {
 $this->db->select('key.*');
    $this->db->from('key');
    $querySelector = 'key.status = 0';
    $this->db->where($querySelector);
    $details = $this->db->get();
    return $details->result();
  }
  public function checkUserByUsername($username)
  {
    $this->db->select('*');
    $this->db->from('users');
    $querySelector = "username = '".$username."'";
    $this->db->where($querySelector);
    $details = $this->db->get();
    return $details->result();
  }
  
   public function getCon($user_id)
  {
   
   $this->db->from('comfirm_paid_users');
$querySelector = "comfirm_paid_users.user_id = $user_id AND paid = 0";
    $this->db->where($querySelector); 
        $query = $this->db->get();
        return $query->result();
  }

  public function getPackages()
  {
    $this->db->select('*');
    $this->db->from('account_type');
    $details = $this->db->get();
    return $details->result();
  }

 public function getLastUserPackages($user_id)
 {
    $query = $this->db->query("SELECT * FROM payment WHERE payment.payer_id = $user_id ORDER BY payment_id DESC LIMIT 1");
    $result = $query->result_array();
   return $result;
 }
public function check_key($key, $user_id)
  {      
 $this->db->select('key.key');
    $this->db->from('key');
   
    $querySelector = "key = '{$key}' AND status = 0";
    $this->db->where($querySelector);
    $existLogin = $this->db->get();
    if ($existLogin->num_rows) {
   
       $dataForHelper = array(
        
          'status' => 1  
      );
    $querySelector1 = "key = '{$key}' AND status = 0";
    $this->db->where($querySelector1);
    $help = $this->db->update('key', $dataForHelper);
    //return $help;
 $data1 = array(
          'activated' => 1
      );
      $this->db->where('user_id', $user_id);
    $confirm_insert = $this->db->update('user_details', $data1);
   return true;
    }
    else {
      return 0;
    }
    }   
  
public function saveUserInfo($username, $firstname, $lastname, $address, $phone_number, $password, $email, $phone_number2, $sponsor, $has_refer , $referrer_id )
  {
    //$password = md5($password);
    $hash = strtoupper(md5($username.$firstname));
    // return $help_amount;
    // return $help_amount;
    $this->db->trans_start(); # Starting Transaction
    $this->db->trans_strict(FALSE); # See Note 01. If you wish can remove as well
    $dataForUser = array(
        'username' => $username,
        'password' => $password,
        'email'    => $email,
        'phone_number' => $phone_number,
        'address' => $address,
        'phone_number2'=> $phone_number2,
       'sponsor_phone' => $sponsor
      );
      $trans = $this->db->insert('users', $dataForUser);
      // return $this->db->insert_id();
      // return;
      $insert_id = $this->db->insert_id();
     
        $dataForUserDetails = array(
        'first_name' => $firstname,
        'last_name' => $lastname,
        'address'    => $address,
        'hash_key' => $hash,
        'user_id' => $insert_id,
        'referred_by' => $referrer_id
      );
    
  $this->db->insert('user_details', $dataForUserDetails);
   $dataForRefer = array(
         'referral_id' => $referrer_id,
        'amount_to_get' => $amount,
        'reffered_who' => $insert_id,
        'user_id' => $referrer_id
      );    
   $this->db->where('user_id', $referrer_id);
    $this->db->insert('referral', $dataForRefer);
    $this->db->trans_complete();
    if ($this->db->trans_status() === TRUE) {
       $this->db->trans_commit();
       $this->sendWelcomeEmail($email, $username);
      return true;
    }
    else {
       $this->db->trans_rollback();
       return false;
    }
  }
 public function getDetails($user_id)
  {
    $this->db->select('*');
    $this->db->from('users');
    $querySelector = "users.user_id = $user_id";
    $this->db->where($querySelector);
    $this->db->join('user_details', 'user_details.user_id = users.user_id','inner');
    $details = $this->db->get();
    return $details->result()[0];
  }
public function saveKey($key)
  {
    $dataForHelp = array(
        'key' => $key,
          'status' => 0  
      );
    $help = $this->db->insert('key', $dataForHelp);
    return $help;
  }
public function getUserConfirmation($user_id)
  {
    $this->db->from('user_details');
        $this->db->join('users', 'user_details.user_id = users.user_id');
        //$this->db->join('user_banks', 'users.user_id = user_banks.user_id');
      // $this->db->join('projects', 'users.user_id = projects.user_id');
        $this->db->join('comfirm_paid_users', 'users.user_id = comfirm_paid_users.user_id AND comfirm_paid_users.amount != 0 AND comfirm_paid_users.paid != 1 ');
        $query = $this->db->get();
        return $query->result();
  }
public function add_new_user_pay($user_id, $amount_to_pay, $project_title)
  {
    $dataForHelp = array(
        'user_id' => $user_id,
         'amount' => $amount_to_pay,
        'project_title' => $project_title      
      );
    $help = $this->db->insert('projects', $dataForHelp);
    return $help;
  }

  public function add_new_user_payment($key)
  {
    $dataForHelp = array(
        'key' => $key,
          'status' => 0  
      );
    $help = $this->db->insert('key', $dataForHelp);
    return $help;
  }
}


?>
