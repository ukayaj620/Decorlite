<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	 public function __construct()
     {
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model('admin/model_login');
		$this->load->model('admin/model_admin');
		
     }
	 
	public function index()
	{
	   
	   $data['err']='';
	  
		$this->load->view('admin/login',$data);
	}
	
	public function logout()
	{
	   $this->session->sess_destroy();
	   
	   redirect(base_url('admin/login'));
	
	}
	
	public function submit_login()
	{
	   $admin_id = $this->input->post('admin_id');
	   $admin_password = $this->input->post('admin_password');
	   
		#$this->model_admin->insert($admin_id, 'Ferdy_Nicolas', $admin_password);
	
	   $cek_status = $this->model_admin->check_login($admin_id, $admin_password)->num_rows();
	   
	   if($cek_status>0)
	   {
			$profile =  $this->model_admin->getbyID($admin_id);
			$data_session = array(
				'adminId' => $admin_id,
				'adminName' => $profile['adminName'],
				'isLoggedIn' => true
			);

			if (!empty($this->input->post('RememberCheck')))
			{
			   setcookie("loginAdminId", $this->input->post('admin_id'), time()+(86400));
			   setcookie("loginAdminPassword", $this->input->post('admin_password'), time()+(86400));
			} else {
	            setcookie("loginAdminId","");
			    setcookie("loginAdminPassword","");
			}
			
			$this->session->set_userdata($data_session);
			
			redirect(base_url("admin/home"));
	   }
	   else
	   {
			$data['err']='incorrect user id or password';
			
			$this->load->view('admin/login',$data);
		}
	}
	
	
}
