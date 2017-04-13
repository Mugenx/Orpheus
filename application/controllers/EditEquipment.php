<?php
class editEquipment extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('editEquipment_model');
		$this->load->helper('url_helper');
		$this->load->library('session');
	}

	public function index()
	{
		if(isset($_SESSION['login_user']) && $_SESSION['admin'] ){
			$EquipmentID 		    = $_GET['equipmentID'];
			$data['equipment'] = $this->editEquipment_model->get_equipmentByID($EquipmentID);
			$data['title'] = 'Edit Equipment';
			
			$this->load->view('templates/header', $data);
			$this->load->view('editEquipment/index', $data);
			$this->load->view('templates/footer');
		} else {
			header("Location: ".  base_url('login'));
		}
	}	

	public function update()
	{
		$EquipmentID 		    = $this->uri->segment(3);
		$EquipmentTag   	    = $_POST['EquipmentTag'];
		$Name    				= $_POST['Name'];
		$SerialNumber   	    = $_POST['SerialNumber'];
		$Category   		    = $_POST['Category'];
		$Quantity    			= $_POST['Quantity'];
		$EquipmentProgram       = $_POST['EquipmentProgram'];
		$LoanDuration			= $_POST['LoanDuration'];
		$Notes     				= $_POST['Notes'];
		$ImagePath       		= $_POST['ImagePath'];

		if(isset($_POST['AuthorizationRequired'])){
			$AuthorizationRequired = 1;
		}					
		else{
			$AuthorizationRequired = 0;
		}

		if(isset($_POST['EquipmentVisible'])){
			$EquipmentVisible = 1;
		}
		else{
			$EquipmentVisible = 0;
		}

		$params[] = array();
		$params['EquipmentTag'] = $EquipmentTag;
		$params['Name'] = $Name;
		$params['SerialNumber'] = $SerialNumber;
		$params['Category'] = $Category;
		$params['Quantity'] = $Quantity;
		$params['EquipmentProgram'] = $EquipmentProgram;
		$params['LoanDuration'] = $LoanDuration;
		$params['AuthorizationRequired'] = $AuthorizationRequired;
		$params['EquipmentVisible'] = $EquipmentVisible;
		$params['Notes'] = $Notes;
		$params['ImagePath'] = $ImagePath;


		// if(!empty($EquipmentTag) && !empty($Name) && !empty($SerialNumber) && !empty($Category) 
		// 	&& !empty($Quantity) && !empty($EquipmentProgram) && !empty($LoanDuration))
		// {
		$this->editEquipment_model->update_equipment($params, $EquipmentID); 
		// }

		header("Location: ".  base_url('equiplist'));	
	}



}