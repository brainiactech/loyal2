<?php
class Viewengine {

    protected $CI;

    public function __construct()
    {
      $this->CI = &get_instance();
      $this->CI->load->library('session');
      $this->CI->load->model("Auth_Model");
    }
    public function _output($view_url, $data = array())
    {
        $this->CI->output->enable_profiler(FALSE);
        $data['view_url'] = &$view_url;
        $currentUserId = $this->CI->session->userdata['user_id'];
        $data['user_details'] = $this->CI->Auth_Model->getUserDetails($currentUserId);
        $this->CI->load->view('base_view', $data);
    }
  }

?>
