<?php
/* 
 * File Name: deleteemployee.php
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class blocked_list extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //$this->load->helper('url');
        $this->load->database();
        //load the employee model
        $this->load->model('block_model');
    }

    //index function
    function index()
    {
$this->output->enable_profiler(FALSE);
        $data['user_details'] = $this->block_model->getBlockedList();
        $this->load->view('admin/blocked', $data);   
    }

   
}
?>