<?php
/* 
 * File Name: deleteemployee.php
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class buy extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //$this->load->helper('url');
        $this->load->database();
        //load the employee model
        
        $this->load->model('hunt_model');
$this->load->library('viewengine');
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

    //index function
   public function index()
    {
        //get the employee list

       // $this->load->view('user/haunting_page', $data);
     // $this->load->view('user/haunt', $data);
       //$this->load->view('user/hpage', $data);
   //  $this->load->view('user/hunter', $data);
  $this->viewengine->_output('auth/buy', $data);
    
    }

    //delete employee record from db
   
public function buy_tbc()
    {
$this->output->enable_profiler(FALSE);
       $has_been_paired = $this->Payment_Model->get_any_user_pair($this->currentUserId);
        //echo $has_been_paired;
       $sponsor = $this->Payment_Model->getSponsor($this->currentUserId);
   $sponsor= $sponsor->referred_by;
    $refs= $this->Payment_Model->countRef($sponsor);
//echo $refs;
   $sponsor_level= $this->Payment_Model->getLevel($sponsor);
    $sponsor_level = $sponsor_level->level;
   $level = $this->Payment_Model->getLevel($this->currentUserId);
   $levels= $level->level;
  // echo $levels;
//$has_been_paid = $this->Payment_Model->beenPaid($this->currentUserId);
   //$has_been_paid= $has_been_paid->paid;
 $activated = $this->Payment_Model->getActivation($this->currentUserId);
   $been_activated= $activated->activated;
   if ($been_activated == 0) {
echo "<script>";
echo " alert('Account is not activated..Contact admin to purchase activation key');      
        window.location.href='".site_url('index.php/user')."';
</script>";
}
elseif ( $levels >= $sponsor_level){
echo "<script>";
echo " alert('Your upline is yet to upgrade..Kindly contact him/her to upgrade');      
        window.location.href='".site_url('index.php/user')."';
</script>";
}elseif ( $has_been_paired != 0){
echo "<script>";
echo " alert('You have a pending transaction..you cannot buy tbc for now');      
        window.location.href='".site_url('index.php/user')."';
</script>";
}elseif ( $refs < 5){
echo "<script>";
echo " alert('Your upline does not have 5 referrals yet..Kindly encourage your upline to do so');      
        window.location.href='".site_url('index.php/user')."';
</script>";
}
else{
 if ($levels ==0){
$payer_amount = 20000;
}else if ($levels==1){
$payer_amount = 50000;
}else if ($levels==2){
$payer_amount = 100000;
}else if ($levels==3){
$payer_amount = 200000;
}else if ($levels==4){
$payer_amount = 400000;
}
$payer_id = $this->currentUserId;
     
        $this->load->model("Payment_model");
$pair = $this->Payment_Model->pairHelperToRequester($payer_amount, $sponsor, $payer_id);
if ($pair){
echo "<script>";
echo " alert('Transaction Successful.');      
        window.location.href='".site_url('index.php/user')."';
</script>";
}
        }
}
}
?>