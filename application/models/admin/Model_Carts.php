<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Model_Carts extends CI_Model {

    public function getList()
    {
        $sSQL="select * from carts order by CartId";
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

    public function getByID($CartId)
    {
        $sSQL="select * from carts where CartId='".$CartId."'";
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

    public function insert($CartId, $userId)
    {
        $data=[
            'CartId' => $CartId,
            'userId' => $userId
        ];
        return $this->db->insert('carts', $data);
     }

    public function update($CartId, $userId)
    {
        $sSQL= "update carts set ";
        $sSQL.="userId='".$userId."'";
        $sSQL.=" where CartId='".$CartId."'";

        $query=$this->db->query($sSQL);
        return $query;
    }

    public function delete($CartId)
    {
        $sSQL="delete from carts where CartId='".$CartId."'";
        $query=$this->db->query($sSQL);
        
        return $query;
    }
}

