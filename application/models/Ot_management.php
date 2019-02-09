<?php 

Class Ot_Management extends CI_Model{
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
    public function finalsubmitipd($data){
       // print_r($data);
        if($this->db->insert('ipd_done',$data)){
            date_default_timezone_set('Asia/Kolkata');
            $this->db->set('done',1);
            $this->db->set('date_of_discharge',date('Y-m-d'));
            $this->db->where('ipd_number',$data['ipd_number']);
            $x =$this->db->update('ipd_entries');
            if($x){
                return true;
            }else{
                return $this->db->error();
            }
        }else{
            return $this->db->error();
        }
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
        $this->db->order_by("id","DESC");
        $this->db->where('done',0);
        return $this->db->get('ipd_entries')->result_array();
    }
    public function get_ipd_paid(){
        $this->db->order_by("id","DESC");
        $this->db->where('done',1);
        return $this->db->get('ipd_entries')->result_array();
    }
    public function gettotal($ipd_number){
        $this->db->where('ipd_number',$ipd_number);
        return $this->db->get('ipd_done')->row_array();
    }
    public function add_daily($ipd_number,$ward_name){
        if($ward_name == 'General'){
            $data['type'] = 0;
        }else if($ward_name == 'ICU'){
            $data['type'] = 1;
        }else if($ward_name == 'SICU'){
            $data['type'] = 2;
        }else if($ward_name == 'Special'){
            $data['type'] = 3;
        }else{
            $data['type'] = 4;
        }

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
             if($number == 0 ) {
                 $number = 1;
             }
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
                 $data['total'] = $data['amount']*$number;
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
        
        if($number == 0 ) {
            $number = 1;
        }
        $data['ipd_number']=$ipd_number;
        $data['name'] = 'bed charges - '.$ward_name;
        $data['amount'] = 200;
        $data['number'] = $number;
        $data['total'] = $data['amount']*$data['number'];
        if($this->db->insert('ipd_charges',$data)){
            $data['amount'] = 400;
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

    public function insertdiscount($data){
        $array = array('ipd_number' => $data['ipd_number'], 'name' => 'Discount');
                $this->db->where($array);
                $x = $this->db->get('ipd_charges');
                if($x->num_rows()>0){
                   // return $x->result_array();
                    $this->db->where('ipd_number',$data['ipd_number']);
                    $this->db->where('name','Discount');
                    $row = $this->db->get('ipd_charges')->result_array()[0];
                    $data['total'] += $row['total'];
                    $this->db->where('ipd_number',$data['ipd_number']);
                    $this->db->where('name','Discount');
                    $y = $this->db->update('ipd_charges',$data);
                    return $y;
                }else{
                   return $this->db->insert('ipd_charges',$data);
                }
            }

    public function pay_partial($ipd_number, $amount){
        $data['ipd_number'] = $ipd_number;
        $data['name'] = 'Amount Already Paid - '.date('d/m/Y');
        $data['amount'] = $amount;
        $data['number'] = 1;
        $data['type'] = 6;
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
        $this->db->order_by('type',"ASC");
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