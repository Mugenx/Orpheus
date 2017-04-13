<?php  

class CurrentUser extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('CurrentUser_model');
        $this->load->helper('url_helper');
        $this->load->library('session');
    }

    public function index(){

        if(isset($_SESSION['login_user'])){
            $data['title'] = 'Current User';
            $studentNumber = $_SESSION['student_number'];;
            
            $data['userinfo']    = $this->CurrentUser_model->get_userinfo($studentNumber);
            $data['loaninfo']    = $this->CurrentUser_model->get_loaninfo($studentNumber);
            $data['reserveinfo'] = $this->CurrentUser_model->get_reserveinfo($studentNumber);
            
           $this->load->view('templates/header', $data);
            $this->load->view('CurrentUser/index', $data);
           $this->load->view('templates/footer');

        } else {
            header("Location: ".  base_url('login'));
        }
    }
}
?>