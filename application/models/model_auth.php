<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Auth extends CI_Model {
    public function validate($where) {
        return $this->db->get_where('users', $where);
    }
}