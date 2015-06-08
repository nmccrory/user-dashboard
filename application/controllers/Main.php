<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->output->enable_profiler(TRUE);
	}
	public function index()
	{
		$this->session->set_userdata('number', rand(1,100));
		$this->load->view('index');
	}
	public function checkSession(){
		if($this->input->post('guess') < $this->session->userdata['number'])
		{
			$this->session->set_flashdata('result', 'Too low!');
		}
		if($this->input->post('guess') > $this->session->userdata['number'])
		{
			$this->session->set_flashdata('result', 'Too high!');
		}
		if($this->input->post('guess') == $this->session->userdata['number'])
		{
			$this->session->set_flashdata('correct', 'You got it!');
		}
		redirect('/');
	}
}