<?php
  Class opd extends CI_Model{
    public function fetch_records(){
      $this -> db ->select("patient_name,age,sex,diagnosis,remarks");
      $this -> db ->from("opd");
      $query = $this->db->get();
      return $query->result();
    }
  }
?>