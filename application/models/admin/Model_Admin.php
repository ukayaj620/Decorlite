<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Model_Admin extends CI_Model {

    public function check_login($id, $pass)
    {
        $data= array(
            'adminId' => $id,
            'adminPassword' => md5(trim($pass))
        );
        return $this->db->get_where('admin', $data);
    }

    public function getField()
    {
        return $this->db->list_fields('admin');
    }

    public function getList()
    {
        $sSQL="select * from admin order by adminId";
        $query=$this->db->query($sSQL);

        if ($query->num_rows() <= 0) {
            return [];
        }

        foreach ($query->result() as $row)
        {
            $hasil[]=$row;
        }

        return $hasil;

    }

    public function getByID($adminId)
    {
        $sSQL="select * from admin where adminId='".$adminId."'";
        $query=$this->db->query($sSQL);

        if ($query->num_rows() <= 0) {
            return [];
        }

        foreach ($query->result() as $row)
        {
            $hasil[]=$row;

        }

        return $hasil;
    }

    public function insert($adminId, $adminName, $adminPassword)
    {
        $data=[
            'adminId' => $adminId,
            'adminName' => $adminName,
            'adminPassword' => md5(trim($adminPassword))
        ];
        return $this->db->insert('admin', $data);
     }

    public function update($adminId, $adminName, $adminPassword)
    {
        $sSQL= "update admin set ";
        $sSQL.="adminName='".$adminName."', ";
        $sSQL.="adminPassword='".md5(trim($adminPassword))."'";
        $sSQL.=" where adminId='".$adminId."'";

        $query=$this->db->query($sSQL);
        return $query;
    }

    public function delete($adminId)
    {
        $sSQL="delete from admin where adminId='".$adminId."'";
        $query=$this->db->query($sSQL);
        return $query;
    }
}

