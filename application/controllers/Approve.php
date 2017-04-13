<?php
class approve extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('approve_model');
		$this->load->helper('url_helper');
		$this->load->library('session');
	}

	public function index(){

		if(isset($_SESSION['login_user']) && $_SESSION['admin']){

			extract($_GET);
			$ReservationID = $_GET['id'];
			$EquipmentRecordID = $_GET['eqpID'];
			$StudentNumber = $_GET['snum'];
			$ReserveStart = $_GET['ldate'];
			$ReserveEnd = $_GET['ddate'];

			$this->approve_model->approveReservation($ReservationID, $EquipmentRecordID, $StudentNumber
				, $ReserveStart, $ReserveEnd); 

			$StudentNumber = $_SESSION['student_number'];

			$data['username'] = $_SESSION['login_user'];

			header("Location: ".  base_url('reservations'));
		} else {
			header("Location: ".  base_url('login'));
		}
	}
}