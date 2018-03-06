<?php


class Payment extends CI_Controller {

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
      $this->currentUserId = $this->session->userdata['user_id'];
    }

    public function index()
    {
      return json_encode([
        'status' => false,
        'message' => 'Not Allowed Method',
        'state' => 'ERR_100'
      ]);
    }
     public function confirm_paytbc()
    {
      $this->output->enable_profiler(FALSE);
      $payment_id = $this->input->post('payment_id');
      $trans_type = $this->input->post('trans_type');
      $user_id = $this->input->post('user_id');
      $amount = $this->input->post('amount');
    // $level = $this->Payment_Model->getLevel($this->currentUserId);
      // $levels= $level->level;
     $insert = $this->Payment_Model->confirmPayTbc($payment_id,$trans_type,$user_id, $amount );
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
    public function confirm_pay()
    {
      $this->output->enable_profiler(FALSE);
      $payment_id = $this->input->post('payment_id');
      $trans_type = $this->input->post('trans_type');
      $user_id = $this->input->post('user_id');
      $amount = $this->input->post('amount');
     
       
      // $levelso = $levels + 1;
     $insert = $this->Payment_Model->confirmPay($payment_id,$trans_type,$user_id, $amount );
      if ($insert) {
          $level = $this->Payment_Model->getLevel($this->currentUserId);
       $levels= $level->level;
       
    $level_up = $this->Payment_Model->level_up($levels, $user_id);
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
    public function get_my_payment()
    {
        echo "<pre>";
       print_r($this->Payment_Model->getNewUserPayment($this->currentUserId));
    }
    public function pair_user()
    {
      $this->output->enable_profiler(FALSE);
      $requester_id = $this->input->post('requester');
       $amount = $this->input->post('amount');
      $payer=$this->currentUserId;
      $reciever_db_id = $this->input->post('requester_db_id');
      $this->load->model("Payment_model");
$pair = $this->Payment_Model->pairHelperToRequesters($amount, $requester_id, $payer, $reciever_db_id);
if ($pair){
echo "<script>";
echo " alert('successfull.');      
        window.location.href='".site_url('index.php/user')."';
</script>";
}
    }
    public function pair_users()
    {
      $this->output->enable_profiler(FALSE);
      $helper_id = $this->input->post('helper_id');
      $helper_amount = $this->input->post('helper_amount');
      $reciever_id = $this->input->post('reciever_id');
      $reciever_amount = $this->input->post('reciever_amount');
      $reciever_db_id = $this->input->post('requester_db_id');
      $helper_db_id = $this->input->post('helper_db_id');
      $pair = $this->Payment_Model->pairHelperToRequester($helper_id, $helper_amount, $reciever_id, $reciever_amount,$helper_db_id,$reciever_db_id);
      if ($pair) {
        print_r(json_encode([
          'status' => true,
          'message' => 'Users Paired Successfully'
        ]));
      }
      else {
        print_r(json_encode([
          'status' => false,
          'message' => 'Paired not Successful'
        ]));
      }
    }
  }
?>
