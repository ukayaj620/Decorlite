<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	 public function __construct()
     {
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model('admin/model_table');
				
     }

	public function index()
	{
	
	   if(!$this->session->userdata('isLoggedIn')){
			 redirect(base_url('login'));
	   }
		
	
	    $data['resulthasil']= $this->model_table->getList();
		$data['isClickedLink']= false;
		$this->load->view('admin/dashboard' , $data);
	}
}
