<?php
class deleteEquipment extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('deleteEquipment_model');
		$this->load->helper('url_helper');
		$this->load->library('session');
	}

	public function index(){
		if(isset($_SESSION['login_user'])&& $_SESSION['admin']){
			extract($_GET);
			$EquipmentID = $_GET['del'];
			$this->deleteEquipment_model->delete_equipment($EquipmentID); 
		} else {
			header("Location: ".  base_url('login'));
		}

	}
}