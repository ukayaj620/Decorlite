<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Model_Items extends CI_Model {

    public function getList()
    {
        $sSQL="select * from items order by itemId";
        $query=$this->db->query($sSQL);
        foreach ($query->result() as $row)
        {
            $hasil[]=$row;
        }
        return $hasil;

    }

    public function getByID($itemId)
    {
        $sSQL="select * from items where itemId='".$itemId."'";
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

    public function insert($itemId, $itemName, $itemDescription, $itemPrice, $itemStock, $catagoryId, $itemImage)
    {
        $data=[
            'itemId' => $itemId,
            'itemName' => $itemName,
            'itemDescription' => $itemDescription,
            'itemPrice' => $itemPrice,
            'itemStock' => $itemStock,
            'catagoryId' => $catagoryId,
            'itemImage' => $itemImage
        ];
        return $this->db->insert('items', $data);
     }

    public function update($itemId, $itemName, $itemDescription, $itemPrice, $itemStock, $catagoryId, $itemImage)
    {
        $sSQL= "update items set ";
        $sSQL.="itemName='".$itemName."', ";
        $sSQL.="itemDescription='".$itemDescription."', ";
        $sSQL.="itemPrice='".$itemPrice."', ";
        $sSQL.="itemStock='".$itemStock."', ";
        $sSQL.="catagoryId='".$catagoryId."', ";
        $sSQL.="itemImage='".$itemImage."'";
        $sSQL.=" where itemId='".$itemId."'";

        $query=$this->db->query($sSQL);
        return $query;
    }

    public function delete($itemId)
    {
        $sSQL="delete from items where itemId='".$itemId."'";
        $query=$this->db->query($sSQL);
        return $query;
    }
}

