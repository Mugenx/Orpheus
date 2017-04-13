<?php  

class AddUsers extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('AddUsers_model');
        $this->load->helper('url_helper');
        $this->load->library('session');
    }

    public function index(){

        if(isset($_SESSION['login_user']) && $_SESSION['admin']){
            $studentNumber = NULL;
            $userName      = NULL;
            $firstName     = NULL;
            $lastName      = NULL;
            $email         = NULL;
            $program       = NULL;
            $enabled       = NULL;
            $loanAdmin     = NULL;
            $approver      = NULL;
            $year          = NULL;
            $notes         = NULL;

            
            $data['title'] = 'Add Users';

            extract($_POST);

            if(isset($_POST['submitButton'])){
                $params['studentNumber'] = $_POST['studentNum'];
                $params['userName']      = $_POST['userName'];
                $params['firstName']     = $_POST['firstName'];
                $params['lastName']      = $_POST['lastName'];
                $params['email']         = $_POST['email'];
                $params['program']       = $_POST['program'];
                $params['year']          = $_POST['year'];
                $params['notes']         = $_POST['notes'];
                
                if(isset($_POST['enabled'])){
                    //If checkbox has been checked
                    $params['enabled'] = 1;
                }                   
                else{
                    $params['enabled'] = 0;
                }

                if(isset($_POST['loanAdmin'])){
                    //If checkbox has been checked
                    $params['loanAdmin'] = 1;
                }
                else{
                    $params['loanAdmin'] = 0;
                }

                if(isset($_POST['approver'])){
                    //If checkbox has been checked
                    $params['approver'] = 1;
                }
                else{
                    $params['approver'] = 0;
                }

                $success = $data['studentinfo'] = $this->AddUsers_model->insert_user($params);

                if($success == TRUE)
                    $_SESSION['addUserSuccess'] = TRUE;
                else
                    $_SESSION['addUserSuccess'] = FALSE;
            }

            $data['programs'] = $this->AddUsers_model->get_programs();
            
            $this->load->view('templates/header', $data);
            $this->load->view('AddUsers/index', $data);
            $this->load->view('templates/footer');
        } else {
            header("Location: ".  base_url('login'));
        }
    }
}
?>