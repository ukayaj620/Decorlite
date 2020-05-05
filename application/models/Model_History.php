<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Model_History extends CI_Model {

	public function historyChecker($where) {
		return $this->db->get_where('history', $where);
	}

	public function getCartHistoryList($cartId) {
		$sql = "SELECT h.CartID, i.itemId, i.itemName, i.itemDescription, i.itemPrice, i.itemStock, i.itemImage, t.JumalahBarang 
				FROM history h, items i, transaksi t
				WHERE h.CartID = t.CartID AND t.ItemID = i.itemId AND h.CartID='". $cartId ."'" .
			"GROUP BY i.itemId";
		$query = $this->db->query($sql);
		foreach($query->result() as $row) {
			$result []= $row;
		}

		return $result;
	}

    public function getList()
    {
        $sSQL="select * from history order by userId";
        $query=$this->db->query($sSQL);
        foreach ($query->result() as $row)
        {
            $hasil[]=$row;
        }
        return $hasil;

    }

    public function getByID($userId)
    {
        $sSQL="select * from history where userId='".$userId."'";
        $query=$this->db->query($sSQL);
        foreach ($query->result() as $row)
        {
            $hasil[]=$row;

        }

        return $hasil;
    }

    public function insert($paymentId, $userId, $userPayment, $timePayment, $CartID)
    {
    	$this->paymentId = $paymentId;
        $this->userId = $userId;
        $this->userPayment = $userPayment;
        $this->timePayment = $timePayment;
        $this->CartID = $CartID;
        return $this->db->insert('history', $this);
     }

    public function update($userId, $userPayment, $timePayment, $CartID)
    {
        $sSQL= "update history set ";
        $sSQL.="userPayment='".$userPayment."', ";
        $sSQL.="timePayment='".$timePayment."', ";
        $sSQL.="CartID='".$CartID."', ";
        $sSQL.=" where userId='".$userId."'";

        $query=$this->db->query($sSQL);
        return $query;
    }

    public function delete($userId)
    {
        $sSQL="delete from history where userId='".$userId."'";
        $query=$this->db->query($sSQL);
        return $query;
    }
}

