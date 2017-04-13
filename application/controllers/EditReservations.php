<?php  

class EditReservations extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('EditReservations_model');
        $this->load->helper('url_helper');
        $this->load->library('session');
    }

    public function index(){
        if(isset($_SESSION['login_user'])){
            $data['title'] = 'Edit Reservation';
            
            extract($_GET);
            extract($_POST);

                $reservationID = $_GET['ReservationID'];

            $data['reservationinfo'] = $this->EditReservations_model->get_reservationinfo($reservationID);

            if(isset ($_POST['submitButton'])){
                $tempDate = $_POST['reservationDate'];
                $tempDate = (string) $tempDate;
                //Split tempDate into separate strings for month, day, year
                $month    = substr($tempDate, 0, 2);
                $day      = substr($tempDate, 3, 2);
                $year     = substr($tempDate, 6, 8);

                //Create a date string that has proper format to be accepted by database
                $newDate  = $year . "-" . $month . "-" . $day;

                $equipmentRecordID = $this->EditReservations_model->get_equipmentRecordID($reservationID);
                $notReserved       = $this->EditReservations_model->check_reservations($equipmentRecordID, $newDate);
                
                //This equipment is not reserved by anyone else for selected date
                if($notReserved){

                    $newApproved     = 0;
                    $newDenied       = 0;
                    $newDeniedReason = "";

                    if(date('w', strtotime($newDate)) == 5) {
                        //If reserve start is a friday, make the reservation end date the following monday
                        $newReserveEnd = date('Y-m-d', strtotime($newDate .' +3 days')); 
                    } 
                    else{
                        //If reserve start is not a friday, make the reservation end date the next day
                        $newReserveEnd = date('Y-m-d', strtotime($newDate .' +1 day')); 
                    } 
                    
                    //Prevent user from submitting a blank date
                    if($tempDate != ""){
                        $success = $this->EditReservations_model->update_reservation($newDate, $newReserveEnd, $newApproved, $newDenied, $newDeniedReason, $reservationID);

                        //Success will be true or false
                        $_SESSION['updateReservationSuccess'] = $success;
                    }
                }
                else{
                    //The equipment was already reserved for that date, so success is false
                    $_SESSION['updateReservationSuccess'] = FALSE;
                }
            }     
             
            $this->load->view('templates/header', $data);
            $this->load->view('EditReservations/index', $data);
            $this->load->view('templates/footer');
        } else {
            header("Location: ".  base_url('login'));
        }
    }
}
?>