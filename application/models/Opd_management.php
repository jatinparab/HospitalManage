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
        $this->db->order_by("id","DESC");
        $this->db->where('done',0);
        return $this->db->get('opd_entries')->result_array();
    }
    public function get_opd_paid(){
        $this->db->order_by("id","DESC");
        $this->db->where('done',1);
        return $this->db->get('opd_entries')->result_array();
    }
    public function gettotal($receipt_number){
        $this->db->where('receipt_number',$receipt_number);
        return $this->db->get('opd_done')->row_array();
    }

    public function pay_partial($ipd_number, $amount){
        $data['receipt_number'] = $ipd_number;
        $data['name'] = 'Amount Already Paid - '.date('d/m/Y');
        $data['amount'] = $amount;
        $data['number'] = 1;
        $data['total'] = $amount;
        
            $this->db->where('receipt_number',$ipd_number);
            
            if($this->db->insert('opd_charges',$data)){
                return true;
            }else{
                return $this->db->error();
            }
        
        return false;
    }

    public function finalsubmitopd($data){
        if($this->db->insert('opd_done',$data)){
            
            $this->db->set('done',1);
            $this->db->where('receipt_number',$data['receipt_number']);
            $x =$this->db->update('opd_entries');
            if($x){
                return true;
            }else{
                return $this->db->error();
            }
        }else{
            return $this->db->error();
        }
    }

    public function get_opd_details_from_id($id){
        $this->db->where('id',$id);
        $this->db->limit(1);
        return $this->db->get('opd_entries')->result_array()[0];
    }
    public function insertcharge($data){
        return $this->db->insert('opd_charges',$data);
    }

    public function insertdiscount($data){
$array = array('receipt_number' => $data['receipt_number'], 'name' => 'Discount');
        $this->db->where($array);
        $x = $this->db->get('opd_charges');
        if($x->num_rows()>0){
           // return $x->result_array();
            $this->db->where('receipt_number',$data['receipt_number']);
            $this->db->where('name','Discount');
            $row = $this->db->get('opd_charges')->result_array()[0];
            $data['total'] += $row['total'];
            $this->db->where('receipt_number',$data['receipt_number']);
            $this->db->where('name','Discount');
            $y = $this->db->update('opd_charges',$data);
            return $y;
        }else{
           return $this->db->insert('opd_charges',$data);
        }
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