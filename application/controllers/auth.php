<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    
    public function __contruct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Model_Auth');
    }

    public function signin() {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $where = array(
            'userEmail' => $email,
            'userPassword' => md5($password)
        );
        $checkRow = $this->Model_Auth->validate($where)->num_rows();
        if ($checkRow > 0) {
            $data_session = array (
                'name' => $username,
                'isSignIn' => true
            );

            $this->session->set_userdata($data_session);
            redirect(base_url('page/home'));
        } else {
            redirect(base_url('page/signin'));
        }
    }

    public function signup() {

    }

    public function logout() {

    }
}