<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authenticate {

    protected $CI;

    public function __construct()
    {
      $this->CI = &get_instance();
      $this->CI->load->helper('url');
      $this->CI->load->library('session');
      if (!isset($this->CI->session->userdata)) {
        header('Location: /auth/');
      }
    }
    public function checkLogInState()
    {
      if (!isset($this->CI->session->userdata)) {
        echo "Not Logged";
        $this->CI->session->set_userdata($this->CI->session->userdata['logged_in'], 0);
        header('Location: /auth/');
      }
    }

    public function verifyUserType()
    {
      $serverPath = $_SERVER['REQUEST_URI'];
      $ePath = explode('/', $serverPath);
      if ($ePath[1] == 'admin' && $this->CI->session->userdata['user_type'] != 1) {
        $this->CI->session->sess_destroy();
        header('Location: /auth/');
      }
      elseif ($ePath[1] == 'user' && $this->CI->session->userdata['user_type'] != 0) {
        $this->CI->session->sess_destroy();
        header('Location: /auth/');
      }
    }
    public function AuthRedirect($url)
    {
      header('Location: '.$url);
    }
}
