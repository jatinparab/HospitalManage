<?php

class Opd extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        // Load form helper library
     //   $this->load->helper('form');
        
        // Load form validation library
      //  $this->load->library('form_validation');
        
        // Load session library
        
        
        // Load database
        $this->load->model('opd_management');
    }

        public function formSubmit()
        {
            $data = $this->input->post();
            $data['date'] = date('Y-m-d');
            if($this->opd_management->opdsubmit($data) == TRUE){
                redirect('/opd_details');
            }else{
                die($this->opd_management->opdsubmit($data));
            }
        }

        public function discount(){
            $data = $this->input->post();
            $data['name'] = 'Discount';
            $data['number'] = 1;
            $data['total'] = $data['amount'];
//$data['type'] = 6;
            
                if($this->opd_management->insertdiscount($data)){
                    echo 'success';
                }
            
        }
        

        public function partialsubmitopd(){
            $data = $this->input->post();
            $receipt_number = $data['receipt_number'];
            $amount = - $data['amount'];
            if($this->opd_management->pay_partial($receipt_number, $amount)){
                echo 'success';
            }else{
                die($this->opd_management->pay_partial($data));
            }
        }

        public function finalsubmitopd(){
            $data = $this->input->post();
            $receipt_number = $data['receipt_number'];
            $amount = -$data['total'];
            $date = $data['date'];
            unset($data['total']);
            if($this->opd_management->pay_partial($receipt_number, $amount)){
                if($this->opd_management->finalsubmitopd($data)){
                    echo 'success';
                }else{
                    die($this->opd_management->finalsubmitopd($data));
                }
            }
        }
        public function edit($id){
            $data['patient_data'] = $this->opd_management->get_opd_details_from_id($id);
            $this->load->view('templates/header', $data);
            $this->load->view('pages/opd_add_form', $data);
            $this->load->view('templates/footer', $data);
        }
        public function opdAdd(){
            $data = $this->input->post();
            //print_r($data);
            $charges = array();
            foreach($data as $k => $v){
                if($v == 'on'){
                    array_push($charges,$k);
                }
            }
            foreach($charges as $charge){
                $data2['receipt_number'] = $data['receipt_number'];
                $data2['name'] = $charge;
                $data2['amount'] = $data[$charge.'_amount'];
                $data2['number'] = $data[$charge.'_number'];
                $data2['total'] = $data[$charge.'_total'];
                if(!$this->opd_management->insertcharge($data2)){
                    die($this->opd_management->insertcharge($data2));
                }
            }
            redirect('/opd_details');

        }
        public function billing($id){
            $data['patient_data'] = $this->opd_management->get_opd_details_from_id($id);
            $this->load->view('templates/header', $data);
            $this->load->view('pages/bill', $data);
            $this->load->view('templates/footer', $data);
        }
}


?>