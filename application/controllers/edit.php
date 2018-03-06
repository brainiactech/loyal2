<?php
/* 
 * File Name: deleteemployee.php
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class edit extends CI_Controller
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
$this->output->enable_profiler(FALSE);
        $data['user_details'] = $this->delete_model->getUserDetails();
        $this->load->view('admin/userdetails', $data);
    
    }

    //delete employee record from db
    public function display_info($id)
    {
$this->output->enable_profiler(FALSE);
        $payer=$id;
     $data['get_data'] = $this->hunt_model->getData($payer);
       $this->load->view('user/haunting_page', $data);
//$this->load->view('user/haunting_page');
//
//$receiver_amount= $this->hunt_model->getUserDetails($id);                                  
//$helper_amount= $this->hunt_model->getUserDetails($d); 


//$this->load->model("link_model");
//$pair = $this->link_model->linkTogether($parameters);
//echo $pair;
        }
public function edit_user()
    {
$payer_amount = $this->input->post('amount_to_pay');
$receiver= $this->input->post('receiver');
$requester_db_id = $this->input->post('requester_db');
   $receiver_amount = $this->input->post('amount_to_receive');
$payer_id = $this->currentUserId;
 $balance= $receiver_amount - $payer_amount;
if ($payer_amount <20 ){
echo "<script>";
echo " alert('You cant reserve less than that amount.');      
        window.location.href='".site_url('index.php/hunt')."';
</script>";

}
else{
//echo $payer_amount;
//echo $receiver_amount;
//echo $receiver;
//echo $payer_id;
//echo $requester_db_id;
if ($balance<0){
echo "<script>";
echo " alert('You cant reserve zero dollars.');      
        window.location.href='".site_url('index.php/hunt')."';
</script>";
} else if ($balance <20 AND $balance >0 ){
echo "<script>";
echo " alert('You cant leave less than 20 dollars behind.');      
        window.location.href='".site_url('index.php/hunt')."';
</script>";
}
 else {
        $this->load->model("Payment_model");
$pair = $this->Payment_Model->pairHelperToRequester($payer_amount, $receiver, $receiver_amount, $payer_id, $balance, $requester_db_id);
if ($pair){
echo "<script>";
echo " alert('Pair successfull.');      
        window.location.href='".site_url('index.php/user')."';
</script>";
}
}
}
        }

}
?>