<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class actions extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->output->enable_profiler(FALSE);
	}
	public function index()
	{
		$this->load->view('index');
	}

	public function login()
	{
		$this->load->view('login');
	}
	public function logmein(){
		$this->load->library('form_validation');
		$this->load->model('action');
		//checking validate login
		if($this->action->validate_login($this->input->post()) == FALSE)
		{
			$this->session->set_flashdata('errors', validation_errors());
			//add error handling to view file for validation errors
		}else{
			$this->action->find_user($this->input->post());
			if($user = $this->action->find_user($this->input->post())){
				//10:23am 6/9 - if get a chance stop passing password to view file; for security reasons.
				$this->load->view('wall', array('user'=>$user));
			}else{
				//10:23am 6/9 - add error handling to view files for unmatched username/password
				$this->session->set_flashdata('errors', "Wrong username or password");
				$this->load->view('login', array('errors'=>$this->session->flashdata('errors')));
			}
		}
	}	

	public function create()
	{
		$this->load->view('register');
		if($this->input->post('action') && $this->input->post('action') == 'register'){
			$this->validate_user();
		}

	}

	public function validate_user(){
		$this->load->model('action');
		if($this->action->validate_reg($this->input->post()) == FALSE)
		{
			$this->session->set_flashdata('errors', validation_errors());
		}else{
			$this->action->create($this->input->post());
			$this->session->set_flashdata('success', 'User was created successfully!');
		}

	}
			

	public function logout()
	{
		session_destroy();
		$this->load->view('index');
	}
}