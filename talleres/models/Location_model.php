<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');


class Location_model extends CI_Model {

	public function ___construct(){
		parent::___construct();
	}

	public function get_all_estados(){
		/*$conditions = array('CODPAIS'=>'001',
								'CODESTADO <>'=>'999');*/
		/*$this->db->distinct('CODESTADO');
		$this->db->select('INITCAP(DESCESTADO) AS DESCESTADO');
		$this->db->from('ESTADO');
		$this->db->where($conditions);
		$this->db->order_by("DESCESTADO"); */
		//$query = $this->db->get();
		$sql = "SELECT 
					DISTINCT E.CODESTADO AS CODESTADO,INITCAP(E.DESCESTADO) AS DESCESTADO
				FROM 	
					ESTADO E
				WHERE
					E.CODPAIS = '001'
					AND E.CODESTADO <> '999'
					ORDER BY E.DESCESTADO";
		$query = $this->db->query($sql);
        return $query->result_array();
	}

	public function get_ciudades_by_estado($estado){
		$sql = "SELECT 
					C.CODCIUDAD AS CODCIUDAD,INITCAP(C.DESCCIUDAD) AS DESCCIUDAD
				FROM 
					CIUDAD C
				WHERE
					C.CODPAIS = '001'
					AND C.CODESTADO = '$estado'";
		$query = $this->db->query($sql);
        return $query->result_array();
	}
	public function get_ciudades(){
		$sql = "SELECT 
					C.CODCIUDAD AS CODCIUDAD,C.CODESTADO AS CODESTADO, INITCAP(C.DESCCIUDAD) AS DESCCIUDAD
				FROM 
					CIUDAD C
				WHERE
					C.CODPAIS = '001'";
		$query = $this->db->query($sql);
        return $query->result_array();
	}
}
?>