<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Model_Carts extends CI_Model {

	public function cartChecker($where) {
		return $this->db->get_where('carts', $where);
	}

	public function getCartList($cartId) {
		$sql = "SELECT c.CartId, i.itemId, i.itemName, i.itemDescription, i.itemPrice, i.itemStock, i.itemImage, t.JumalahBarang 
				FROM carts c, items i, transaksi t
				WHERE c.CartId = t.CartID AND t.ItemID = i.itemId AND c.CartId='". $cartId ."'" .
				"GROUP BY i.itemId";
		$query = $this->db->query($sql);
		$result = array();
		foreach($query->result() as $row) {
			$result []= $row;
		}

		return $result;
	}

    public function getList()
    {
        $sSQL="select * from carts order by CartId";
        $query=$this->db->query($sSQL);
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
        foreach ($query->result() as $row)
        {
            $hasil[]=$row;

        }

        return $hasil;
    }

    public function insert($CartId, $userId)
    {
        $this->CartId = $CartId;
        $this->userId = $userId;
        return $this->db->insert('carts', $this);
     }

    public function update($CartId, $userId)
    {
        $sSQL= "update carts set ";
        $sSQL.="userId='".$userId."', ";
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

