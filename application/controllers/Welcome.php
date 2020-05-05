<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Model_items');
	}

	public function index()
	{
		$data['items'] = $this->Model_items->getList();

		if ($this->session->name == TRUE) {
			redirect(base_url('user/home'));
		} else {
			$this->load->view('main', $data);
		}
	}
}
