<?php
class returnEquipment extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('returnEquipment_model');
		$this->load->helper('url_helper');
		$this->load->library('session');
	}

	public function index(){
		if(isset($_SESSION['login_user'])&& $_SESSION['admin']){
			extract($_GET);
			$loanedOutID = $_GET['id'];
			$equipmentRecordID = $_GET['eqpID'];
			$studentNumber = $_GET['snum'];
			$loanedDate = $_GET['ldate'];
			$dueDate = $_GET['ddate'];
			$this->returnEquipment_model->return_equipment($loanedOutID, $equipmentRecordID, $studentNumber, 
				$loanedDate, $dueDate); 
		} else {
			header("Location: ".  base_url('login'));
		}
	}
}