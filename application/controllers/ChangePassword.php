<?php 

class ChangePassword extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('ChangePassword_model');
        $this->load->helper('url_helper');
        $this->load->library('session');
    }

    public function index(){
        if(isset($_SESSION['login_user'])){

            $data['title'] = 'Change Password';

            $studentNumber = $_SESSION['student_number'];

            extract($_POST);

            if(isset($_POST['submit'])){
                $currentPassword = $_POST['currentPassword'];
                $newPassword     = $_POST['newPassword'];
                $hash            = $this->ChangePassword_model->get_password($studentNumber);

                if(password_verify($currentPassword, $hash)){
                    $success = $this->ChangePassword_model->update_password($newPassword, $studentNumber);

                    if($success)
                        $_SESSION['passwordChangeSuccess'] = TRUE;
                    else
                        $_SESSION['passwordChangeSuccess'] = FALSE; 
                }
            }

            $this->load->view('templates/header', $data);
            $this->load->view('ChangePassword/index', $data);
            $this->load->view('templates/footer');
        } else {
            header("Location: ".  base_url('login'));
        }
    }
}
?>