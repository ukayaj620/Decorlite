<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('Model_carts');
		$this->load->model('Model_transaksi');
		$this->load->model('Model_items');
		$this->load->model('Model_history');
	}

	public function index() {
		$this->load->view('/user/cart');
	}

	private function flashData() {
		$this->session->set_flashdata('sign_in_first',
			'You must sign in first before access!');
		redirect(base_url('page/signin'));
	}

	public function addItemToCart() {
		$itemId = $this->uri->segment('3');
		$itemCount = $this->uri->segment('4');

		if ($this->session->userId) {
			$userId = $this->session->userId;
			$where = array (
				'userId' => $userId
			);
			$itemName = $this->Model_items->getByID($itemId)[0]->itemName;
			$checkRow = $this->Model_carts->cartChecker($where)->num_rows();
			if ($checkRow == 0) {
				$cartId = uniqid('C-');
				$this->Model_carts->insert($cartId, $userId);
				$this->Model_transaksi->insert($cartId, $itemId, $itemCount);
			} else {
				$cartId = $this->Model_carts->cartChecker($where)->row()->CartId;
				$where = array(
					'CartID' => $cartId,
					'ItemID' => $itemId
				);
				$checkItemInCart = $this->Model_transaksi->itemChecker($where)->num_rows();
				if ($checkItemInCart == 0) {
					$this->Model_transaksi->insert($cartId, $itemId, $itemCount);
				} else {
					$itemBeforeCount = $this->Model_transaksi->itemChecker($where)->row()->JumalahBarang;
					$itemCount += $itemBeforeCount;
					$this->Model_transaksi->update($cartId, $itemId, $itemCount);
				}
			}
			$this->session->set_flashdata('item_add_to_cart',
				'This Item ' . $itemName . ' with amount ' .  $itemCount . ' item(s) has been added to your cart');
			redirect(base_url('user/home'));
		} else {
			$this->flashData();
		}
	}

	public function updateItemInCart() {
		$itemId = $this->uri->segment('3');
		$itemCount = $this->uri->segment('4');

		if ($this->session->userId) {
			$userId = $this->session->userId;
			$where = array (
				'userId' => $userId
			);
			$itemName = $this->Model_items->getByID($itemId)[0]->itemName;
			$cartId = $this->Model_carts->cartChecker($where)->row()->CartId;
			$this->Model_transaksi->update($cartId, $itemId, $itemCount);
			$this->session->set_flashdata('update_item_in_cart',
				'This Item ' . $itemName . ' with amount ' .  $itemCount . ' item(s) has been updated on your cart');
			redirect(base_url('user/cart'));
		} else {
			$this->flashData();
		}
	}

	public function deleteItemInCart() {
		$itemId = $this->uri->segment('3');
		if ($this->session->userId) {
			$userId = $this->session->userId;
			$where = array (
				'userId' => $userId
			);
			$itemName = $this->Model_items->getByID($itemId)[0]->itemName;
			$cartId = $this->Model_carts->cartChecker($where)->row()->CartId;
			$this->Model_transaksi->deleteItemOnCart($itemId, $cartId);
			$this->session->set_flashdata('delete_item_in_cart',
				'This Item ' . $itemName . ' has been deleted from your cart');
			redirect(base_url('user/cart'));
		} else {
			$this->$this->flashData();
		}
	}

	public function buy() {
		if ($this->session->userId) {
			$userId = $this->session->userId;
			$cartId = $this->uri->segment('3');
			$cartList = $this->Model_carts->getCartList($cartId);
			$payment = 0;

			$dataItems = array();
			foreach ($cartList as $cart) {
				$itemId = $cart->itemId;
				$itemCount = $cart->JumalahBarang;
				$item = $this->Model_items->getByID($itemId)[0];
				$itemStock = $item->itemStock;
				$itemName = $item->itemName;
				$this->Model_items->updateItems($itemId, $itemStock - $itemCount);
				$itemPrice = $item->itemPrice;
				$payment += $itemPrice * $itemCount;

				$newData = array(
					'itemName' => $itemName,
					'itemPrice' => $itemPrice,
					'itemCount' => $itemCount
				);

				array_push($dataItems, $newData);
			}
			$date = date("l jS \of F Y h:i:s A");
			$paymentId = uniqid('P-');
			$this->Model_history->insert($paymentId, $userId, $payment, $date, $cartId);
			$this->Model_carts->delete($cartId);

			$data['dataItems'] = $dataItems;
			$data['paymentId'] = $paymentId;
			redirect(base_url('history/historyList'));
		} else {
			$this->$this->flashData();
		}
	}
}
