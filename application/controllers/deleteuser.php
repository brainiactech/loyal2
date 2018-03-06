<?php
/* 
 * File Name: deleteemployee.php
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class deleteuser extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //$this->load->helper('url');
        $this->load->database();
        //load the employee model
        $this->load->model('delete_model');
         $this->load->model('hunt_model');
          $this->load->model('Payment_Model');
       $this->load->library('viewengine');
    }

    //index function
    function index()
    {
        //get the employee list
$this->output->enable_profiler(FALSE);
        $data['user_details'] = $this->delete_model->getUserDetails();
        $this->load->view('admin/userdetails', $data);
    }

    //delete employee record from db
function edit_user($id)
    {
$this->output->enable_profiler(FALSE);
    $user_id = $this->input->post('user_id');
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $firstname = $this->input->post('firstname');
    $lastname = $this->input->post('lastname');
    $email = $this->input->post('email');
    $level = $this->input->post('level');
   $phone_number = $this->input->post('phone');

        //delete employee record
      $save = $this->Payment_Model->saveChanges($user_id, $username, $password, $firstname, $lastname, $email,$level, $phone_number);
    //  redirect('http://www.tbc2naira.trade/account/index.php/deleteuser/edit_user');
if ($save){
echo "<script>";
echo " alert('User Details Edited.');      
        window.location.href='".site_url('index.php/deleteuser')."';
</script>";
}
        }
public function display_user($id)
    {
$this->output->enable_profiler(FALSE);
        $payer=$id;

     $data['get_data'] = $this->hunt_model->getUserDetails($payer);
       $this->load->view('user/haunting_page', $data);

        }
    function delete_user($id)
    {
$this->output->enable_profiler(FALSE);
        //delete employee record
$this->db->where('user_id', $id);
        $this->db->delete('users');
$this->db->where('user_id', $id);
 $this->db->delete('user_details');
$this->db->where('user_id', $id);
 $this->db->delete('user_banks');
$this->db->where('user_id', $id);
 $this->db->delete('referral');

      redirect('http://www.tbc2naira.trade/account/index.php/deleteuser');
        }
}
?>