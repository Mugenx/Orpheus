<?php
class Equiplist extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('equiplist_model');
                $this->load->helper('url_helper');
                $this->load->library('session');
        }

        public function index()
        {
                if(isset($_SESSION['login_user']) && $_SESSION['admin'] ){
                        $data['equipments'] = $this->equiplist_model->get_equipments();
                        $data['title'] = 'Equipment List';

                        $this->load->view('templates/header', $data);
                        $this->load->view('equiplist/index', $data);
                        $this->load->view('templates/footer');
                } else {
                        header("Location: ".  base_url('login'));
                }
        }  
        
        public function delete(){
             extract($_GET);
             $EquipmentID = $_GET['del'];
             $this->equiplist_model->delete_equipment($EquipmentID); 
     }
}