<?php
class loanHistory extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('loanHistory_model');
                $this->load->helper('url_helper');
                $this->load->library('session');
        }

        public function index()
        {
                if(isset($_SESSION['login_user'])&& $_SESSION['admin']){
                        $data['history'] = $this->loanHistory_model->get_history();
                        $data['title'] = 'Loan History';

                        $this->load->view('templates/header', $data);
                        $this->load->view('loanHistory/index', $data);
                        $this->load->view('templates/footer');
                } else {
                        header("Location: ".  base_url('login'));
                }
        }

        
}