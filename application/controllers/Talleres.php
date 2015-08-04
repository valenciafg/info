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
        $data['talleres'] = $this->talleres_model->get_all_talleres();
    	$this->load->view('talleres_view',$data);
    }

    public function get_ciudades(){
        $this->load->model('location_model');
        $estado = $this->input->post('estado');
        //$data['ciudades'] = $this->location_model->get_ciudades_by_estado($estado);
        $ciudades = $this->location_model->get_ciudades_by_estado($estado);
        $result = "<option>--Seleccione--</option>";
        foreach ($ciudades as $ciudad){
            $result .= '<option value="' . $ciudad['CODCIUDAD'] . '" >' . $ciudad['DESCCIUDAD'] . '</option>';
        }
        //echo json_encode("asdas");
        echo $result;
    }

    public function get_municipios(){
        $this->load->model('location_model');
        $estado = $this->input->post('estado');
        $ciudad = $this->input->post('ciudad');
        //$data['ciudades'] = $this->location_model->get_municipios_by_ciudad($estado);
        $municipios = $this->location_model->get_municipios_by_ciudad($estado,$ciudad);
        $result = "<option>--Seleccione--</option>";
        foreach ($municipios as $municipio){
            $result .= '<option value="' . $municipio['CODMUNICIPIO'] . '" >' . $municipio['DESCMUNICIPIO'] . '</option>';
        }
        //echo json_encode("asdas");
        echo $result;
    }

    /*public function get_ciudades_json(){
        $this->load->model('location_model');
        $estado = $this->input->post('estado');
        //$data['ciudades'] = $this->location_model->get_ciudades_by_estado($estado);
        $data['ciudades'] = $this->location_model->get_ciudades_by_estado($estado);
        echo json_encode($data['ciudades']);
    }*/
}