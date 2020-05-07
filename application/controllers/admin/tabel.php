<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tabel extends CI_Controller {
	
   public function __construct(){
      parent::__construct();
      $this->load->helper(array('form', 'url', 'file'));
      $this->load->model('admin/model_table');
      $this->load->model('admin/model_admin');
      $this->load->model('admin/model_carts');
      $this->load->model('admin/model_catagories');
      $this->load->model('admin/model_history');
      $this->load->model('admin/model_items');
      $this->load->model('admin/model_transaksi');      
      $this->load->model('admin/model_users');   
   }

   public function list($table_name) {
      $data['title'] = "Daftar ".$table_name;
      $data['table_name'] = $table_name;
      $data['resulthasil'] = $this->model_table->getList();

      $this->get_table($table_name, $data);


      if ($table_name == 'admin' || $table_name == 'items' || $table_name == 'catagories') {
         $this->load->view('admin/tabel_crud' , $data);
      } else {
         $this->load->view('admin/tabel' , $data);
      }
   }
   
   public function edit($table_name) {
      $data['title'] = "Daftar ".$table_name;
      $data['table_name'] = $table_name;
      $data['resulthasil'] = $this->model_table->getList();
      $this->get_table($table_name, $data);
      $data['isi'] = $this->input->post('data');

      $this->load->view('admin/tabel_edit' , $data);
   }

   public function insert($table_name) {
      $data['title'] = "Daftar ".$table_name;
      $data['table_name'] = $table_name;
      $data['resulthasil'] = $this->model_table->getList();
      $this->get_table($table_name, $data);
      $data['isi'] = "";

      $this->load->view('admin/tabel_insert' , $data);
   }

   public function submit_edit($table_name) {
      $data = $this->input->post('data');

      if ($table_name == 'items') {
         $data[] = 'img/Decorlite/'.$this->_uploadPhoto();
         unlink('./'.$this->input->post('oldPath'));
      }

      call_user_func_array(array($this->get_model($table_name), 'update'), $data);

      redirect(base_url("admin/tabel/list/".$table_name));
   }

   public function submit_insert($table_name) {
      $data = $this->input->post('data');

      if ($table_name == 'items') {
         $data[] = 'img/Decorlite/'.$this->_uploadPhoto();
      }

      call_user_func_array(array($this->get_model($table_name), 'insert'), $data);
      
      redirect(base_url("admin/tabel/list/".$table_name));
   }

   public function submit_delete($table_name) {
      $this->get_model($table_name)->delete($this->input->post('data')[0]);
      
      if ($table_name == 'items') {
         $last_index = count($this->input->post('data'))-1;
         unlink('./'.$this->input->post('data')[$last_index]);
      }
     
      redirect(base_url("admin/tabel/list/".$table_name));
   }

   private function get_table($table_name, &$data){
      switch ($table_name) {
         case 'admin':
            $data['fields'] = ['ID', 'Nama', 'Password'];
            $data['isi'] = $this->model_admin->getList();
            break;

         case "carts":
            $data['fields'] = ['ID Cart', 'ID User'];
            $data['isi'] = $this->model_carts->getList();
            break;
         
         case "catagories":
            $data['fields'] = ['ID Kategori', 'Nama Kategori'];
            $data['isi'] = $this->model_catagories->getList();
            break;
         
         case "history":
            $data['fields'] = ['ID User', 'Pembayaran', 'Tanggal Bayar', 'ID Cart'];
            $data['isi'] = $this->model_history->getList();
            break;
         
         case "items":
            $data['fields'] = ['ID Item', 'Nama Item', 'Deskripsi Item', 'Harga Item', 'Jumlah Stok', 'ID Kategori', 'ImagePath'];
            $data['isi'] = $this->model_items->getList();
            break;
         
         case "transaksi":
            $data['fields'] = ['ID Cart', 'ID Item', 'Jumlah Barang'];
            $data['isi'] = $this->model_transaksi->getList();
            break;
         
         case "users":
            $data['fields'] = ['ID User', 'Nama User', 'Email User', 'Password', 'Session'];
            $data['isi'] = $this->model_users->getList();
            break;
         
         default:
            redirect(base_url("admin/home"));
      }
   }

   private function get_model($table_name){
      switch ($table_name) {
         case 'admin':      return $this->model_admin;
         case "carts":      return $this->model_carts;
         case "catagories": return $this->model_catagories;
         case "history":    return $this->model_history;
         case "items":      return $this->model_items;
         case "transaksi":  return $this->model_transaksi;
         case "users":      return $this->model_users;
         default:           redirect(base_url("admin/home"));
      }
   }

   public function _uploadPhoto()
   {
      $config['upload_path']   = './img/Decorlite/';
      $config['allowed_types'] = 'gif|jpg|png';
      $config['file_name']     = $this->input->post('data')[0];
      $config['overwrite']     = true;
      $config['max_size']      = 2048; // 2MB

      $this->load->library('upload', $config);
      
      if ( ! $this->upload->do_upload('photo'))
      {
         $error = array('error' => $this->upload->display_errors());

         print($error['error']);
      }

      if ($this->upload->do_upload('photo')) {
         return $this->upload->data("file_name");
      }
      
      return "no_image.png";
   }

}
