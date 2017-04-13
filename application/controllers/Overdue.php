<?php
class overdue extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('overdue_model');
                $this->load->helper('url_helper');
                $this->load->library('session');
        }

        public function index()
        {
                if(isset($_SESSION['login_user'])&& $_SESSION['admin']){
                        $data['history'] = $this->overdue_model->get_history();
                        $data['title'] = 'Overdue';

                        $this->load->view('templates/header', $data);
                        $this->load->view('overdue/index', $data);
                        $this->load->view('templates/footer');
                } else {
                        header("Location: ".  base_url('login'));
                }
        }

        
}