<?php

class Admin extends CI_Controller {

    protected $currentUserId;
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

	public function index (){
$this->output->enable_profiler(FALSE);
    $this->viewengine->_output(["admin/dashboard"]);
  }


  public function pair()
  {
$this->output->enable_profiler(FALSE);
    $helper = $this->help_model->getNewHelpers();
    $requester = $this->help_model->getNewConfirmPaid($this->currentUserId);
    $data['helper'] = $helper;
    $data['requester'] = $requester;
    $this->viewengine->_output(["admin/pair"], $data);

  }

}

?>
