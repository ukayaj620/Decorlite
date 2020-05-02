<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Model_History extends CI_Model {

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

    public function insert($userId, $userPayment, $timePayment, $CartID)
    {
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

}

