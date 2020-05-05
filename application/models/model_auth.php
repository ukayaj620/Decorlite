<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_auth extends CI_Model {
    public function validate($where) {
        return $this->db->get_where('users', $where);
    }

    public function updatePassword($password, $email) {
    	$this->db->set('userPassword', $password);
    	$this->db->where('userEmail', $email);
    	return $this->db->update('users');
	}
}
