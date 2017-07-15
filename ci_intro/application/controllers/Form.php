<?php
     class Form extends CI_Controller { 

      public function index() { 
         /* Load form helper */ 
         $this->load->helper(array('form'));
			
         /* Load form validation library */ 
          $this->load->library('form_validation');

          $this->form_validation->set_rules('Username', 'Username', 'trim|required|min_length[5]|max_length[12]');
          $this->form_validation->set_rules('Email', 'Email', 'trim|required|valid_email');
$this->form_validation->set_rules('pwd', 'Password', 'trim|required|min_length[3]');
$this->form_validation->set_rules('pwdc', 'Password Confirmation', 'trim|required|matches[pwd]');

			
         if ($this->form_validation->run() == FALSE) { 
         $this->load->view('myform'); 
         } 
         else { 
          
$salt = "exaggeration";

$hash= hash("sha256",$this->input->post('pwd').$salt);
$data = array(
        'username' => $this->input->post('Username'),
         'email'   =>$this->input->post('Email'),
        'password' => $hash
);
$this->form_validation->set_data($data);
$this->insert_model->process($data);

            $this->load->view('formsuccess'); 
         } 
      }
   }
?>