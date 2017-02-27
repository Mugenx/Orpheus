<?php
/**
*
*/
class User
{

  private $userID;
  private $userName;
  private $studentNo;
  private $firstName;
  private $lastName;
  private $email;
  private $program;
  private $year;
  private $notes;


  function __construct(
    $userID,
    $userName,
    $studenNo,
    $firstName,
    $lastName,
    $email,
    $program,
    $year,
    $notes)
    {
      $this->setuserID($userID);
      $this->setuserName($userName);
      $this->setstudentNo($studentNo);
      $this->setfirstName($firstName);
      $this->setlastName($lastName);
      $this->setemail($email);
      $this->setprogram($program);
      $this->setyear($year);
      $this->setnotes($year);
    }

    public function getuserID(){
      return $this->userID;
    }

    public function setuserID($userID){
      $this->userID = $userID;
    }


    public function getuserName(){
      return $this->userName;
    }

    public function setuserName($userName){
      $this->userName = $userName;
    }


    public function getstudentNo(){
      return $this->studentNo;
    }

    public function setstudentNo($studentNo){
      $this->studentNo = $studentNo;
    }


    public function getfirstName(){
      return $this->firstName;
    }

    public function setfirstName($firstName){
      $this->firstName = $firstName;
    }


    public function getlastName(){
      return $this->lastName;
    }

    public function setlastName($lastName){
      $this->lastName = $lastName;
    }

    public function getemail(){
      return $this->email;
    }

    public function setemail($email){
      $this->email = $email;
    }

    public function getprogram(){
      return $this->program;
    }

    public function setprogram($program){
      $this->program = $program;
    }


    public function getyear(){
      return $this->year;
    }

    public function setyear($year){
      $this->year = $year;
    }

    public function getnotes(){
      return $this->notes;
    }

    public function setnotes($notes){
      $this->notes = $notes;
    }
  }

  ?>
