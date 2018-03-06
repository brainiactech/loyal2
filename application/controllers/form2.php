<?php

class Form2 extends CI_Controller {
 public function __construct()
    {
header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    $method = $_SERVER['REQUEST_METHOD'];
    if($method == "OPTIONS") {
        die();
    }
      parent::__construct();
      $this->load->library('session');
      $this->load->library('authenticate');
      $this->load->model("auth_model");
      $this->load->model("Bank_Model");
      $this->load->model("Payment_Model");
      $this->output->enable_profiler(FALSE);
       
    }
	public function index()
	{
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Username is already taken..Username', 'trim|required|is_unique[users.username]|min_length[5]|max_length[15]');
		$this->form_validation->set_rules('password', 'Password', 'required');
                $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');
                $this->form_validation->set_rules('firstname', 'First Name', 'required');
                $this->form_validation->set_rules('lastname', 'LastName', 'required');
                 $this->form_validation->set_rules('phone_number', 'Phone Number', 'required|numeric');
                //$this->form_validation->set_rules('phone_number2', 'Phone Number', 'required|numeric');
           //$this->form_validation->set_rules('spons_phone_number', 'Phone Number', 'required|numeric');
                		
$this->form_validation->set_rules('email', 'Email is already taken...Email', 'required|valid_email|is_unique[users.email]');

		if ($this->form_validation->run() == FALSE)
		{
                        $this->output->enable_profiler(FALSE);
			$data['packages'] = $this->auth_model->getPackages();
                      $data['banks'] = $this->Bank_Model->getAllBanks();
                      $this->load->view('auth/register', $data);
		}
		else
		{
     $this->output->enable_profiler(FALSE);
      
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $firstname = $this->input->post('firstname');
    $lastname = $this->input->post('lastname');
    $email = $this->input->post('email');
    $address = $this->input->post('address');
   // $help_amount = $this->input->post('amount');
    $phone_number = $this->input->post('phone_number');
    $phone_number2 = $this->input->post('phone_number2');
    $sponsor = $this->input->post('spons_phone_number');
   // $bank_id = $this->input->post('bank_id');
  //  $account_name = $this->input->post('account_name');
   // $account_number = $this->input->post('account_number');
    $has_refer = $this->input->post('has_refer');
   
      $referrer_id = $this->input->post('referrer_id');
    $fetchUser = $this->auth_model->checkUserByUsername($referrer_id);
      if (count($fetchUser)) {
        $user_id = $fetchUser[0]->user_id;
      }
      
      $refs= $this->Payment_Model->countRef($user_id);
      if ($refs>5){
          $fetchDown = $this->Payment_Model->checkDownline($user_id);
      if (count($fetchDown)) {
        $ref1 = $fetchDown[0]->referral_id;
        $ref2 = $fetchDown[1]->referral_id;
        $ref3 = $fetchDown[2]->referral_id;
        $ref4 = $fetchDown[3]->referral_id;
        $ref5 = $fetchDown[4]->referral_id;
        $reff= $this->Payment_Model->countRef($ref1);
        if ($reff>5){
           goto a; 
        }else{
           $referrer_id = $ref1;  
        }
        a:
        $reff= $this->Payment_Model->countRef($ref2);
        if ($reff>5){
           goto b; 
        }else{
           $referrer_id = $ref2;  
        }
        b:
        $reff= $this->Payment_Model->countRef($ref3);
        if ($reff>5){
           goto c; 
        }else{
           $referrer_id = $ref3;  
        }
         c:
         $reff= $this->Payment_Model->countRef($ref4);
        if ($reff>5){
           goto d; 
        }else{
           $referrer_id = $ref4;  
        }
        e:
        $reff= $this->Payment_Model->countRef($ref5);
        if ($reff>5){
           goto e; 
        }else{
           $referrer_id = $ref5;  
        }           
      }
      }
    $state = $this->auth_model->saveUserInfo($username, $firstname, $lastname, $address, $phone_number, $password, $email, $phone_number2, $sponsor, $has_refer, $referrer_id);   

    // print_r($state);
    // return;
    if ($state) {
      //redirect('http://www.loyaltypay.net/account');
  echo "<script>";
echo " alert('Registration successfull.');      
        window.location.href='".site_url('index.php/auth')."';
</script>";
    }
    else {
      print_r(json_encode([
        'status' => false,
        'message' => 'Error Registering'
      ]));
    }
		}
	}

	public function username_check($str)
	{
		if ($str == 'test')
		{
			$this->form_validation->set_message('username_check', 'The %s field can not be the word "test"');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}

}
?>