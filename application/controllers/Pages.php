<?php

class Pages extends CI_Controller {

        public function view($page = 'home')
        {
            if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
            {
                    // Whoops, we don't have a page for that!
                    show_404();
            }
    
            $data['title'] = ucfirst($page); // Capitalize the first letter
            $this->load->library('session');
            $this->load->view('templates/header', $data);
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer', $data);
        }

        public function OPD(){
                $this->load->model('opd');
                $this->data['opd_records'] = $this->opd->fetch_records();
                $this->load->view('templates/header');
                $this->load->view('pages/opd',$this->data);
                $this->load->view('templates/footer');
        }
        public function bill(){
                $this->load->view('pages/bill');
        }
}


?>