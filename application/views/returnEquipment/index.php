<?php
if( isset($_GET['id']) )
{
	$loanedOutID = $_GET['id'];
}
if( isset($_GET['eqpID']) )
{
	$equipmentRecordID = $_GET['eqpID'];
}
if( isset($_GET['snum']) )
{
	$studentNumber = $_GET['snum'];
}
if( isset($_GET['ldate']) )
{
	$loanedDate = $_GET['ldate'];
}
if( isset($_GET['ddate']) )
{
	$dueDate = $_GET['ddate'];
}
?>