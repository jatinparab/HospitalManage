<?php 

Class Ipd_Management extends CI_Model{
    public function getlatestipdnumber(){
        $this->db->select("ipd_number");
        $x= $this->db->get('ipd_entries')->result_array();
        $ipd_numbers = array();
        foreach($x as $ipd_number){
            array_push($ipd_numbers,$ipd_number['ipd_number']);
        }
        do{
            $random = '';
    for ($i = 0; $i < 5; $i++) {
        $random .= rand(0, 1) ? rand(0, 9) : chr(rand(ord('A'), ord('Z')));
    }
        }while(in_array("SUK".$random,$ipd_numbers));
                
    return "SUK".$random;
        
    }

    public function shift($data){
        $this->db->where('ipd_number',$data['ipd_number']);
        $this->db->set('ward',$data['ward']); 
        if($this->db->update('ipd_entries')){
            return true;
        }else{
            return false;
        }
    }
    public function ipdsubmit($data) {
        if($this->db->insert('ipd_entries',$data)){
            return true;
        }else{
            return false;
        }
    }
    public function insertvisiting($data) {

        if($this->db->insert('visiting_charges',$data)){
            return true;
        }else{
            return false;
        }
    }


    public function getlatestipd(){
        $this->db->select_max('id');
        $result= $this->db->get('ipd_entries')->row_array();
        return $result['id']+1;
    }
    public function get_ipd_details(){
        return $this->db->get('ipd_entries')->result_array();
    }
    public function add_daily($ipd_number,$ward_name){
        $this->db->where('ipd_number',$ipd_number);
        $this->db->limit(1);
        $details = $this->db->get('ipd_entries')->result_array()[0];
        $this->db->select('*');
        $this->db->where('name','bed charges - '.$ward_name);
        $this->db->where('ipd_number',$ipd_number);
        if($this->db->get('ipd_charges')->row_array()){
            $hm = $details['date_of_addmission'];
             $now = time();
            $datediff = $now - strtotime($hm);
     //   return $now;
             $number = round($datediff / (60 * 60 * 24));
             $data['ipd_number']=$ipd_number;
             $data['name'] = 'bed charges - '.$ward_name;
             $data['amount'] = 200;
             $data['number'] = $number;
             $data['total'] = $data['amount']*$data['number'];
             $this->db->where('ipd_number',$ipd_number);
             $this->db->where('name','bed charges - '.$ward_name);
             if($this->db->update('ipd_charges',$data)){
                    $data['amount'] = 400;
                    $data['name'] = 'ward charges - '.$ward_name;
                 $data['total'] = $data['amount']*$data['number'];
                 $this->db->where('ipd_number',$ipd_number);
                 $this->db->where('name','ward charges - '.$ward_name);
                 if($this->db->update('ipd_charges',$data)){
                     return true;
                 }else{
                     return false;
                 }
             }else{
                 return false;
             }
        }else{

        $hm = $details['date_of_addmission'];
        $now = time();
        $datediff = $now - strtotime($hm);
     //   return $now;
        $number = round($datediff / (60 * 60 * 24));
        $data['ipd_number']=$ipd_number;
        $data['name'] = 'bed charges - '.$ward_name;
        $data['amount'] = 2000;
        $data['number'] = $number;
        $data['total'] = $data['amount']*$data['number'];
        if($this->db->insert('ipd_charges',$data)){
            $data['amount'] = 4000;
            $data['name'] = 'ward charges - '.$ward_name;
            $data['total'] = $data['amount']*$data['number'];
            if($this->db->insert('ipd_charges',$data)){
                return true;
            }else{
                return false;
            }
        }else{
            return $this->db->error();
        }
    }
    }

    public function pay_partial($ipd_number, $amount){
        $data['ipd_number'] = $ipd_number;
        $data['name'] = 'Amount Already Paid - '.date('d/m/Y');
        $data['amount'] = $amount;
        $data['number'] = 1;
        $data['total'] = $amount;
        
            $this->db->where('ipd_number',$ipd_number);
            
            if($this->db->insert('ipd_charges',$data)){
                return true;
            }else{
                return $this->db->error();
            }
        
        return false;
    }

    public function get_ipd_details_from_id($id){
        $this->db->where('ipd_number',$id);
        $this->db->limit(1);
        return $this->db->get('ipd_entries')->result_array()[0];
    }

    public function insertcharge($data){
        return $this->db->insert('ipd_charges',$data);
    }
    public function get_bill_entries($ipd_number){
        $this->db->where('ipd_number',$ipd_number);
        return $this->db->get('ipd_charges')->result_array();

    }

    public function get_visiting_entries($ipd_number){
        $this->db->where('ipd_number',$ipd_number);
        return $this->db->get('visiting_charges')->result_array();
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