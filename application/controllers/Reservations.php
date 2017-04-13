<?php
class reservations extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('reservations_model');
        $this->load->helper('url_helper');
        $this->load->library('session');
    }
    
    public function index(){
       
       if(isset($_SESSION['login_user'])&& $_SESSION['admin']){


        $StudentNumber = $_SESSION['student_number'];

        $data['reservations'] = $this->reservations_model->get_reservations();
        $data['title'] = 'Reservations';
        $data['username'] = $_SESSION['login_user'];

        $this->load->view('templates/header', $data);
        $this->load->view('reservations/index', $data);
        $this->load->view('templates/footer');

    } else {
        header("Location: ".  base_url('login'));
    }
}
}