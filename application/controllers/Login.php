<?php
class Login extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->helper('url_helper');
        $this->load->library('session');
    }

    public function index()
    {

      $this->load->view('login/index');        
  }


  public function to_login(){
    $LoginUserName = $_POST['username'];
    $LoginPassword = $_POST['password'];
    $result = $this->login_model->get_users($LoginUserName);

    if($result == null)
    {
        $_SESSION['error'] = 'invalid login';
        header("Location: ".  base_url('login')); 

    } else {
        $password = $result[0]['Password'];

        if (password_verify($LoginPassword, $password)  && $result[0]['Enabled']) {
                        # code...
            $_SESSION['error'] = null;
            $_SESSION['login_user'] = $result[0]['FirstName'].' '. $result[0]['LastName'];
            $_SESSION['admin'] = $result[0]['LoanAdmin'];
            $_SESSION['approver'] = $result[0]['Approver'];
            $_SESSION['student_number'] = $result[0]['StudentNumber'];

            
                header("Location: ".  base_url('CurrentUser'));
            
            

        } else {
            $_SESSION['error'] = 'Invalid login';
            header("Location: ".  base_url('login'));
        }
    }
}

}