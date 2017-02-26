<?php
class Equipment{
	private $EuipmentRecordID;
	private $EquipmentTag;
	private $Name;
	private $ShortName;
	private $SerialNo;
	private $AlgCode;
	private $Category;
	private $Quantity;
	private $EquipmentProgram;
	private $LoanDuration;
	private $Status;
	private $AuthorizationReq;
	private $EquipmentVisible;
	private $Cost;
	private $DateInService;
	private $ImageName;
	private $HideWhen;
	private $Inventoried;
	private $InventoriedDate;
	private $Invid;
	private $SSMA_TimeStamp;



	function __construct(
		$EuipmentRecordID,
		$EquipmentTag, 
		$Name,
		$ShortName,
		$SerialNo,
		$AlgCode,
		$Category,
		$Quantity,
		$EquipmentProgram,
		$LoanDuration,
		$Status,
		$AuthorizationReq,
		$EquipmentVisible,
		$Cost,
		$DateInService,
		$ImageName,
		$HideWhen,
		$Inventoried,
		$InventoriedDate,
		$Invid,
		$SSMA_TimeStamp)
	{
		$this->setEuipmentRecordID($EuipmentRecordID);
		$this->setEquipmentTag($EquipmentTag);
		$this->setName($Name);
		$this->setShortName($ShortName);
		$this->setSerialNo($SerialNo);
		$this->setAlgCode($AlgCode);
		$this->setCategory($Category);
		$this->setQuantity($Quantity);
		$this->setEquipmentProgram($EquipmentProgram);
		$this->setLoanDuration($LoanDuration);
		$this->setStatus($Status);
		$this->setAuthorizationReq($AuthorizationReq);
		$this->setEquipmentVisible($EquipmentVisible);
		$this->setCost($Cost);
		$this->setDateInService($DateInService);
		$this->setImageName($ImageName);
		$this->setHideWhen($HideWhen);
		$this->setInventoried($Inventoried);
		$this->setInventoriedDate($InventoriedDate);
		$this->setInvid($Invid);
		$this->setSSMA_TimeStamp($SSMA_TimeStamp);
	}


	public function getEuipmentRecordID(){
		return $this->EuipmentRecordID;
	}

	public function setEuipmentRecordID($EuipmentRecordID){
		$this->EuipmentRecordID = $EuipmentRecordID;
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

	public function getShortName(){
		return $this->ShortName;
	}

	public function setShortName($ShortName){
		$this->ShortName = $ShortName;
	}

	public function getSerialNo(){
		return $this->SerialNo;
	}

	public function setSerialNo($SerialNo){
		$this->SerialNo = $SerialNo;
	}

	public function getAlgCode(){
		return $this->AlgCode;
	}

	public function setAlgCode($AlgCode){
		$this->AlgCode = $AlgCode;
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

	public function getAuthorizationReq(){
		return $this->AuthorizationReq;
	}

	public function setAuthorizationReq($AuthorizationReq){
		$this->AuthorizationReq = $AuthorizationReq;
	}

	public function getEquipmentVisible(){
		return $this->EquipmentVisible;
	}

	public function setEquipmentVisible($EquipmentVisible){
		$this->EquipmentVisible = $EquipmentVisible;
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

	public function getImageName(){
		return $this->ImageName;
	}

	public function setImageName($ImageName){
		$this->ImageName = $ImageName;
	}

	public function getHideWhen(){
		return $this->HideWhen;
	}

	public function setHideWhen($HideWhen){
		$this->HideWhen = $HideWhen;
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
		return $this->Invid;
	}

	public function setInvid($Invid){
		$this->Invid = $Invid;
	}

	public function getSSMA_TimeStamp(){
		return $this->SSMA_TimeStamp;
	}

	public function setSSMA_TimeStamp($s){
		$this->SSMA_TimeStamp = $SSMA_TimeStamp;
	}

	
	// public function getChange(){
	// 		return $this->Change;
	// 	}

	// 	public function setChange($Change){
	// 		$this->Change = $Change;
	// 	}

}
?>

