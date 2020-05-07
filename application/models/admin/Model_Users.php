<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Model_Users extends CI_Model {

    public function getList()
    {
        $sSQL="select * from users order by userId";
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

    public function getByID($userId)
    {
        $sSQL="select * from users where userId='".$userId."'";
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

    public function insert($userId, $userName, $userEmail, $userPassword, $session)
    {
        $data=[
            'userId' => $userId,
            'userName' => $userName,
            'userEmail' => $userEmail,
            'userPassword' => $userPassword,
            'session' => $session
        ];
        return $this->db->insert('users', $data);
     }

    public function update($userId, $userName, $userEmail, $userPassword, $session)
    {
        $sSQL= "update users set ";
        $sSQL.="userName='".$userName."', ";
        $sSQL.="userEmail='".$userEmail."', ";
        $sSQL.="userPassword='".$userPassword."', ";
        $sSQL.="session='".$session."'";
        $sSQL.=" where userId='".$userId."'";

        $query=$this->db->query($sSQL);
        return $query;
    }

    public function delete($userId)
    {
        $sSQL="delete from users where userId='".$userId."'";
        $query=$this->db->query($sSQL);
        return $query;
    }
}

