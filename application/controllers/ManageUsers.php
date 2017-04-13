<?php  

class ManageUsers extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->library('session');
    }

    public function index(){
        if(isset($_SESSION['login_user'])&& $_SESSION['admin']){
            $data['title'] = 'Manage Users';
            $this->load->view('templates/header', $data);
            $this->load->view('ManageUsers/index');
            $this->load->view('templates/footer');
        } else {
            header("Location: ".  base_url('login'));
        }
        

    }
}
?>