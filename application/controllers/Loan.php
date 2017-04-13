<?php 

class Loan extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('loan_model');
                $this->load->helper(array('url_helper','form'));
                $this->load->library('session');
        }


        public function index()
        {

                if(isset($_SESSION['login_user'])){

                        $StudentNumber = $_SESSION['student_number'];

                        $data['equipmentPrograms'] = $this->loan_model->get_equipmentProgram();
                        $data['requests'] = $this->loan_model->get_requests($StudentNumber);
                        $data['title'] = 'Loan Equipments';
                        $data['username'] = $_SESSION['login_user'];

                        $this->load->view('templates/header', $data);
                        $this->load->view('loan/index', $data);
                        $this->load->view('templates/footer');

                } else {
                        header("Location: ".  base_url('login'));
                }

                
        }

        public function save()
        {
                $itemName = $this->input->post('itemName');
                $startDate = $this->input->post('startDate');
                $endDate = $this->input->post('endDate');
                $StudentNumber = $_SESSION['student_number'];
                if ($itemName != '' && $startDate !=''){
                        $this->loan_model->insert($itemName, $StudentNumber, $startDate, $endDate);  
                }
                header("Location: ".  base_url('loan'));
        }



        public function delete()
        {
                $id = $this->uri->segment(3);
                $name = $_POST['name'];
                echo "Are you sure you want to delete <strong>".$name."</strong> ?";
        }

        public function cdelete(){
                $id = $this->uri->segment(3);
                return $this->loan_model->delete($id);
        }

        public function edit()
        {
                $id = $this->uri->segment(3);
                $name = $_POST['name'];
                $item = $this->loan_model->get_request($id);
                $output = '';

                $output .= '<tr>';
                $output .= '<td><strong>Equipment Name</strong></td><td>'.$name.'</td>';
                $output .= '</tr>';

                $output .= '<tr>';
                $output .= '<td><strong>Strat Date</strong></td>';
                $output .= '<td><input id="startDate2" name="startDate2"  type="text" class="form-control STARTdatepicker2 startDate" value="'.$item[0]['ReserveStart'].'"></td>';
                $output .= '</tr>';

                $output .= '<tr>';
                $output .= '<td><strong>End Date</strong>';
                $output .= '<td><input id="endDate2" name="endDate2"  type="text" class="form-control ENDdatepicker2 endDate" style="background-color:white; border：0" value="'.$item[0]['ReserveEnd'].'" disabled></td>';
                $output .= '</tr>';

                $script = '<script src="'.asset_url().'js/datepick.js"></script>';

                $output.=$script;

                echo $output;


        }

        public function update()
        {
                $rid = $this->uri->segment(3);
                $startDate = $_POST['startDate'];
                $endDate = $_POST['endDate'];
                return $this->loan_model->update($rid, $startDate, $endDate);
        }


}








































