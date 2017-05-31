<?php
//8:14pm 6/9 - need to break up and modulate the controllers along with the models. Still many features missing such as special privledges for admins and also editing user profiles(WIP). HTML/CSS also needs to be reworked more according to the Materialize structure expectations. Would say site is 60% complete. Error Handling. Refactor. Clean. 
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
				$loggedinfo = array('first_name'=>$user['first_name'], 'last_name'=>$user['last_name'], 'email'=>$user['email'], 'id'=>$user['id'],'user_lvl'=>$user['user_lvl']);
				$this->session->set_userdata('logged_user',$loggedinfo);
				redirect("/users/show/{$user['id']}");
			}else{
				//10:23am 6/9 - add error handling to view files for unmatched username/password
				$this->session->set_flashdata('errors', "Wrong username or password");
				$this->load->view('login');
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
	public function showUser($id){
		$this->load->model('action');
		$info_array = array('user'=>$this->action->findById($id), 'messages'=>$this->action->getWall($id),'comments'=>$this->action->getComments($id));
		$this->load->view('wall', $info_array);
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
		redirect('/');
	}

	public function post_message(){
		$this->load->model('action');
		$logged_user = $this->session->userdata('logged_user');
		$this->action->post($this->input->post(), $logged_user);
		$wallid = $this->input->post('wallid');
		$route = "/users/show/".$wallid;
		redirect($route);
	}
	public function post_comment(){
		$this->load->model('action');
		$logged_user = $this->session->userdata('logged_user');
		$this->action->postComment($this->input->post(), $logged_user);
		$wallid = $this->input->post('wallid');
		$route = "/users/show/".$wallid;
		redirect($route);
	}
	public function loadDashboard(){
		$this->load->model('action');
		$query_arr = array('users'=>$this->action->findAll());
		$this->load->view('dashboard', $query_arr);
	}
	public function editUser(){
		$this->load->view('edit');
	}
}