<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Table extends CI_Model {
    public function getList() {
        return $this->db->list_tables();
    }
}
