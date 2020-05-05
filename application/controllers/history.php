<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class History extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('Model_carts');
		$this->load->model('Model_transaksi');
		$this->load->model('Model_items');
		$this->load->model('Model_history');
	}

	public function historyList() {
		if($this->session->userId) {
			$userId =$this->session->userId;
			$allDataItems = array();
			$paymentHistory = array();
			$cartIds = array();
			$where = array( 'userId' => $userId);
			$checkRow = $this->Model_history->historyChecker($where)->num_rows();
			if ($checkRow > 0) {
				$history = $this->Model_history->getById($userId);
				foreach ($history as $h) {
					$list = $this->Model_history->getCartHistoryList($h->CartID);
					$dataItems = array();
					foreach ($list as $l) {
						$itemName = $l->itemName;
						$itemCount = $l->JumalahBarang;
						$itemPrice = $this->Model_items->getByID($l->itemId)[0]->itemPrice;

						$newData = array(
							'itemName' => $itemName,
							'itemPrice' => $itemPrice,
							'itemCount' => $itemCount
						);

						array_push($dataItems, $newData);
					}
					array_push($allDataItems, $dataItems);

					$historyId = array('paymentId' => $h->paymentId);
					array_push($paymentHistory, $historyId);
					array_push($cartIds, $h->CartID);
				}

				$data['allDataItems'] = $allDataItems;
				$data['allPaymentId'] = $paymentHistory;
				$data['allCartId'] = $cartIds;

				$this->load->view('user/history', $data);
			} else {
				$data['allDataItems'] = null;
				$data['allPaymentId'] = null;

				$this->load->view('user/history', $data);
			}

		} else {
			$this->session->set_flashdata('sign_in_first',
				'You must sign in first before access!');
			redirect(base_url('page/signin'));
		}
	}

	public function generatePDF($cartId, $paymentId) {
		$this->load->library('pdfgenerator');

		$list = $this->Model_history->getCartHistoryList($cartId);
		$dataItems = array();
		foreach ($list as $l) {
			$itemName = $l->itemName;
			$itemCount = $l->JumalahBarang;
			$itemPrice = $this->Model_items->getByID($l->itemId)[0]->itemPrice;

			$newData = array(
				'itemName' => $itemName,
				'itemPrice' => $itemPrice,
				'itemCount' => $itemCount
			);

			array_push($dataItems, $newData);
		}

		$data['dataItems'] = $dataItems;
		$data['paymentId'] = $paymentId;
		$html = $this->load->view('/user/pdf', $data, true);

		$this->pdfgenerator->generate($html);
	}
}
