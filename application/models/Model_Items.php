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
        foreach ($query->result() as $row)
        {
            $hasil[]=$row;

        }

        return $hasil;
    }

    public function insert($itemId, $itemName, $itemDescription, $itemPrice, $itemStock, $catagoryId)
    {
        $this->itemId = $itemId;
        $this->itemName = $itemName;
        $this->itemDescription = $itemDescription;
        $this->itemPrice = $itemPrice;
        $this->itemStock = $itemStock;
        $this->catagoryId = $catagoryId;
        return $this->db->insert('items', $this);
     }

    public function update($itemId, $itemName, $itemDescription, $itemPrice, $itemStock, $catagoryId)
    {
        $sSQL= "update items set ";
        $sSQL.="itemName='".$itemName."', ";
        $sSQL.="itemDescription='".$itemDescription."', ";
        $sSQL.="itemPrice='".$itemPrice."', ";
        $sSQL.="itemStock='".$itemStock."', ";
        $sSQL.="catagoryId='".$catagoryId."', ";
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

