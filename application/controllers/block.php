<?php
/* 
 * File Name: deleteemployee.php
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class block extends CI_Controller
{
protected $currentUserId;
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
        //get the employee list
       $this->output->enable_profiler(FALSE);
        $data['user_details'] = $this->block_model->getUserDetails();
        $this->load->view('admin/block', $data);
    }

     function unblock_user($id)
    {

$unblock = $this->block_model->unblock_user($id);
if($unblock){
echo "<script>";
echo " alert('User Has been Unblocked...');  
        window.location.href='".site_url('index.php/block')."';
</script>";
      }
        }
    function block_user($id)
    {
 $payer_id= $this->currentUserId;
$block = $this->block_model->block_user($id);
if($block){
echo "<script>";
echo " alert('User Has been Blocked...');      
        window.location.href='".site_url('index.php/block')."';
</script>";
      }
        }
function block_users()
    {
 $payer_id= $this->currentUserId;
$block = $this->block_model->block_user($payer_id);
        }
}
?>