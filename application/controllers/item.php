<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('Model_items');
	}

	public function getItemList() {

		$data['items'] = $this->Model_items->getList();
		return $this->load->view('main', $data);
	}

	private function flashData() {
		$this->session->set_flashdata('signin_for_description',
			'You must sign in to see items description');
		redirect(base_url());
	}

	public function getItemDescription() {
		if (!$this->session->userdata('name')) {
			$this->flashData();
		} else {
			$itemId = $this->uri->segment('3');
			$data['itemData'] = $this->Model_items->getByID($itemId)[0];
			$this->load->view('/user/item/description', $data);
		}
	}

	public function getUpdateItemDescription() {
		if (!$this->session->userdata('name')) {
			$this->flashData();
		} else {
			$itemId = $this->uri->segment('3');
			$itemCount = $this->uri->segment('4');
			$data['itemData'] = $this->Model_items->getByID($itemId)[0];
			$data['itemCount'] = $itemCount;
			$this->load->view('/user/item/descriptionUpdate', $data);
		}
	}
}
