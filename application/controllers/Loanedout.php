<?php
class loanedout extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('loanedout_model');
                $this->load->helper('url_helper');
                $this->load->library('session');
        }

        public function index()
        {
                if(isset($_SESSION['login_user']) && $_SESSION['admin'] ){
                $data['history'] = $this->loanedout_model->get_history();
                $data['title'] = 'Loaned Out';

                $this->load->view('templates/header', $data);
                $this->load->view('loanedout/index', $data);
                $this->load->view('templates/footer');
                } else {
                        header("Location: ".  base_url('login'));
                }
        }


      
}