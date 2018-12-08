<?php 

Class Opd_Management extends CI_Model{
    public function opdsubmit($data) {
        if($this->db->insert('opd_entries',$data)){
            return true;
        }else{
            return false;
        }
    }
    public function getlatestopd(){
        $this->db->select_max('id');
        $result= $this->db->get('opd_entries')->row_array();
        return $result['id']+1;
    }
    public function get_opd_details(){
        return $this->db->get('opd_entries')->result_array();
    }

    public function get_opd_details_from_id($id){
        $this->db->where('id',$id);
        $this->db->limit(1);
        return $this->db->get('opd_entries')->result_array()[0];
    }
    public function insertcharge($data){
        return $this->db->insert('opd_charges',$data);
    }
    public function get_bill_entries($receipt_number){
        $this->db->where('receipt_number',$receipt_number);
        return $this->db->get('opd_charges')->result_array();

    }
    public function read_user_information($username) {

        $condition = "username =" . "'" . $username . "'";
        $this->db->select('*');
        $this->db->from('login');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        
        if ($query->num_rows() == 1) {
        return $query->result();
        } else {
        return false;
        }
    }
}

?>