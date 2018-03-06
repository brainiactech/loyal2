<?php


class Upload extends CI_Controller {

    protected $currentUserId;
    public function __construct()
    {
      parent::__construct();
      $this->load->helper(array('form'));
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

    public function index(){

    }

    public function upload_file(){
      $this->output->enable_profiler(FALSE);
      $payment_id = $_GET['payment_id'];

      // print_r($payment_id);
      // return false;
      $config['upload_path']          = './uploads/';
      $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf';
      $config['max_size']             = 90000;
      $config['max_width']            = 40000;
      $config['max_height']           = 40000;

      $this->load->library('upload', $config);
      if (!$this->upload->do_upload('file-0'))
      {
        $error = array('error' => $this->upload->display_errors());
        // $this->load->view('upload_form', $error);
        return print_r(json_encode([
          'status' => false,
          'message' => $error,
          ]));
      }
      else
      {
        $data = array('upload_data' => $this->upload->data());
        // $payment_id = $this->input->post("payment_id");
        // return print_r($payment_id);
        $file_name = $data['upload_data']['file_name'];
        $insert = $this->Payment_Model->upload_reciept($payment_id,$file_name);
        if ($insert) {
            return print_r(json_encode([
            'status' => true,
            'message' => $data,
            ])); 
        }       
      }
    }
 public function upload_filetbc(){
      $this->output->enable_profiler(FALSE);
      $payment_id = $_GET['payment_id'];

      // print_r($payment_id);
      // return false;
      $config['upload_path']          = './uploads/';
      $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf';
      $config['max_size']             = 90000;
      $config['max_width']            = 40000;
      $config['max_height']           = 40000;

      $this->load->library('upload', $config);
      if (!$this->upload->do_upload('file-0'))
      {
        $error = array('error' => $this->upload->display_errors());
        // $this->load->view('upload_form', $error);
        return print_r(json_encode([
          'status' => false,
          'message' => $error,
          ]));
      }
      else
      {
        $data = array('upload_data' => $this->upload->data());
        // $payment_id = $this->input->post("payment_id");
        // return print_r($payment_id);
        $file_name = $data['upload_data']['file_name'];
        $insert = $this->Payment_Model->upload_reciept_tbc($payment_id,$file_name);
        if ($insert) {
            return print_r(json_encode([
            'status' => true,
            'message' => $data,
            ])); 
        }       
      }
    }
}
?>