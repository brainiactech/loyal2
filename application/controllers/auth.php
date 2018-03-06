<?php

class Auth extends CI_Controller {

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

  public function index (){
    $this->output->enable_profiler(FALSE);
    $this->load->view('auth/login');
  }

  public function register (){
    $this->output->enable_profiler(FALSE);
    $data['packages'] = $this->auth_model->getPackages();
    $data['banks'] = $this->Bank_Model->getAllBanks();
    $this->load->view('auth/register',$data);
  }

  public function validator()
  {
    $this->output->enable_profiler(FALSE);
    $inputType = $this->input->post('type');
    if ($inputType == 'email') {
      $value = $this->input->post('email');
      $response = $this->auth_model->checkValidator($value, 'email');
      print_r(json_encode([
        'status' => true,
        'message' => 'Bank Added Successfully',
        'data' => $response
      ]));
    }
    elseif ($inputType == 'phone') {
      $value = $this->input->post('phone');
      $response = $this->auth_model->checkValidator($value, 'phone_number');
      print_r(json_encode([
        'status' => true,
        'message' => 'Bank Added Successfully',
        'data' => $response
      ]));
    }
    elseif ($inputType == 'username') {
      $value = $this->input->post('username');
      $response = $this->auth_model->checkValidator($value, 'username');
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
    $login = json_decode($this->auth_model->check_login_details($username, $password));
   if ($login->status) {
      if ($login->user_type == 1) {
        header('Location: http://www.tbc2naira.trade/account/index.php/admin');
      }
      else {
       header('Location: http://www.tbc2naira.trade/account/index.php/user');
      }
    }
    else {
     header('Location: http://www.tbc2naira.trade/account/index.php/auth');
    }
  }

  public function logout()
  {
    $this->session->sess_destroy();
    $this->authenticate->AuthRedirect('http://www.tbc2naira.trade/account/index.php/auth');
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
    $bank_id = $this->input->post('bank_id');
    $account_name = $this->input->post('account_name');
    $account_number = $this->input->post('account_number');
    $has_refer = $this->input->post('has_refer');
    if (isset($has_refer) && $has_refer == 1) {
      $referrer_id = $this->input->post('referrer_id');
    }
    $state = $this->auth_model->saveUserInfo($username, $firstname, $lastname, $address, $phone_number, $password, $email, $package,$bank_id,$account_name,$account_number,$has_refer,$referrer_id);
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
