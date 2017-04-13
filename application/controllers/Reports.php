<?php
class reports extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->helper('url_helper');
                $this->load->library('session');
        }

        public function index()
        {
                if(isset($_SESSION['login_user'])&& $_SESSION['admin']){
                        $data['title'] = 'Reports';

                        $this->load->view('templates/header', $data);
                        $this->load->view('reports/index', $data);
                        $this->load->view('templates/footer');
                } else {
                        header("Location: ".  base_url('login'));
                }
        }

        
}