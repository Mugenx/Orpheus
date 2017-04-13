<?php  

class SearchUsers extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('SearchUsers_model');
        $this->load->helper('url_helper');
        $this->load->library('session');
    }

    public function index(){
        if(isset($_SESSION['login_user'])&& $_SESSION['admin']){

            $data['title'] = "Search User";

            $firstNameSearch = NULL;
            $lastNameSearch  = NULL;

            extract($_POST);

            //Search will use wildcards to find users based on what the admin typed into search
            if(isset($_POST['searchButton'])){
                //If user searched for specific names, change the variables to reflect the search
                $firstNameSearch = $_POST['firstName'];
                $lastNameSearch  = $_POST['lastName'];
            }
            else{
                //If no search has been conducted, these will be used to display all users in database
                $firstNameSearch = "";
                $lastNameSearch  = "";
            }

            $data['search'] = $this->SearchUsers_model->get_userinfo($firstNameSearch, $lastNameSearch);
            
            $this->load->view('templates/header', $data);
            $this->load->view('SearchUsers/index', $data);
            $this->load->view('templates/footer');
        } else {
            header("Location: ".  base_url('login'));
        }
    }
}
?>