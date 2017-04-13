<?php
class deny extends CI_Controller {

        public function __construct()
        {
            parent::__construct();
            $this->load->model('deny_model');
            $this->load->helper('url_helper');
            $this->load->library('session');
        }
		
		public function index(){
			
			 if(isset($_SESSION['login_user'])){
						extract($_GET);
						$ReservationID = $_GET['id'];
						$DeniedReason = $_GET['reason'];
						

						$this->deny_model->denyReservation($ReservationID, $DeniedReason); 
			  
                        $StudentNumber = $_SESSION['student_number'];

                        $data['username'] = $_SESSION['login_user'];

                        $this->load->view('templates/header', $data);
                        $this->load->view('deny/index', $data);
                        $this->load->view('templates/footer');
		 } else {
                        header("Location: ".  base_url('login'));
                }
		}
		
}