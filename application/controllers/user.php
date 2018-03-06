<?php

class User extends CI_Controller {

    protected $currentUserId;
    public function __construct()
    {
      parent::__construct();
      $this->load->library('session');
      $this->load->library('authenticate');
      $this->load->library('viewengine');
      $this->load->model("Auth_Model");
      $this->load->model("Bank_Model");
      
      $this->load->model("Payment_Model");
      $this->output->enable_profiler(FALSE);
      $this->authenticate->checkLogInState();
      $this->authenticate->verifyUserType();
      $this->currentUserId = $this->session->userdata['user_id'];
       
    }

	public function index (){
	    $this->load->helper('url');
    if($this->session->userdata('logged_in'))

    {  
    $sponsor = $this->Payment_Model->getSponsor($this->currentUserId);
   $sponsor= $sponsor->referred_by;
     $data['spons'] = $this->Auth_Model->getSponsorDetails($sponsor);
    $data['user'] = $this->Auth_Model->getDetails($this->currentUserId);
    $data['user_details'] = $this->Auth_Model->getUserDetails($this->currentUserId);
    $data['has_been_paired'] = $this->Payment_Model->get_any_user_pair($this->currentUserId);
    $activated = $this->Payment_Model->getActivation($this->currentUserId);
   $data['been_activated']= $activated->activated;
   
     //$data['userrr']= $this->currentUserId;
    
    //echo $this->currentUserId;
    //print_r($this->Payment_Model->getNewUserToPay($this->currentUserId));
    //return;
    if (count($this->Payment_Model->getNewUserToRecieve($this->currentUserId))) {
      $data['has_new_payment'] = 1;
      $data['user_payment'] = $this->Payment_Model->getNewUserToRecieve($this->currentUserId);
      $data['total_paid'] = $this->Payment_Model->totalPaid($this->currentUserId);
      $data['current_balance'] = $this->Payment_Model->currentBalance($this->currentUserId);
      $data['total_recieved'] = $this->Payment_Model->totalRecieved($this->currentUserId);
      $this->viewengine->_output(["user/dashboard","user/payment_table"], $data);
    }
    elseif (count($this->Payment_Model->getNewUserToPay($this->currentUserId))) {
      $data['has_new_payment'] = 1;
      $data['user_payment'] = $this->Payment_Model->getNewUserToPay($this->currentUserId);
      $data['total_paid'] = $this->Payment_Model->totalPaid($this->currentUserId);
      $data['current_balance'] = $this->Payment_Model->currentBalance($this->currentUserId);
      $data['total_recieved'] = $this->Payment_Model->totalRecieved($this->currentUserId);
      $this->viewengine->_output(["user/dashboard","user/payment_table_receive"], $data);
    }elseif (count($this->Payment_Model->getNewUserToRecieveTbc($this->currentUserId))) {
      $data['has_new_payment'] = 1;
      $data['user_payment'] = $this->Payment_Model->getNewUserToRecieveTbc($this->currentUserId);
      $data['total_paid_tbc'] = $this->Payment_Model->totalPaidTbc($this->currentUserId);
      $data['current_balance'] = $this->Payment_Model->currentBalanceTbc($this->currentUserId);
      $data['total_recieved_tbc'] = $this->Payment_Model->totalRecievedTbc($this->currentUserId);
      $this->viewengine->_output(["user/dashboard","user/payment_table2"], $data);
    }
    elseif (count($this->Payment_Model->getNewUserToPayTbc($this->currentUserId))) {
      $data['has_new_payment'] = 1;
      $data['user_payment'] = $this->Payment_Model->getNewUserToPayTbc($this->currentUserId);
      $data['total_paid_tbc'] = $this->Payment_Model->totalPaidTbc($this->currentUserId);
      $data['current_balance'] = $this->Payment_Model->currentBalanceTbc($this->currentUserId);
      $data['total_recieved_tbc'] = $this->Payment_Model->totalRecievedTbc($this->currentUserId);
      $this->viewengine->_output(["user/dashboard","user/payment_table_receive2"], $data);
    }
    else {
      $data['has_new_payment'] = 0;
      $data['total_paid'] = $this->Payment_Model->totalPaid($this->currentUserId);
      $data['total_recieved'] = $this->Payment_Model->totalRecieved($this->currentUserId);
       $data['total_paid_tbc'] = $this->Payment_Model->totalPaidTbc($this->currentUserId);
       $data['total_recieved_tbc'] = $this->Payment_Model->totalRecievedTbc($this->currentUserId);
      $this->viewengine->_output(["user/dashboard"], $data);
    }
}
    else{

        redirect(site_url(),'refresh');

    }
	}
	
     public function generate()
  {
       $this->output->enable_profiler(FALSE);
        $data['newkey'] = $this->Auth_Model->getKey();
       //$data['keys'] = $this->delete_model->getUserKeys();
      $this->viewengine->_output("auth/activate", $data);
    }
  public function gen()
  {
       $this->output->enable_profiler(FALSE);
        //$data['newkey'] = $this->Auth_Model->getKey();
      $this->viewengine->_output("auth/act");
    }
  public function bank()
  {
    $data['banks'] = $this->Bank_Model->getAllBanks();
    if (count($this->Bank_Model->getUserBank($this->currentUserId))) {
      $data['has_bank'] = 1;
    }
    else {
      $data['has_bank'] = 0;
    }
    $data['user_bank'] = $this->Bank_Model->getUserBank($this->currentUserId);
    if ($data['has_bank']) {
      $this->viewengine->_output("user/bank", $data);
    }
    else {
      $this->viewengine->_output("user/add_bank", $data);
    }
  }

  public function addbanksdetails()
  {
    $this->output->enable_profiler(FALSE);
    $bank_id = $this->input->post('bank_id');
    $account_name = $this->input->post('account_name');
    $account_number = $this->input->post('account_number');
    $insert = $this->Bank_Model->addUserBank($bank_id, $account_name, $account_number,$this->currentUserId);
    if ($insert) {
      print_r(json_encode([
        'status' => true,
        'message' => 'Bank Added Successfully'
      ]));
    }
    else {
      print_r(json_encode([
        'status' => false,
        'message' => 'Error adding bank details'
      ]));
    }
  }

  public function bitcoinadd()
  {
      $data['bitcoin'] = $this->Bank_Model->getAllBitcoins();
    if (count($this->Bank_Model->getUserBitcoin($this->currentUserId))) {
      $data['has_bitcoin'] = 1;
    }
    else {
      $data['has_bitcoin'] = 0;
    }
    $data['user_bitcoin'] = $this->Bank_Model->getUserBitcoin($this->currentUserId);
    if ($data['has_bitcoin']) {
            $this->viewengine->_output("user/bitcoin_address", $data);
     }
    else {
      $this->viewengine->_output("user/add_bitcoin", $data);
    }
  }


 public function addbitcoindetails()
  {
    $this->output->enable_profiler(FALSE);
    $bitcoin_address = $this->input->post('bitcoin_address');
    $insert = $this->Bank_Model->addUserBitcoin($bitcoin_address, $this->currentUserId);
    if ($insert) {
      print_r(json_encode([
        'status' => true,
        'message' => 'Bitcoin Address Added Successfully'
      ]));
    }
    else {
      print_r(json_encode([
        'status' => false,
        'message' => 'Error adding bitcoin details'
      ]));
    }
  } 

  public function opes_pay_request()
  {
    $userBank = $this->Bank_Model->getUserBank($this->currentUserId);
    $getAccountTypes = $this->Auth_Model->getPackages();
    $getLastUserPackages = $this->Auth_Model->getLastUserPackages($this->currentUserId);
    echo "<pre>";
    foreach ($getAccountTypes as $value) {

    }
    print_r($userBank);
    print_r($getAccountTypes);
    print_r($getLastUserPackages[0]);
  }
  public function pay_request()
  {
    $this->output->enable_profiler(FALSE);
    $userBank = $this->Bank_Model->getUserBank($this->currentUserId);
    if (count($userBank)) {
      $data['has_bank'] = 1;
    }
    else {
      $data['has_bank'] = 0;
    }
   
    $getLastUserPackages = $this->Auth_Model->getLastUserPackages($this->currentUserId);
    if ($getLastUserPackages[0]['status']) {
      $data['has_pending_pay'] = 0;
    }
    elseif (!$getLastUserPackages[0]['status']) {
      $data['has_pending_pay'] = 1;
    }
    // print_r($data);
    $this->viewengine->_output("user/pay_request", $data);
   //$this->load->view('user/wait', $data);
  }
 public function act()
  {
    $user_id = $this->currentUserId;
    $key = $this->input->post("key");
 $key = trim($key);
//$login = ($this->auth_model->check_login_details($username, $password));
    $key67 = $this->Auth_Model->check_key($key, $user_id);
   if ($key67) {
     echo "<script>";
echo " alert('Account Activated successfull...Proceed to Buy TBC to get started');      
        window.location.href='".site_url('index.php/user')."';
</script>";
    }else{
echo "<script>";
echo " alert('Incorrect Activation Key....Contact Admin to purchase activation key');      
        window.location.href='".site_url('index.php/user/gen')."';
</script>";
}
   
  }
public function make_pay_add()
  {
    $user_id = $this->currentUserId;
    $amount_to_pay = $this->input->post("amount_to_pay");
    $project_title = $this->input->post("project_title");
    //$project_des = $this->input->post("project_description");
    $pay = $this->Auth_Model->add_new_user_pay($user_id, $amount_to_pay, $project_title);
    if ($pay) {
      print_r(json_encode([
        'status' => false,
        'message' => 'Successfully'
      ]));
    }
    else {
      print_r(json_encode([
        'status' => false,
        'message' => 'Not Successful'
      ]));
    }
  }
  public function make_pay_addition()
  {
   // $user_id = $this->currentUserId;
   // $amount_to_pay = $this->input->post("amount_to_pay");
    //$project_title = $this->input->post("project_title");
    //$project_des = $this->input->post("project_description");
for ($i = 0; $i < 100; $i++) {                   
     $this->load->helper('string');
     $key= random_string('alnum',20);
    $pay = $this->Auth_Model->add_new_user_payment($key);
}
    if ($pay) {
     echo "<script>";
echo " alert('100 Keys Generated successfull...');      
        window.location.href='".site_url('index.php/user/generate')."';
</script>";
    }
  }
 public function make_pay_admin()
  {
    $this->output->enable_profiler(FALSE);
     $user_id = $this->currentUserId;
    $amount_to_pay = $this->input->post("amount_to_pay");
    //$project_title = $this->input->post("project_title");
    //$project_des = $this->input->post("project_description");
    $pay = $this->Auth_Model->add_new_admin_payment($amount_to_pay, $this->currentUserId);
    if ($pay) {
      print_r(json_encode([
        'status' => false,
        'message' => 'Successfully'
      ]));
    }
    else {
      print_r(json_encode([
        'status' => false,
        'message' => 'Not Successful'
      ]));
    }
  }

public function request_admin()
  {
    $this->output->enable_profiler(FALSE);
    $confirm = $this->Auth_Model->getCon($this->currentUserId);
    //$data['user'] = $this->Auth_Model->getDetails($this->currentUserId);
    $userBank = $this->Bank_Model->getUserBank($this->currentUserId);
    if (count($userBank)) {
      $data['has_bank'] = 1;
    }
    else {
      $data['has_bank'] = 0;
    }

    $getLastUserPackages = $this->Auth_Model->getLastUserPackages($this->currentUserId);
    if ($getLastUserPackages[0]['status']) {
      $data['has_pending_pay'] = 0;
    }
    elseif (!$getLastUserPackages[0]['status']) {
      $data['has_pending_pay'] = 1;
    }
    // print_r($data);
    //$this->viewengine->_output("user/create_project", $data);
    $this->viewengine->_output("user/pay", $data);
   
  }
  public function my_referral(){

    $data['refer'] = $this->Payment_Model->myReferrals($this->currentUserId);
    $data['count'] = $this->Payment_Model->countRef($this->currentUserId);
    //$data['sponsor'] = $this->Payment_Model->getSponsor($this->currentUserId);
    
    // echo "<pre>";
    // print_r($data);
    $this->viewengine->_output("user/refer", $data);
  }
}

?>
