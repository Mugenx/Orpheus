<?php  

class DisplayUserInfo extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('DisplayUserInfo_model');
        $this->load->helper('url_helper');
        $this->load->library('session');
    }

    public function index(){

        if(isset($_SESSION['login_user']) && $_SESSION['admin'] ){
            $data['title']= 'Display User Info';

            extract($_GET);

            $studentNumber = $_GET['StudentNumber'];
            
            $data['userinfo']    = $this->DisplayUserInfo_model->get_userinfo($studentNumber);
            $data['loaninfo']    = $this->DisplayUserInfo_model->get_loaninfo($studentNumber);
            $data['reserveinfo'] = $this->DisplayUserInfo_model->get_reserveinfo($studentNumber);
            
            $this->load->view('templates/header', $data);
            $this->load->view('DisplayUserInfo/index', $data);
            $this->load->view('templates/footer');

        } else {
            header("Location: ".  base_url('login'));
        }
    }
}
?>