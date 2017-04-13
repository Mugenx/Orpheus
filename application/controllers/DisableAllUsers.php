<?php  

class DisableAllUsers extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('DisableAllUsers_model');
        $this->load->helper('url_helper');
        $this->load->library('session');
    }

    public function index(){
        if(isset($_SESSION['login_user']) && $_SESSION['admin']){

            $data['title']='Disable All Users';
            extract($_POST);

            if(isset($_POST['acceptButton'])){
                $this->DisableAllUsers_model->disableusers();
            }
            
            $this->load->view('templates/header', $data);
            $this->load->view('DisableAllUsers/index');
            $this->load->view('templates/footer');
        } else {
            header("Location: ".  base_url('login'));
        }
    }
}
?>