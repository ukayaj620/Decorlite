<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->helper('url');
		$this->load->model('Model_items');

		$data['items'] = $this->Model_items->getList();

		$this->load->view('main', $data);
	}
}