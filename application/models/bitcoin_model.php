<?php
class bitcoin_model extends CI_Model {

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
    $password = md5($password);
    $querySelector = "username = '{$username}' AND password = '{$password}'";
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
          'smtp_host' => 'smtp.umstraininghub.com',
          'smtp_port' => 465,
          'smtp_user' => 'umstraininghubcom',
          'smtp_pass' => 'Jg%!&b@L0821g&Jh!@10',
          'mailtype'  => 'html', 
          'charset'   => 'iso-8859-1'
      );
      $this->load->library('email', $config);
      $this->email->set_newline("\r\n");

      $this->email->from('noreply@donationvilla.com', 'donationvilla');
      $this->email->to($email); 

      $this->email->subject('Welcome to donationvilla');
      $this->email->message("Dear ".$username .", \r We are glad to welcome you to donationvilla, you will be merged to pay within One Hour. Thanks");  

      $this->email->send();
    }
  public function getUserDetails($user_id)
  {
    $this->db->select('*');
    $this->db->from('user_details');
    $querySelector = "user_details.user_id = $user_id";
    $this->db->where($querySelector);
    $this->db->join('users', 'users.user_id = user_details.user_id','inner');
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

  public function checkUserByUsername($username)
  {
    $this->db->select('*');
    $this->db->from('users');
    $querySelector = "username = '".$username."'";
    $this->db->where($querySelector);
    $details = $this->db->get();
    return $details->result();
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
    $query = $this->db->query("SELECT * FROM help_request WHERE user_id = $user_id ORDER BY help_request_id DESC LIMIT 1");
   $result = $query->result_array();
   return $result;
  }

  public function saveUserInfo($username, $firstname, $lastname, $address, $phone, $password, $email, $bit_add, $has_refer = 0, $referrer_id = 0)
  { 
    $password = md5($password);
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
        'address' => $address,
        
        
      );
      $trans = $this->db->insert('users', $dataForUser);
      $insert_id = $this->db->insert_id();
$dataForBitcoin = array(
        'bitcoin_address' => $bit_add,
         'user_id' => $insert_id         
      );
       $this->db->insert('bitcoin', $dataForBitcoin);
      
      if ($has_refer) {
        $dataForUserDetails = array(
        'first_name' => $firstname,
        'last_name' => $lastname,
        'address'    => $address,
        'hash_key' => $hash,
        'user_id' => $insert_id,
        
      );
      
    }
    else {
      $dataForUserDetails = array(
        'first_name' => $firstname,
        'last_name' => $lastname,
        'address'    => $address,
        'hash_key' => $hash,
        'user_id' => $insert_id
      );
    }
    
  $this->db->insert('user_details', $dataForUserDetails);
  
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
  
  public function add_new_user_payment($amount, $user_id)
  {
    
    $dataForHelp = array(
        'user_id' => $user_id,
        'amount' => $amount,
            
      );
    $help = $this->db->insert('help_request', $dataForHelp);
    return $help;
  }
}

?>
