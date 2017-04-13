<?php
class returns extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('returns_model');
        $this->load->helper('url_helper');
        $this->load->library('session');
    }

    public function index()
    {
        if(isset($_SESSION['login_user'])&& $_SESSION['admin']){
            $data['title'] = 'Return Equipment';
            $data['loanedout'] = $this->returns_model->get_loanedout();
            $data['controller'] = $this;

            $this->load->view('templates/header', $data);
            $this->load->view('returns/index', $data);
            $this->load->view('templates/footer');
        } else {
            header("Location: ".  base_url('login'));
        }
    }   


}