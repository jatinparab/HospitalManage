<?php

class Pages extends CI_Controller {

        public function view($page = 'login')
        {//echo $page;
                $this->load->library('session');
            $this->load->model('opd_management');
            $this->load->model('ipd_management');
            $this->load->model('ot_management');
             if($page=='visittable' || $page == 'opdtable' || $page == 'ipdtable' || $page =='ottablereport'){

                $this->load->view('pages/'.$page);
             }else{
//           phpinfo();
    
            $data['title'] = ucfirst($page); // Capitalize the first letter
            
            $this->load->view('templates/header', $data);
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer', $data);
                }
        }
        
}


?>
