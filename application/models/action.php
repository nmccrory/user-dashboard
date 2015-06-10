<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
Class action extends CI_model{
	public function __construct(){
		parent::__construct();
	}
	//find all users
	public function findAll(){
		$query = "SELECT * FROM users";
		return $this->db->query($query)->result_array();
	}
	public function find_user($userinfo){
		$query = "SELECT * FROM users WHERE email = ? AND password=?";
		$values = array($userinfo['email'], $userinfo['password']);
		return $this->db->query($query, $values)->row_array();
	}
	public function findById($id){
		$query = "SELECT * FROM users WHERE id=$id";
		return $this->db->query($query)->row_array();
	}

	public function getWall($id){
		$query = "SELECT first_name, last_name, user_id, email, message, messages.updated_at, messages.id FROM messages JOIN users ON messages.user_id = users.id WHERE wall_id = ? ORDER BY messages.updated_at DESC";
		$values = array($id);
		return $this->db->query($query, $values)->result_array();
	}
	public function getComments($id){
		$query = "SELECT first_name, last_name, comments.user_id, email, comment, comments.updated_at, comments.post_id FROM comments JOIN users ON comments.user_id = users.id JOIN messages ON comments.post_id = messages.id WHERE messages.wall_id = ?";
		$values = array($id);
		return $this->db->query($query,$values)->result_array();
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
			return TRUE;
		}

	}
	//modify to see if table is empty not if earliest created user
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
	//check to see if admin
	public function isAdmin($lvl){
		if($lvl>=9){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	//posting messages
	public function post($message, $id){
		$query = "INSERT INTO user_dashboard.messages (user_id, message, wall_id, created_at, updated_at) VALUES (?,?,?,NOW(),NOW())";
		$query_arr = array($id['id'], $message['content'], $message['wallid']);
		$runquery = $this->db->query($query, $query_arr);
	}
	public function postComment($comment,$id){
		$query = "INSERT INTO comments (comment, post_id, user_id, created_at, updated_at) VALUES (?,?,?,NOW(),NOW())";
		$values = array($comment['comment'], $comment['postid'], $id['id']);
		$this->db->query($query, $values);
	}
}
 ?>