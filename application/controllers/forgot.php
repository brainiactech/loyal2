<?php

class Forgot extends CI_Controller
{
public function __construct() {
parent::__construct();
}
public function display_doforget()
	{
	   $data="";
          $this->output->enable_profiler(FALSE);
	   $this->load->view('auth/forgot',$data);
	}
	public function doforget()
	{
	    $this->load->helper('url');
		$email= $this->input->post('emailid');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('emailid','emailid','required|xss_clean|trim');
		 if ($this->form_validation->run() == FALSE)
			{
	                            $this->output->enable_profiler(FALSE);
				$this->load->view('auth/forgot');
	 
			}
			else
			{
		$q = $this->db->query("select * from users where email='" . $email . "'");
        if ($q->num_rows > 0) {
            $r = $q->result();
            $user=$r[0];
			$this->load->helper('string');
			$password= random_string('alnum',6);
			$this->db->where('user_id', $user->user_id);
			$this->db->update('users',array('password'=>MD5($password)));
			$this->load->library('email');
			$this->email->from('noreply@unityfunds.org', 'Unity Funds');
			$this->email->to($email); 	
			$this->email->subject('Password reset');
			$this->email->message('You have requested for a new password, Here is your new password:'. $password);	
			$this->email->send();
		    $this->session->set_flashdata('message','Password has been reset and has been sent to email');		

		   redirect('index.php/forgot/display_doforget');
		   }
		   }
	}
}