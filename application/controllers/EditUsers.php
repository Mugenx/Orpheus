<?php  

class EditUsers extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('EditUsers_model');
        $this->load->helper('url_helper');
        $this->load->library('session');
    }

    public function index(){
        if(isset($_SESSION['login_user'])){
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


            $data['title'] = 'Edit Users';

            extract($_GET);
            extract($_POST);

            if(isset($_POST['submitButton'])){

                $params['userName']      = $_POST['userName'];
                $params['firstName']     = $_POST['firstName'];
                $params['lastName']      = $_POST['lastName'];
                $params['email']         = $_POST['email'];
                $params['program']       = $_POST['program'];
                $params['year']          = $_POST['year'];
                $params['notes']         = $_POST['notes'];

                if(isset($_POST['enabled'])){
                    $params['enabled'] = 1;
                }                   
                else{
                    $params['enabled'] = 0;
                }

                if(isset($_POST['loanAdmin'])){
                    $params['loanAdmin'] = 1;
                }
                else{
                    $params['loanAdmin'] = 0;
                }

                if(isset($_POST['approver'])){
                    $params['approver'] = 1;
                }
                else{
                    $params['approver'] = 0;
                }

                $success = $this->EditUsers_model->update_user($params, $studentNumber);

                if($success == TRUE)
                    $_SESSION['updateSuccess'] = TRUE;
                else
                    $_SESSION['updateSuccess'] = FALSE;              

                echo'<script>';
                echo'window.location.href="SearchUsers";';
                echo'</script>';
            }

            if(isset($_GET['StudentNumber'])){
                $studentNumber = $_GET['StudentNumber'];
                $data['userinfo'] = $this->EditUsers_model->get_userinfo($studentNumber);
            } 

            if(isset($_POST['resetPassword'])){
                $lastName = $this->EditUsers_model->get_lastname($studentNumber);
                $success  = $this->EditUsers_model->resetpassword($lastName, $studentNumber);

                if($success)
                    $_SESSION['resetPasswordSuccess'] = TRUE;
                else
                    $_SESSION['resetPasswordSuccess'] = FALSE;
            }

            $data['programinfo'] = $this->EditUsers_model->get_programinfo();

           $this->load->view('templates/header', $data);
            $this->load->view('EditUsers/index', $data);
           $this->load->view('templates/footer');
        } else {
            header("Location: ".  base_url('login'));
        }
    }

}
?>