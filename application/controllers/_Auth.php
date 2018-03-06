<?php

class Auth extends CI_Controller {

    public function __construct()
    {
      parent::__construct();
      $this->load->library('session');
      $this->load->library('authenticate');
      $this->load->model("auth_model");
      $this->output->enable_profiler(FALSE);
    }

	public function index (){
    $this->output->enable_profiler(FALSE);
		$this->load->view('auth/login');
	}

  public function register (){
    $this->output->enable_profiler(FALSE);
    $data['packages'] = $this->Auth_Model->getPackages();
		$this->load->view('auth/register',$data);
	}

  public function validator()
  {
    $this->output->enable_profiler(FALSE);
    $inputType = $this->input->post('type');
    if ($inputType == 'email') {
      $value = $this->input->post('email');
      $response = $this->Auth_Model->checkValidator($value, 'email');
      print_r(json_encode([
        'status' => true,
        'message' => 'Bank Added Successfully',
        'data' => $response
      ]));
    }
    elseif ($inputType == 'phone') {
      $value = $this->input->post('phone');
      $response = $this->Auth_Model->checkValidator($value, 'phone_number');
      print_r(json_encode([
        'status' => true,
        'message' => 'Bank Added Successfully',
        'data' => $response
      ]));
    }
    elseif ($inputType == 'username') {
      $value = $this->input->post('username');
      $response = $this->Auth_Model->checkValidator($value, 'username');
      print_r(json_encode([
        'status' => true,
        'message' => 'Bank Added Successfully',
        'data' => $response
      ]));
    }
    // elseif ($inputType == 'phone') {
    //   $value = $this->input->post('phone');
    //   print_r(json_encode([
    //     'status' => true,
    //     'message' => 'Bank Added Successfully'
    //   ]));
    // }

  }
	public function login()
	{
    $this->load->model("auth_model");
    $this->output->enable_profiler(FALSE);
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    print_r($this->Auth_Model->check_login_details($username, $password));
	}

  public function logout()
  {
    $this->session->sess_destroy();
    $this->authenticate->AuthRedirect('/auth');
  }
  public function account()
  {
    print_r(strtoupper(md5('1WilliamsIsaac')));
  }

  public function testPost()
  {

  }
  public function register_user()
  {
    $this->output->enable_profiler(FALSE);
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $firstname = $this->input->post('firstname');
    $lastname = $this->input->post('lastname');
    $email = $this->input->post('email');
    $address = $this->input->post('address');
    $package = $this->input->post('package');
    $phone_number = $this->input->post('phone_number');
    $state = $this->Auth_Model->saveUserInfo($username, $firstname, $lastname, $address, $phone_number, $password, $email, $package);
    // print_r($state);
    // return;
    if ($state) {
      print_r(json_encode([
        'status' => true,
        'message' => 'Registration Successful'
      ]));
    }
    else {
      print_r(json_encode([
        'status' => false,
        'message' => 'Error Registering'
      ]));
    }
  }

}

?>
