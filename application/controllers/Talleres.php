<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Talleres extends CI_Controller {
	private $page;
    public function __construct() {
        parent::__construct();

    }
    public function index(){ 
    	$this->page = 'Talleres';
    	$data['page'] = $this->page;
    	$this->load->model('talleres_model');
    	$this->load->model('location_model');
    	$data['estados'] = $this->location_model->get_all_estados();
        //$data['estados'] = $this->location_model->get_ciudades();
    	$this->load->view('talleres_view',$data);
    }

    public function get_ciudades(){
        $this->load->model('location_model');
        $estado = $this->input->post('estado');
        //$data['ciudades'] = $this->location_model->get_ciudades_by_estado($estado);
        //$ciudades = $this->location_model->get_ciudades_by_estado($estado);
        $result = '<option>-adsadass</option>';
        /*foreach ($ciudades as $ciudad){
            $result .= '<option value="' . $ciudad['CODCIUDAD'] . '" >' . $ciudad['DESCCIUDAD'] . '</option>';
        }*/
        //echo json_encode("asdas");
        echo $result;
    }
    public function get_ciudades_json(){
        $this->load->model('location_model');
        $estado = $this->input->post('estado');
        //$data['ciudades'] = $this->location_model->get_ciudades_by_estado($estado);
        $data['ciudades'] = $this->location_model->get_ciudades_by_estado($estado);
        echo json_encode($data['ciudades']);
        /*$result = '<option>-selectxxxx-</option>';
        foreach ($ciudades as $ciudad){
            $result .= '<option value="' . $ciudad['CODCIUDAD'] . '" >' . $ciudad['DESCCIUDAD'] . '</option>';
        }
        echo $result;*/
    }
}