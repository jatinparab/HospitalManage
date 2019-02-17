<?php

class Ipd extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        // Load form helper library
     //   $this->load->helper('form');
        
        // Load form validation library
      //  $this->load->library('form_validation');
        
        // Load session library
        
        
        // Load database
        $this->load->model('ipd_management');
    }

        public function formSubmit()
        {
            $data = $this->input->post();
            //print_r($data);
            $date = $data['date_of_addmission'];
            $ipd_number = $data['ipd_number'];
           // $date = str_replace('/', '-', $var);
            //echo $date;
            $data['date_of_addmission'] = date('Y-m-d', strtotime($date));
            //print_r($data);
            if($this->ipd_management->ipdsubmit($data) == TRUE){
                // redirect('/ipd/deposit/'."$ipd_number");
                redirect('../ipd_details');
            }else{
                die($this->ipd_management->ipdsubmit($data));
            }
        }
        public function finalsubmitipd(){
            $data = $this->input->post();
            
            $ipd_number = $data['ipd_number'];
            $amount = -$data['total'];
            $date = $data['date'];
            unset($data['total']);

            if($this->ipd_management->pay_partial($ipd_number, $amount)){
               // print_r($data);
                //print_r($this->ipd_management->finalsubmitipd($data));
                if($this->ipd_management->finalsubmitipd($data)){
                    echo 'success';
                }else{
                    die($this->ipd_management->finalsubmitipd($data));
                }
            }
        }

        public function shift(){
            
            
            $data = $this->input->post();
            $meta['any'] = $data['any'];
            $meta['type'] = $data['type'];
            unset($data['any']);
            unset($data['type']);
            $ipd_number = $data['ipd_number'];
            $data['patient_data'] = $this->ipd_management->get_ipd_details_from_id($ipd_number);
            $ward_name = $data['patient_data']['ward'];
            date_default_timezone_set('Asia/Kolkata');
            if($meta['type'] == 'full'){
            if($data['patient_data']['date_of_addmission'] != date('Y-m-d')){
                echo 'test';
                echo date('Y-m-d');
                $this->ipd_management->add_daily($ipd_number,$ward_name);
            }
            if($this->ipd_management->shift($data) == TRUE){
               // echo date('Y-m-d');
                echo 'success';
            }else{
                die($this->ipd_management->shift($data));
            }
        }
        if($meta['type'] == 'any' && $meta['any'] == 'current'){
            
            $this->ipd_management->add_daily($ipd_number,$ward_name);
            $this->ipd_management->shift_current($data);
            echo 'success';
        }
        if($meta['type'] == 'any' && $meta['any'] == 'shifted'){
            if($this->ipd_management->shift($data) == TRUE){
            echo 'success';
            }
        }
        if($meta['type'] == 'half'){
            
            $x = $this->ipd_management->get_ipd_details_from_id($ipd_number);
            $ward = $data['ward'];
           echo $ward;
           echo $ward_name;
            $this->ipd_management->add_half_daily($ipd_number,$ward);
            $this->ipd_management->add_half_daily($ipd_number,$ward_name);
            if($this->ipd_management->shift_current($data) == TRUE){
                echo 'success';
            }
        }
    }

        public function partialsubmitipd(){
            $data = $this->input->post();
            $ipd_number = $data['ipd_number'];
            $amount = - $data['amount'];
            if($this->ipd_management->pay_partial($ipd_number, $amount)){
                echo 'success';
            }else{
                die($this->ipd_management->pay_partial($data));
            }
        }

        public function edit($id){
            $data['patient_data'] = $this->ipd_management->get_ipd_details_from_id($id);
            $this->load->view('templates/header', $data);
            $this->load->view('pages/ipd_add_form', $data);
            $this->load->view('templates/footer', $data);
        }
        public function ipdAdd(){
            $data = $this->input->post();
            print_r($data);
            $charges = array();
            foreach($data as $k => $v){
                if($v == 'on'){
                    array_push($charges,$k);
                }
            }
            foreach($charges as $charge){
                $data2['ipd_number'] = $data['ipd_number'];
                $data2['name'] = $charge;
                $data2['amount'] = $data[$charge.'_amount'];
                $data2['number'] = $data[$charge.'_number'];
                $data2['total'] = $data[$charge.'_total'];
                $data2['type'] = 4;
                if(!$this->ipd_management->insertcharge($data2)){
                    die($this->ipd_management->insertcharge($data2));
                }
            }
            redirect('/ipd_details');

        }
        public function ipdAddDepo(){
            $data = $this->input->post();
            //print_r($data);ß
            $data['name'] = 'Deposit Charge - '.date('d-m-Y');
            $data['number'] = 1;
            $data['total'] = -$data['amount'];
            $data['type'] = 5;
            if(!$this->ipd_management->insertcharge($data)){
                die($this->ipd_management->insertcharge($data));
            }
            redirect('/ipd_details');

        }

        // public function discountipd(){
        //     $data = $this->input->post();
        //     $data['name'] = 'Discount';
        //     $data['number'] = 1;
        //     $data['total'] = -$data['amount'];
        //     $data['type'] = 6;
        //     if(!$this->ipd_management->insertcharge($data)){
        //         die($this->ipd_management->insertcharge($data));
        //     }else{
        //         echo 'success';
        //     }
        // }

        public function discountipd(){
            $data = $this->input->post();
            $data['name'] = 'Discount';
            $data['number'] = 1;
            $data['total'] = $data['amount'];
            $data['type'] = 6;
            
                if($this->ipd_management->insertdiscount($data)){
                    echo 'success';
                }
            
        }


        public function visitingSubmit(){
            $data = $this->input->post();
            $data2 = $data;
            unset($data['doctor_name']);

            $data['name'] = 'Visiting Doctor';
            $data['type'] = 4;
            $data['number'] = $data['days'];
            unset($data['days']);
            $data['total'] = $data['amount'];
            
        //print_r($data2);
            if(!$this->ipd_management->insertvisiting($data2)){
                die($this->ipd_management->insertcharge($data2));
            }
            redirect('/ipd_details');

        }
        
        
        public function billing($ipd_number){
            $data['patient_data'] = $this->ipd_management->get_ipd_details_from_id($ipd_number);
            $ward_name = $data['patient_data']['ward'];
            $this->ipd_management->add_daily($ipd_number,$ward_name);
            $this->load->view('templates/header', $data);
            $this->load->view('pages/bill_ipd', $data);
            $this->load->view('templates/footer', $data);
        }
        public function deposit($ipd_number){
            $data['patient_data'] = $this->ipd_management->get_ipd_details_from_id($ipd_number);
           // $this->ipd_management->add_daily($ipd_number);
            $this->load->view('templates/header', $data);
            $this->load->view('pages/deposit_form', $data);
            $this->load->view('templates/footer', $data);
        }
}


?>