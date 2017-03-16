<?php
	class Equipment{
		private $EquipmentRecordID;
		private $EquipmentTag;
		private $Name;
		private $SerialNumber;
		private $Category;
		private $Quantity;
		private $EquipmentProgram;
		private $LoanDuration;
		private $Status;
		private $AuthorizationRequired;
		private $EquipmentVisible;
		private $Cost;
		private $DateInService;
		private $Inventoried;
		private $InventoriedDate;
		private $invid;
		private $SSMA_TimeStamp;
		private $Year;
		private $EquipmentDeleted;
		private $Notes;
		private $ImagePath;
	
		function __construct($EquipmentRecordID, $EquipmentTag, $Name, $SerialNumber, $Category, $Quantity, $EquipmentProgram, $LoanDuration, $Status, $AuthorizationRequired, $Year, $Cost, $DateInService, $EquipmentVisible, $EquipmentDeleted, $Notes, $Inventoried, $InventoriedDate, $ImagePath){
			$this->setEquipmentRecordID($EquipmentRecordID);
			$this->setEquipmentTag($EquipmentTag);
			$this->setName($Name);
			$this->setSerialNumber($SerialNumber);
			$this->setCategory($Category);
			$this->setQuantity($Quantity);
			$this->setEquipmentProgram($EquipmentProgram);
			$this->setLoanDuration($LoanDuration);
			$this->setStatus($Status);
			$this->setAuthorizationRequired($AuthorizationRequired);
			$this->setYear($Year);
			$this->setCost($Cost);
			$this->setDateInService($DateInService);
			$this->setEquipmentVisible($EquipmentVisible);
			$this->setEquipmentDeleted($EquipmentDeleted);
			$this->setNotes($Notes);
			$this->setInventoried($Inventoried);
			$this->setInventoriedDate($InventoriedDate);
			$this->setImagePath($ImagePath);
		}
		
		public function getEquipmentRecordID(){
			return $this->EquipmentRecordID;
		}
		
		public function setEquipmentRecordID($EquipmentRecordID){
			$this->EquipmentRecordID = $EquipmentRecordID;
		}
		
		public function getEquipmentTag(){
			return $this->EquipmentTag;
		}
		
		public function setEquipmentTag($EquipmentTag){
			$this->EquipmentTag = $EquipmentTag;
		}
		
		public function getName(){
			return $this->Name;
		}
		
		public function setName($Name){
			$this->Name = $Name;
		}
		
		public function getSerialNumber(){
			return $this->SerialNumber;
		}
		
		public function setSerialNumber($SerialNumber){
			$this->SerialNumber = $SerialNumber;
		}
		
		public function getCategory(){
			return $this->Category;
		}
		
		public function setCategory($Category){
			$this->Category = $Category;
		}
		
		public function getQuantity(){
			return $this->Quantity;
		}
		
		public function setQuantity($Quantity){
			$this->Quantity = $Quantity;
		}
		
		public function getEquipmentProgram(){
			return $this->EquipmentProgram;
		}
		
		public function setEquipmentProgram($EquipmentProgram){
			$this->EquipmentProgram = $EquipmentProgram;
		}
		
		public function getYear(){
			return $this->Year;
		}
		
		public function setYear($Year){
			$this->Year = $Year;
		}
		
		public function getLoanDuration(){
			return $this->LoanDuration;
		}
		
		public function setLoanDuration($LoanDuration){
			$this->LoanDuration = $LoanDuration;
		}
		
		public function getStatus(){
			return $this->Status;
		}
		
		public function setStatus($Status){
			$this->Status = $Status;
		}
		
		public function getAuthorizationRequired(){
			return $this->AuthorizationRequired;
		}
		
		public function setAuthorizationRequired($AuthorizationRequired){
			$this->AuthorizationRequired = $AuthorizationRequired;
		}
		
		public function getCost(){
			return $this->Cost;
		}
		
		public function setCost($Cost){
			$this->Cost = $Cost;
		}
		
		public function getDateInService(){
			return $this->DateInService;
		}
		
		public function setDateInService($DateInService){
			$this->DateInService = $DateInService;
		}
		
		public function getEquipmentVisible(){
			return $this->EquipmentVisible;
		}
		
		public function setEquipmentVisible($EquipmentVisible){
			$this->EquipmentVisible = $EquipmentVisible;
		}
		
		public function getEquipmentDeleted(){
			return $this->EquipmentDeleted;
		}
		
		public function setEquipmentDeleted($EquipmentDeleted){
			$this->EquipmentDeleted = $EquipmentDeleted;
		}
		
		public function getNotes(){
			return $this->Notes;
		}
		
		public function setNotes($Notes){
			$this->Notes = $Notes;
		}
		
		public function getInventoried(){
			return $this->Inventoried;
		}
		
		public function setInventoried($Inventoried){
			$this->Inventoried = $Inventoried;
		}
		
		public function getInventoriedDate(){
			return $this->InventoriedDate;
		}
		
		public function setInventoriedDate($InventoriedDate){
			$this->InventoriedDate = $InventoriedDate;
		}
		
		public function getInvid(){
			return $this->invid;
		}
		
		public function setInvid($invid){
			$this->invid = $invid;
		}
		
		public function getSSMA_TimeStamp(){
			return $this->SSMA_TimeStamp;
		}
		
		public function setSSMA_TimeStamp($SSMA_TimeStamp){
			$this->SSMA_TimeStamp = $SSMA_TimeStamp;
		}
		
		public function getImagePath(){
			return $this->ImagePath;
		}
		
		public function setImagePath($ImagePath){
			$this->ImagePath = $ImagePath;
		}
	}
?>