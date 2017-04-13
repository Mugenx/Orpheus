<?php 

    class ProcessFile extends CI_Controller {

        public function __construct(){
            parent::__construct();
            $this->load->model('ProcessFile_model');
            $this->load->helper('url_helper');
            $this->load->library('session');
        }

        public function index(){
            
            if(isset($_SESSION['login_user']) && $_SESSION['admin']){

            $data['title'] = 'Process File'; 
            extract($_FILES);
            extract($_POST);

            if(isset($_FILES['file']) && isset($_POST['submitButton'])){
                //Read file
                $handle = fopen($_FILES['file']['tmp_name'], "r");

                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                    $userNotExist = $this->ProcessFile_model->checkIfUserExists($data[0]);

                    if($userNotExist){
                        //User does not exist so create user 
                        $this->ProcessFile_model->processFile($data, 1);
                    }
                    else{
                        //User exists so update existing user
                        $this->ProcessFile_model->processFile($data, 2);
                    }
                }

                $allUsers = $this->ProcessFile_model->check_userpasswords();

                foreach($allUsers as $row){
                    $this->ProcessFile_model->update_password($row['StudentNumber'], $row['LastName']);
                }
            }


            $this->load->view('templates/header', $data);
            $this->load->view('ProcessFile/index');
            $this->load->view('templates/footer');
            } else {
            header("Location: ".  base_url('login'));
        }
        }
    }
?>