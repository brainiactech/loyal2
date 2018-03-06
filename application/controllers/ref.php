<?php

class Ref extends CI_Controller {

    protected $is_referred = 0;
    public function __construct()
    {
      parent::__construct();
      $this->load->library('session');
      $this->load->library('authenticate');
      $this->load->library('viewengine');
      $this->load->model("auth_model");
      $this->load->model("bank_model");
      $this->load->model("payment_model");
      $this->load->model("help_model");
      
      $this->authenticate->checkLogInState();
      $this->authenticate->verifyUserType();
      $this->currentUserId = $this->session->userdata['user_id'];
    }

    public function index(){
      $this->output->enable_profiler(FALSE);
      $ref = $_GET['user'];
      if (!$ref) {
        echo "Referral Username Missing";
        die();
        return;
      }

      $fetchUser = $this->auth_model->checkUserByUsername($ref);
      if (count($fetchUser)) {
        $user_id = $fetchUser[0]->user_id;
        $this->is_referred = 1;
        $data['is_referred'] = 1;
        $data['referrer_id'] = $user_id;
        $data['packages'] = $this->auth_model->getPackages();
        $data['banks'] = $this->bank_model->getAllBanks();
        $this->load->view('user/register',$data);
       // redirect('http://www.tbc2naira.trade/account/index.php/form');

      }
      else {
        echo "Username not Found";
      }
    }

  }
  ?>