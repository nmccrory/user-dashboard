<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
Class action extends CI_model{
	public function __construct(){
		parent::__construct();
	}
	public function find_user($userinfo){
		$query = "SELECT * FROM users WHERE email = ? AND password=?";
		$values = array($userinfo['email'], $userinfo['password']);
		$result = $this->db->query($query, $values)->row_array();
		return $result;
	}
	public function validate_reg($post)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('first_name', "First Name", 'trim|alpha');
		$this->form_validation->set_rules('last_name', "Last Name", 'trim|alpha');
		$this->form_validation->set_rules('email', "Email", 'valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', "Password", 'md5');
		$this->form_validation->set_rules('confirm_password', "Confirm Password",'md5');

		if($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}else{
			$this->session->set_flashdata('errors', null);
			return TRUE;
		}
	}

	public function validate_login($post){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', "Email", 'valid_email');
		$this->form_validation->set_rules('password', "Password", 'md5');

		if($this->form_validation->run() === FALSE)
		{
			return FALSE;

		}else{
			$this->session->flashdata('errors',null);
			return TRUE;
		}

	}

	public function create($userinfo){
		//insert user into db with encrypted password
		$query = "INSERT INTO users (first_name, last_name, email, password, created_at, updated_at) VALUES (?,?,?,?,NOW(),NOW())";
		$values = array($userinfo['first_name'], $userinfo['last_name'], $userinfo['email'], $userinfo['password']);
		$this->db->query($query, $values);
		//getting earliest created user
		$first = "SELECT id, first_name, last_name, created_at FROM users WHERE users.created_at = (SELECT min(created_at)FROM users)";
		$first_result = $this->db->query($first)->row_array();
		//getting most recently created user
		$get = "SELECT id, first_name, last_name, created_at FROM users WHERE users.created_at = (SELECT max(created_at)FROM users)";
		$get_query = $this->db->query($get)->row_array();
		//comparing created_at stamps to check if user is first user
		if($get_query['id'] === $first_result['id']){
			$update_query = "UPDATE users SET user_lvl=9 WHERE users.id={$get_query['id']}";
		}else{
			$update_query = "UPDATE users SET user_lvl=1 WHERE users.id={$get_query['id']}";
		}
		//setting userlevel
		$this->db->query($update_query);
	}

}
 ?>