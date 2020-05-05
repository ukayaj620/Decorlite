<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('Model_users');
		$this->load->model('Model_items');
		$this->load->model('Model_carts');
		$this->load->model('Model_transaksi');
		$this->load->model('Model_history');
	}

	private function flashData() {
		$this->session->set_flashdata('sign_in_first',
			'You must sign in first before access!');
		redirect(base_url('page/signin'));
	}

	public function home() {
		if ($this->session->userdata('name')) {
			$data['items'] = $this->Model_items->getList();
			$this->load->view('user/home', $data);
		} else {
			$this->flashData();
		}
	}

	public function cart() {
		if ($this->session->userdata('name')) {
			$userId = $this->session->userId;
			$where = array( 'userId' => $userId);
			$checkRow = $this->Model_carts->cartChecker($where)->num_rows();
			if ($checkRow > 0) {
				$cartId = $this->Model_carts->cartChecker($where)->row()->CartId;
				$data['cartData'] = $this->Model_carts->getCartList($cartId);
				$this->load->view('user/cart', $data);
			} else {
				$data['cartData'] = null;
				$this->load->view('user/cart', $data);
			}
		} else {
			$this->flashData();
		}
	}

}
