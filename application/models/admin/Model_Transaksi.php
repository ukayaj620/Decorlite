<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Model_Transaksi extends CI_Model {

    public function getList()
    {
        $sSQL="select * from transaksi order by CartID";
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

    public function getByID($CartID)
    {
        $sSQL="select * from transaksi where CartID='".$CartID."'";
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

    public function insert($CartID, $ItemID, $JumalahBarang)
    {
        $data=[
            'CartID' => $CartID,
            'ItemID' => $ItemID,
            'JumalahBarang' => $JumalahBarang
        ];
        return $this->db->insert('transaksi', $data);
     }

    public function update($CartID, $ItemID, $JumalahBarang)
    {
        $sSQL= "update transaksi set ";
        $sSQL.="ItemID='".$ItemID."', ";
        $sSQL.="JumalahBarang='".$JumalahBarang."'";
        $sSQL.=" where CartID='".$CartID."'";

        $query=$this->db->query($sSQL);
        return $query;
    }
    
    public function delete($CartID)
    {
        $sSQL="delete from transaksi where CartID='".$CartID."'";
        $query=$this->db->query($sSQL);

        return $query;
    }
}

