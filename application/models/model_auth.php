<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_auth extends CI_Model {
    public function validate($where) {
        return $this->db->get_where('users', $where);
    }
}