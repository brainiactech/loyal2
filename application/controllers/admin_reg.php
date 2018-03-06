<?php

class Admin_reg extends CI_Controller {
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
                $this->form_validation->set_rules('phone_number2', 'Phone Number', 'required|numeric');
                $this->form_validation->set_rules('spons_phone_number', 'Phone Number', 'required|numeric');
                 $this->form_validation->set_rules('amount', 'Amount', 'required|numeric');		
$this->form_validation->set_rules('email', 'Email is already taken...Email', 'required|valid_email|is_unique[users.email]');

		if ($this->form_validation->run() == FALSE)
		{
                        $this->output->enable_profiler(FALSE);
			$data['packages'] = $this->auth_model->getPackages();
                      $data['banks'] = $this->Bank_Model->getAllBanks();
                      $this->load->view('auth/admin_reg', $data);
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
    $help_amount = $this->input->post('amount');
    $phone_number = $this->input->post('phone_number');
    $bank_id = $this->input->post('bank_id');
    $account_name = $this->input->post('account_name');
    $account_number = $this->input->post('account_number');
    $phone_number2 = $this->input->post('phone_number2');
    $sponsor = $this->input->post('spons_phone_number');
    $has_refer = $this->input->post('has_refer');
    if (isset($has_refer) && $has_refer == 1) {
      $referrer_id = $this->input->post('referrer_id');
    }
   
    $state = $this->crud_model->saveUserInfo($username, $firstname, $lastname, $address, $phone_number, $password, $email, $help_amount,$bank_id,$account_name,$account_number,$phone_number2,$sponsor,$has_refer,$referrer_id);   

    // print_r($state);
    // return;
    if ($state) {
      //redirect('http://www.loyaltypay.net/account');
  echo "<script>";
echo " alert('Registration successfull.');      
        window.location.href='".site_url('index.php/admin')."';
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