<?php
class addEquip extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('addEquipment_model');
		$this->load->helper('url_helper');
		$this->load->library('session');
	}

	public function index()
	{
		if(isset($_SESSION['login_user']) && $_SESSION['admin']){
			$EquipmentTag   		= NULL;
			$Name    				= NULL;
			$SerialNumber   		= NULL;
			$Category   		    = NULL;
			$Quantity    			= NULL;
			$EquipmentProgram       = NULL;
			$LoanDuration			= NULL;
			$AuthorizationRequired  = NULL;
			$EquipmentVisible       = NULL;
			$Notes     				= NULL;
			$ImagePath       		= NULL;
			
			$data['title'] = 'Add Equipment';

			extract($_POST);
			
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
			
			if (isset($btnSubmit)){
				if(!empty($EquipmentTag) && !empty($Name) && !empty($SerialNumber) && !empty($Category) 
					&& !empty($Quantity) && !empty($EquipmentProgram) && !empty($LoanDuration)){
					$this->addEquipment_model->insert_equipment($params);
			}
		}
		
		$this->load->view('templates/header', $data);
		$this->load->view('addEquip/index', $data);
		$this->load->view('templates/footer');
	} else {
		header("Location: ".  base_url('login'));
	}
}
}