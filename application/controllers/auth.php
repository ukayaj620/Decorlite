<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('model_auth');
        $this->load->model('model_users');
    }

    public function signin() {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $where = array(
            'userEmail' => $email,
            'userPassword' => md5($password)
        );
        $checkRow = $this->model_auth->validate($where)->num_rows();
        if ($checkRow > 0) {
            $data_session = array (
                'name' => $this->model_auth->validate($where)->row()->userName,
                'userId' => $this->model_auth->validate($where)->row()->userId,
                'isSignIn' => true
            );
            $this->session->set_userdata($data_session);
            redirect(base_url('user/home'));
        } else {
        	$this->session->set_flashdata('wrong_credentials',
				'Please input your credentials correctly!');
            redirect(base_url('page/signin'));
        }
    }

	private function checkEmail($str) {
		return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
	}

    public function signup()
	{
		$userName = $this->input->post('name');
		$userEmail = $this->input->post('email');
		$password = $this->input->post('password');
		$confirmPassword = $this->input->post('confirmPassword');

		$where = array(
			'userEmail' => $userEmail
		);

		$checkEmail = $this->model_auth->validate($where)->num_rows();
		if ($checkEmail > 0) {
			$this->session->set_flashdata('email_exist',
				'Email has already exist!');
			redirect(base_url('page/signup'));
		} else if ($password != $confirmPassword) {
			$this->session->set_flashdata('password_not_same',
				'Password and confirm password is not same!');
			redirect(base_url('page/signup'));
		} else if ($userName && $this->checkEmail($userEmail) && $password) {
			$userId = uniqid('U-');
			if ($this->model_users->insert($userId, $userName, $userEmail, md5($password), '')) {
				$this->session->set_flashdata('sign_up_successful',
					'Please sign in for verification');
				redirect(base_url('page/signin'));
			}
		} else if (!$userName || !$this->checkEmail($userEmail) || !$password) {
			$this->session->set_flashdata('fill_it_properly',
				'Please fill the sign up form properly');
			redirect(base_url('page/signup'));
		} else {
			redirect(base_url('page/signup'));
		}
	}
    public function signout() {
		$this->session->sess_destroy();
		redirect(base_url());
    }

    public function forgotpassword() {
    	$email = $this->input->post('email');
    	$password = $this->input->post('password');
    	$confirmPassword = $this->input->post('confirmpassword');

    	$where = array('userEmail' => $email);

    	$checkRow = $this->model_auth->validate($where)->num_rows();
    	if ($checkRow > 0) {
    		if ($password == $confirmPassword) {
				if ($this->model_auth->updatePassword(md5($password), $email)) {
					$this->session->set_flashdata('update_pass_success',
						'Update Password Successfully. Proceed to sign in');
					redirect(base_url('page/signin'));
				} else {
					$this->session->set_flashdata('update_pass_failed',
						'Something wrong happened');
					redirect(base_url('page/forgotpassword'));
				}
			} else {
				$this->session->set_flashdata('password_not_same',
					'Password and confirm password is not same!');
				redirect(base_url('page/forgotpassword'));
			}
		} else {
			$this->session->set_flashdata('email_not_exist',
				'Your email does not exist!');
			redirect(base_url('page/forgotpassword'));
		}
	}
}
