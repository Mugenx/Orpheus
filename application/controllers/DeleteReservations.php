<?php  
    
    class DeleteReservations extends CI_Controller {

        public function __construct(){
            parent::__construct();
            $this->load->model('DeleteReservations_model');
            $this->load->helper('url_helper');
        }

        public function index(){
            
            $data['title'] = 'Delete Reservations';

            extract($_GET);

            $reservationID = $_GET['ReservationID'];

            $this->DeleteReservations_model->delete_equipment($reservationID);
            
           // $this->load->view('templates/header', $data);
            $this->load->view('DeleteReservations/index');
           // $this->load->view('templates/footer');
        }
    }
?>