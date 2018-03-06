
<?php
class Project_Model extends CI_Model {

  function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->load->library('session');
  }

 public function add_new_user_project($project_name, $project_des, $amount_to_pay, $user_id)
  {
    $dataForHelp = array(
       'user_id' => $user_id,
       'project_title' = $project_name,
       'project_description' = $project_des,
        'amount' => $amount_to_pay,
      );
    $help = $this->db->insert('projects', $dataForHelp);
    return $help;
  }

 }
?>
