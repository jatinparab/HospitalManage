<?php

class Pages extends CI_Controller {

        public function view($page = 'home')
        {//echo $page;
//           phpinfo();
    
            $data['title'] = ucfirst($page); // Capitalize the first letter
            $this->load->library('session');
            $this->load->model('opd_management');
            $this->load->model('ipd_management');
            $this->load->view('templates/header', $data);
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer', $data);
        }
        
}


?>
