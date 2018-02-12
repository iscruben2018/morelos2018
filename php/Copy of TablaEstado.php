<?php
require_once 'Estado.php';
require_once 'Conexion.php';

class TablaEstado extends Conexion{
	private $conexion;
	private $_estados=array();
	private $vectorEstados=array();
	
	
	public function __construct(){
		
		$this->tabla="estado";
		$this->crearConexion();
	
	}
	
	public function add(Estado $estado){
		$this->_estados[]=$estado;
	}
	

	public function noEstados(){
		$sql="SELECT COUNT(cp_est) as cuenta FROM estado";
		$result=mysql_query($sql)or die("Error en la tabla->".$this->tabla.",de tipo:".mysql_error().mysql_errno());
		$no_resultados=mysql_num_rows($result);
		if($no_resultados>0){
			$cuenta=mysql_fetch_object($result);
			return $cuenta->cuenta;
		}
		else {
			return 0;
		}
	}
	

	public function existeEstado($cp_est){
		$sql="SELECT *FROM estado WHERE cp_est='".$cp_est."'";
		$result=mysql_query($sql)or die("Error en la tabla->".$this->tabla.",de tipo:".mysql_error().myql_errno());
		if($existe=mysql_fetch_object($result)){
			return 1;
		}
		else{
			return 0;
		}
	
	}
	
	
	public function consultaEstado($cp_est){
		$estado=new Estado();
	
		if($this->existeEstado($cp_est)=="1"){
			$sql="SELECT *FROM estado WHERE cp_est='".$cp_est."'";
			mysql_query("SET NAMES 'utf8'");
			$qry=mysql_query($sql)or die("Error en la tabla->".$this->tabla.",de tipo:".mysql_errror().mysql_errno());
			if($qry){
	
				if($no_resultado=mysql_num_rows($qry)>0){
	
					$ren=mysql_fetch_array($qry);
					$estados=new Estado();
					$estados->setCpEstado($ren['cp_est']);
					$estados->setNombreEstado($ren['nom_est']);
	
					return $estados;
				}
				else{
					return 3;//NO HAY RESULTADOS
				}
			}
			else{
				return 0;//ERROR
			}
		}
		else{
			return 2;//NO EXISTE
		}
	
	}
	
	public function listaGeneralEstados(){
		if( $this->noEstados()>0){
	
			$vectorEstados=array();
			$sql="SELECT *FROM estado ORDER BY nom_est ASC";
			mysql_query("SET NAMES 'utf8'");
			$qry=mysql_query($sql)or die("Error en la tabla->".$this->tabla.",de tipo:".mysql_error().mysql_errno());
			while($ren=mysql_fetch_array($qry)){
				$estado=new Estado();
				$estado->setCpEstado($ren['cp_est']);
				$estado->setNombreEstado($ren['nom_est']);
				
	
				$vectorEstados[]=$estado;
			}
			return $vectorEstados;
		}
		else{
			return 0;//NO HAY RESULTADOSs
		}
	
	}
}
?>