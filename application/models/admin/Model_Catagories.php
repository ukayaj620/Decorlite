<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Model_Catagories extends CI_Model {

    public function getList()
    {
        $sSQL="select * from catagories order by catagoryId";
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

    public function getByID($catagoryId)
    {
        $sSQL="select * from catagories where catagoryId='".$catagoryId."'";
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

    public function insert($catagoryId, $catagoryName)
    {
        $data=[
            'catagoryId' => $catagoryId,
            'catagoryName' => $catagoryName
        ];
        return $this->db->insert('catagories', $data);
     }

    public function update($catagoryId, $catagoryName)
    {
        $sSQL= "update catagories set ";
        $sSQL.="catagoryName='".$catagoryName."'";
        $sSQL.=" where catagoryId='".$catagoryId."'";

        $query=$this->db->query($sSQL);
        return $query;
    }

    public function delete($catagoryId)
    {
        $sSQL="delete from catagories where catagoryId='".$catagoryId."'";
        $query=$this->db->query($sSQL);
        
        return $query;
    }
}

