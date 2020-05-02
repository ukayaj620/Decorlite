<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Model_Transaksi extends CI_Model {

    public function getList()
    {
        $sSQL="select * from transaksi order by CartID";
        $query=$this->db->query($sSQL);
        foreach ($query->result() as $row)
        {
            $hasil[]=$row;
        }
        return $hasil;

    }

    public function getByID($CartID)
    {
        $sSQL="select * from transaksi where CartID='".$CartID."'";
        $query=$this->db->query($sSQL);
        foreach ($query->result() as $row)
        {
            $hasil[]=$row;

        }

        return $hasil;
    }

    public function insert($CartID, $ItemID, $JumalahBarang)
    {
        $this->CartID = $CartID;
        $this->ItemID = $ItemID;
        $this->JumalahBarang = $JumalahBarang;
        return $this->db->insert('transaksi', $this);
     }

    public function update($CartID, $ItemID, $JumalahBarang)
    {
        $sSQL= "update transaksi set ";
        $sSQL.="ItemID='".$ItemID."', ";
        $sSQL.="JumalahBarang='".$JumalahBarang."', ";
        $sSQL.=" where CartID='".$CartID."'";

        $query=$this->db->query($sSQL);
        return $query;
    }

}

