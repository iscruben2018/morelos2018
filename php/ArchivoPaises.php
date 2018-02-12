<?php 
require_once 'Estado.php';
   class MyDB extends SQLite3 
   { 
   	private $db;
      function __construct() 
      { 
         $this->open('../archivos/pais.db'); 
        
         
      } 
      
      public function consultaEstado($cp_est){
      	      $estado=new Estado();
      	      $db = new MyDB();
      	      if(!$db){
      		  //echo $db->lastErrorMsg();
      		  return 0;
      	      }
      	      else{
      			$sql="SELECT *FROM estado WHERE cp_est='".$cp_est."'";
      			$qry=$db->query($sql)or die("Error");
      
      			while($ren=$qry->fecthArray(SQLITE3_ASSOC)){
      				$estados=new Estado();
      				$estados->setCpEstado($ren['cp_est']);
      				$estados->setNombreEstado($ren['nom_est']);
      
      				return $estados;
      			}
      			
      		
      		
      	}
      	
      
      }
      
      public function listaGeneralEstados(){
      	
      	if( $this->noEstados()!=0||$this->noEstados()!="0"){
      
      		$vectorEstados=array();
      		$sql="SELECT *FROM estado ORDER BY nom_est ASC";
      		$qry=$db->query($sql)or die("Error");
      		while($ren=$qry->fetchArray(SQLITE3_ASSOC)){
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
      
      function noEstados(){
      	$db = new MyDB();
      	if(!$db){
      	//echo $db->lastErrorMsg();
      	return 0;
      	}
      	else {
      		$sql ="SELECT COUNT(cp_est) as cuenta FROM estado";
      		$ret = $db->query($sql)or die("Error");
      		while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
      			
      		$no_resultados=$row['cuenta'];
      		}
      		
      		if($no_resultados!="0"||$no_resultados!=0){
      		$cuenta=$no_resultados;
      		return $cuenta;	
      		}
      		else{
      		return 0;
      		}
      		$db->close();
      	}
      	 
      }
   } 
  
 
  
  
   
?> 