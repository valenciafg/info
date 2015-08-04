<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');


class Talleres_model extends CI_Model {
	public function ___construct(){
		parent::___construct();
	}

	public function get_all_talleres(){
		$sql = "SELECT  
					P.TIPOID AS TIPOID, P.NUMID AS NUMID, T.NOMTER AS NOMBRE, INITCAP(T.DIREC) AS DIRECCION, INITCAP(E.DESCESTADO) AS ESTADO, INITCAP(C.DESCCIUDAD) AS CIUDAD, INITCAP(M.DESCMUNICIPIO) AS MUNICIPIO, T.TELEF1 AS TELEFONO1, T.TELEF2 AS TELEFONO2,LOWER(T.EMAIL) AS EMAIL 
				FROM 
					PROVEEDOR P 
				JOIN 
					LVAL L 
				ON 
					P.TIPOPROVEEDOR=L.CODLVAL 
				JOIN 
					TERCERO T 
				ON 
					P.TIPOID = T.TIPOID 
					AND P.NUMID = T.NUMID 
				JOIN 
					ESTADO E
				ON
					T.CODESTADO = E.CODESTADO
					AND T.CODPAIS = E.CODPAIS
				JOIN 
					CIUDAD C
				ON
					C.CODCIUDAD = T.CODCIUDAD
					AND C.CODESTADO = T.CODESTADO
					AND C.CODPAIS = T.CODPAIS
				JOIN 
					MUNICIPIO M
				ON
					M.CODMUNICIPIO = T.CODMUNICIPIO
					AND M.CODCIUDAD = T.CODCIUDAD
					AND M.CODESTADO = T.CODESTADO
					AND M.CODPAIS = T.CODPAIS
				WHERE 	
					L.TIPOLVAL='TIPOPRVE' 
					AND L.CODLVAL = '01' 	
					AND P.AFILIACION = 'S'	
					AND P.STSPROVEEDOR = 'ACT'
					AND T.CODPAIS = '001'
				ORDER BY ESTADO";
		$query = $this->db->query($sql);
        return $query->result_array();
	}
	
}
?>