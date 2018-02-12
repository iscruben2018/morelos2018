
<?php 

	require "../conexion/conexion.php";
	class consulta{
		var $conn;
		var $conexion;
		function consulta(){		
			$this->conexion= new  Conexion();				
			$this->conn=$this->conexion->conectarse();
		}	
		//-----------------------------------------------------------------------------------------------------------------------
		function registrarUsuario($nombres, $apellidos, $telefono, $ciudad){
			$exito="";
			$sql_insert="insert into usuarios (nombres, apellidos, telefono, ciudad) values ('".$nombres."','".$apellidos."','".$telefono."','".$ciudad."')";
			$rs=mysqli_query($this->conn,$sql_insert) or die(mysql_error());
			if($rs){
				$exito="Registro exitoso";
			}
			return $exito;
		}		
		//-----------------------------------------------------------------------------------------------------------------------
		function imprimirHorario(){			
			
			$sql="select no_renhor,inscripcion.cve_ins,hi_renhor,hf_renhor,dia_renhor,docente.cve_doc,nom_doc,ap_doc,am_doc,materia.siia,nom_mat from insc_renglon join docente_mat on insc_renglon.num_doc_mat=docente_mat.num_doc_mat join docente on docente_mat.cve_doc=docente.cve_doc join materia on docente_mat.siia=materia.siia join inscripcion on insc_renglon.cve_ins=inscripcion.cve_ins join seccion on inscripcion.cod_sec=seccion.cod_sec where inscripcion.cve_ins='".$_GET['cve_ins']."' ORDER BY hi_renhor asc ";
			$rs=mysqli_query($this->conn,$sql);
			$i=0;

			
			while ($ren2 = mysqli_fetch_array($rs)){
			$i++;
	
		    /************************DIA LUNES*****************/
		if($ren2['dia_renhor']=='Lunes' && substr($ren2['hi_renhor'], 0,5)=='07:30' && substr($ren2['hf_renhor'], 0,5)=='08:25' ){
		$cadenaLunesHoraUno.="".$ren2['nom_mat']."<br>".$ren2['nom_doc']." ".$ren2['ap_doc']." ".$ren2['am_doc'];	
		}
		if($ren2['dia_renhor']=='Lunes' && substr($ren2['hi_renhor'], 0,5)=='08:25' && substr($ren2['hf_renhor'], 0,5)=='09:20' ){
			$cadenaLunesHoraDos.="".$ren2['nom_mat']."<br>".$ren2['nom_doc']." ".$ren2['ap_doc']." ".$ren2['am_doc'];
		}
		if($ren2['dia_renhor']=='Lunes' && substr($ren2['hi_renhor'], 0,5)=='09:20' && substr($ren2['hf_renhor'], 0,5)=='10:15' ){
			$cadenaLunesHoraTres.="".$ren2['nom_mat']."<br>".$ren2['nom_doc']." ".$ren2['ap_doc']." ".$ren2['am_doc'];
		}
		if($ren2['dia_renhor']=='Lunes' && substr($ren2['hi_renhor'], 0,5)=='10:30' && substr($ren2['hf_renhor'], 0,5)=='11:25' ){
			$cadenaLunesHoraCuatro.="".$ren2['nom_mat']."<br>".$ren2['nom_doc']." ".$ren2['ap_doc']." ".$ren2['am_doc'];
		}
		if($ren2['dia_renhor']=='Lunes' && substr($ren2['hi_renhor'], 0,5)=='11:25' && substr($ren2['hf_renhor'], 0,5)=='12:20' ){
			$cadenaLunesHoraCinco.="".$ren2['nom_mat']."<br>".$ren2['nom_doc']." ".$ren2['ap_doc']." ".$ren2['am_doc'];
		}
		if($ren2['dia_renhor']=='Lunes' && substr($ren2['hi_renhor'], 0,5)=='12:20' && substr($ren2['hf_renhor'], 0,5)=='13:15' ){
			$cadenaLunesHoraSeis.="".$ren2['nom_mat']."<br>".$ren2['nom_doc']." ".$ren2['ap_doc']." ".$ren2['am_doc'];
		}
		if($ren2['dia_renhor']=='Lunes' && substr($ren2['hi_renhor'], 0,5)=='13:15' && substr($ren2['hf_renhor'], 0,5)=='14:20' ){
			$cadenaLunesHoraSiete.="".$ren2['nom_mat']."<br>".$ren2['nom_doc']." ".$ren2['ap_doc']." ".$ren2['am_doc'];
		}
		/*********************FIN DIA LUNES**************/

        /************************DIA MARTES*****************/
		if($ren2['dia_renhor']=='Martes' && substr($ren2['hi_renhor'], 0,5)=='07:30' && substr($ren2['hf_renhor'], 0,5)=='08:25' ){
			$cadenaMartesHoraUno.="".$ren2['nom_mat']."<br>".$ren2['nom_doc']." ".$ren2['ap_doc']." ".$ren2['am_doc'];
		}
		if($ren2['dia_renhor']=='Martes' && substr($ren2['hi_renhor'], 0,5)=='08:25' && substr($ren2['hf_renhor'], 0,5)=='09:20' ){
			$cadenaMartesHoraDos.="".$ren2['nom_mat']."<br>".$ren2['nom_doc']." ".$ren2['ap_doc']." ".$ren2['am_doc'];
		}
		if($ren2['dia_renhor']=='Martes' && substr($ren2['hi_renhor'], 0,5)=='09:20' && substr($ren2['hf_renhor'], 0,5)=='10:15' ){
			$cadenaMartesHoraTres.="".$ren2['nom_mat']."<br>".$ren2['nom_doc']." ".$ren2['ap_doc']." ".$ren2['am_doc'];
		}
		if($ren2['dia_renhor']=='Martes' && substr($ren2['hi_renhor'], 0,5)=='10:30' && substr($ren2['hf_renhor'], 0,5)=='11:25' ){
			$cadenaMartesHoraCuatro.="".$ren2['nom_mat']."<br>".$ren2['nom_doc']." ".$ren2['ap_doc']." ".$ren2['am_doc'];
		}
		if($ren2['dia_renhor']=='Martes' && substr($ren2['hi_renhor'], 0,5)=='11:25' && substr($ren2['hf_renhor'], 0,5)=='12:20' ){
			$cadenaMartesHoraCinco.="".$ren2['nom_mat']."<br>".$ren2['nom_doc']." ".$ren2['ap_doc']." ".$ren2['am_doc'];
		}
		if($ren2['dia_renhor']=='Martes' && substr($ren2['hi_renhor'], 0,5)=='12:20' && substr($ren2['hf_renhor'], 0,5)=='13:15' ){
			$cadenaMartesHoraSeis.="".$ren2['nom_mat']."<br>".$ren2['nom_doc']." ".$ren2['ap_doc']." ".$ren2['am_doc'];
		}
		if($ren2['dia_renhor']=='Martes' && substr($ren2['hi_renhor'], 0,5)=='13:15' && substr($ren2['hf_renhor'], 0,5)=='14:20' ){
			$cadenaMartesHoraSiete.="".$ren2['nom_mat']."<br>".$ren2['nom_doc']." ".$ren2['ap_doc']." ".$ren2['am_doc'];
		}
		/*********************FIN DIA MARTES**************/

        /************************DIA MIERCOLES*****************/
		if($ren2['dia_renhor']=='Miercoles' && substr($ren2['hi_renhor'], 0,5)=='07:30' && substr($ren2['hf_renhor'], 0,5)=='08:25' ){
			$cadenaMiercolesHoraUno.="".$ren2['nom_mat']."<br>".$ren2['nom_doc']." ".$ren2['ap_doc']." ".$ren2['am_doc'];
		}
		if($ren2['dia_renhor']=='Miercoles' && substr($ren2['hi_renhor'], 0,5)=='08:25' && substr($ren2['hf_renhor'], 0,5)=='09:20' ){
			$cadenaMiercolesHoraDos.="".$ren2['nom_mat']."<br>".$ren2['nom_doc']." ".$ren2['ap_doc']." ".$ren2['am_doc'];
		}
		if($ren2['dia_renhor']=='Miercoles' && substr($ren2['hi_renhor'], 0,5)=='09:20' && substr($ren2['hf_renhor'], 0,5)=='10:15' ){
			$cadenaMiercolesHoraTres.="".$ren2['nom_mat']."<br>".$ren2['nom_doc']." ".$ren2['ap_doc']." ".$ren2['am_doc'];
		}
		if($ren2['dia_renhor']=='Miercoles' && substr($ren2['hi_renhor'], 0,5)=='10:30' && substr($ren2['hf_renhor'], 0,5)=='11:25' ){
			$cadenaMiercolesHoraCuatro.="".$ren2['nom_mat']."<br>".$ren2['nom_doc']." ".$ren2['ap_doc']." ".$ren2['am_doc'];
		}
		if($ren2['dia_renhor']=='Miercoles' && substr($ren2['hi_renhor'], 0,5)=='11:25' && substr($ren2['hf_renhor'], 0,5)=='12:20' ){
			$cadenaMiercolesHoraCinco.="".$ren2['nom_mat']."<br>".$ren2['nom_doc']." ".$ren2['ap_doc']." ".$ren2['am_doc'];
		}
		if($ren2['dia_renhor']=='Miercoles' && substr($ren2['hi_renhor'], 0,5)=='12:20' && substr($ren2['hf_renhor'], 0,5)=='13:15' ){
			$cadenaMiercolesHoraSeis.="".$ren2['nom_mat']."<br>".$ren2['nom_doc']." ".$ren2['ap_doc']." ".$ren2['am_doc'];
		}
		if($ren2['dia_renhor']=='Miercoles' && substr($ren2['hi_renhor'], 0,5)=='13:15' && substr($ren2['hf_renhor'], 0,5)=='14:20' ){
			$cadenaMiercolesHoraSiete.="".$ren2['nom_mat']."<br>".$ren2['nom_doc']." ".$ren2['ap_doc']." ".$ren2['am_doc'];
		}
		/*********************FIN DIA MIERCOLES**************/

		/************************DIA JUEVES*****************/
		if($ren2['dia_renhor']=='Jueves' && substr($ren2['hi_renhor'], 0,5)=='07:30' && substr($ren2['hf_renhor'], 0,5)=='08:25' ){
			$cadenaJuevesHoraUno.="".$ren2['nom_mat']."<br>".$ren2['nom_doc']." ".$ren2['ap_doc']." ".$ren2['am_doc'];
		}
		if($ren2['dia_renhor']=='Jueves' && substr($ren2['hi_renhor'], 0,5)=='08:25' && substr($ren2['hf_renhor'], 0,5)=='09:20' ){
			$cadenaJuevesHoraDos.="".$ren2['nom_mat']."<br>".$ren2['nom_doc']." ".$ren2['ap_doc']." ".$ren2['am_doc'];
		}
		if($ren2['dia_renhor']=='Jueves' && substr($ren2['hi_renhor'], 0,5)=='09:20' && substr($ren2['hf_renhor'], 0,5)=='10:15' ){
			$cadenaJuevesHoraTres.="".$ren2['nom_mat']."<br>".$ren2['nom_doc']." ".$ren2['ap_doc']." ".$ren2['am_doc'];
		}
		if($ren2['dia_renhor']=='Jueves' && substr($ren2['hi_renhor'], 0,5)=='10:30' && substr($ren2['hf_renhor'], 0,5)=='11:25' ){
			$cadenaJuevesHoraCuatro.="".$ren2['nom_mat']."<br>".$ren2['nom_doc']." ".$ren2['ap_doc']." ".$ren2['am_doc'];
		}
		if($ren2['dia_renhor']=='Jueves' && substr($ren2['hi_renhor'], 0,5)=='11:25' && substr($ren2['hf_renhor'], 0,5)=='12:20' ){
			$cadenaJuevesHoraCinco.="".$ren2['nom_mat']."<br>".$ren2['nom_doc']." ".$ren2['ap_doc']." ".$ren2['am_doc'];
		}
		if($ren2['dia_renhor']=='Jueves' && substr($ren2['hi_renhor'], 0,5)=='12:20' && substr($ren2['hf_renhor'], 0,5)=='13:15' ){
			$cadenaJuevesHoraSeis.="".$ren2['nom_mat']."<br>".$ren2['nom_doc']." ".$ren2['ap_doc']." ".$ren2['am_doc'];
		}
		if($ren2['dia_renhor']=='Jueves' && substr($ren2['hi_renhor'], 0,5)=='13:15' && substr($ren2['hf_renhor'], 0,5)=='14:20' ){
			$cadenaJuevesHoraSiete.="".$ren2['nom_mat']."<br>".$ren2['nom_doc']." ".$ren2['ap_doc']." ".$ren2['am_doc'];
		}
		/*********************FIN DIA JUEVES**************/


		/************************DIA VIERNES*****************/
		if($ren2['dia_renhor']=='Viernes' && substr($ren2['hi_renhor'], 0,5)=='07:30' && substr($ren2['hf_renhor'], 0,5)=='08:25' ){
			$cadenaViernesHoraUno.="".$ren2['nom_mat']."<br>".$ren2['nom_doc']." ".$ren2['ap_doc']." ".$ren2['am_doc'];
		}
		if($ren2['dia_renhor']=='Viernes' && substr($ren2['hi_renhor'], 0,5)=='08:25' && substr($ren2['hf_renhor'], 0,5)=='09:20' ){
			$cadenaViernesHoraDos.="".$ren2['nom_mat']."<br>".$ren2['nom_doc']." ".$ren2['ap_doc']." ".$ren2['am_doc'];
		}
		if($ren2['dia_renhor']=='Viernes' && substr($ren2['hi_renhor'], 0,5)=='09:20' && substr($ren2['hf_renhor'], 0,5)=='10:15' ){
			$cadenaViernesHoraTres.="".$ren2['nom_mat']."<br>".$ren2['nom_doc']." ".$ren2['ap_doc']." ".$ren2['am_doc'];
		}
		if($ren2['dia_renhor']=='Viernes' && substr($ren2['hi_renhor'], 0,5)=='10:30' && substr($ren2['hf_renhor'], 0,5)=='11:25' ){
			$cadenaViernesHoraCuatro.="".$ren2['nom_mat']."<br>".$ren2['nom_doc']." ".$ren2['ap_doc']." ".$ren2['am_doc'];
		}
		if($ren2['dia_renhor']=='Viernes' && substr($ren2['hi_renhor'], 0,5)=='11:25' && substr($ren2['hf_renhor'], 0,5)=='12:20' ){
			$cadenaViernesHoraCinco.="".$ren2['nom_mat']."<br>".$ren2['nom_doc']." ".$ren2['ap_doc']." ".$ren2['am_doc'];
		}
		if($ren2['dia_renhor']=='Viernes' && substr($ren2['hi_renhor'], 0,5)=='12:20' && substr($ren2['hf_renhor'], 0,5)=='13:15' ){
			$cadenaViernesHoraSeis.="".$ren2['nom_mat']."<br>".$ren2['nom_doc']." ".$ren2['ap_doc']." ".$ren2['am_doc'];
		}
		if($ren2['dia_renhor']=='Viernes' && substr($ren2['hi_renhor'], 0,5)=='13:15' && substr($ren2['hf_renhor'], 0,5)=='14:20' ){
			$cadenaViernesHoraSiete.="".$ren2['nom_mat']."<br>".$ren2['nom_doc']." ".$ren2['ap_doc']." ".$ren2['am_doc'];
		}
		/*********************FIN DIA VIERNES**************/
		


		}	
		        $html="";
                $html=$html.'<div align="center">';
           

                
			         $html=$html.'<table  border="0">
  <tr>
    <td rowspan="5"><img src="../../../../images/logo-3.png"></td>
    <td colspan="6"><h3>Escuela Preparatoria Jose Ma. Morelos de Zitácuaro,S.C</h3><br></td>
  </tr>
  <tr>
    <td colspan="4" rowspan="2"><h4>CARGA ACAD&Eacute;MICA</h4></td>
    <td><h5>Ciclo:</h5></td>
    <td>'.$_GET["ciclo"].'</td>
  </tr>
  <tr>
    <td><h5>Fecha:</h5></td>
    <td>'.$_GET["fecha"].'<br></td>
  </tr>
  <tr>
    <td><h5>Matricula:</h5></td>
    <td>'.$_GET["matricula"].'</td>
    <td><h5>Nombre:</h5>'.$_GET["nombre"].'</td>
    <td><h5>Semestre:</h5></td>
    <td>'.$_GET["semestre"].'</td>
  </tr>
  <tr>
    <td colspan="3"><h5>Bachillerato:</h5>'.$_GET["bachillerato"].'</td>
    <td><h5>Secci&oacute;n:</h5></td>
    <td>'.$_GET["seccion"].'</td>
  </tr>
</table><br>';
			    $html=$html.'			
			    <table border="1" bordercolor="#0000CC" bordercolordark="#FF0000">';	
			    $html=$html.'<tr bgcolor="#000034">
			             <td> <font color="#FFFFFF">Hora/Dia</font></td>
			             <td><font color="#FFFFFF">Lunes</font></td>
			             <td><font color="#FFFFFF">Martes</font></td>
			             <td><font color="#FFFFFF">Miercoles</font></td>
			             <td><font color="#FFFFFF">Jueves</font></td>
			             <td><font color="#FFFFFF">Viernes</font></td>
			             <td><font color="#FFFFFF">Sabado</font></td>
			             </tr>';

			    $html=  $html.'<tr bgcolor="gray">';
				$html = $html.'<td>';
				$html = $html. '7:30 am a 8:25 am';
				$html = $html.'</td>';
				$html = $html.'<td>';
				$html = $html. $cadenaLunesHoraUno;
				$html = $html.'</td>';
				$html = $html.'<td>';
				$html = $html. $cadenaMartesHoraUno;
				$html = $html.'</td>';
				$html = $html.'<td>';
				$html = $html. $cadenaMiercolesHoraUno;
				$html = $html.'</td>';
				$html = $html.'<td>';
				$html = $html. $cadenaJuevesHoraUno;
				$html = $html.'</td>';
				$html = $html.'<td>';
				$html = $html. $cadenaViernesHoraUno;
				$html = $html.'</td>';
				$html = $html.'<td>';
				$html = $html. '/';
				$html = $html.'</td>';
				$html = $html.'</tr>';	
				$html = $html.'<tr>';	
				$html = $html.'<td>';
				$html = $html. '8:25 am a 9:20 am';
				$html = $html.'</td>';
				$html = $html.'<td>';
				$html = $html. $cadenaLunesHoraDos;
				$html = $html.'</td>';
				$html = $html.'<td>';
				$html = $html. $cadenaMartesHoraDos;
				$html = $html.'</td>';
				$html = $html.'<td>';
				$html = $html. $cadenaMiercolesHoraDos;
				$html = $html.'</td>';
				$html = $html.'<td>';
				$html = $html. $cadenaJuevesHoraDos;
				$html = $html.'</td>';
				$html = $html.'<td>';
				$html = $html. $cadenaViernesHoraDos;
				$html = $html.'</td>';
				$html = $html.'<td>';
				$html = $html. '/';
				$html = $html.'</td>';
				$html = $html.'</tr>';
				$html=  $html.'<tr bgcolor="gray">';
				$html = $html.'<td>';
				$html = $html. '9:20 am a 10:15 am';
				$html = $html.'</td>';
				$html = $html.'<td>';
				$html = $html. $cadenaLunesHoraTres;
				$html = $html.'</td>';
				$html = $html.'<td>';
				$html = $html. $cadenaMartesHoraTres;
				$html = $html.'</td>';
				$html = $html.'<td>';
				$html = $html. $cadenaMiercolesHoraTres;
				$html = $html.'</td>';
				$html = $html.'<td>';
				$html = $html. $cadenaJuevesHoraTres;
				$html = $html.'</td>';
				$html = $html.'<td>';
				$html = $html. $cadenaViernesHoraTres;
				$html = $html.'</td>';
				$html = $html.'<td>';
				$html = $html. '/';
				$html = $html.'</td>';
				$html = $html.'</tr>';
				$html = $html.'<tr>';	
				$html = $html.'<td>';
				$html = $html. '10:15 am a 10:30 am';
				$html = $html.'</td>';
				$html = $html.'<td>';
				$html = $html. 'R';
				$html = $html.'</td>';
				$html = $html.'<td>';
				$html = $html. 'E';
				$html = $html.'</td>';
				$html = $html.'<td>';
				$html = $html. 'C';
				$html = $html.'</td>';
				$html = $html.'<td>';
				$html = $html. 'E';
				$html = $html.'</td>';
				$html = $html.'<td>';
				$html = $html. 'S';
				$html = $html.'</td>';
				$html = $html.'<td>';
				$html = $html. 'O';
				$html = $html.'</td>';
				$html = $html.'</tr>';
				$html=  $html.'<tr bgcolor="gray">';
				$html = $html.'<td>';
				$html = $html. '10:30 am a 11:25 am';
				$html = $html.'</td>';
				$html = $html.'<td>';
				$html = $html. $cadenaLunesHoraCuatro;
				$html = $html.'</td>';
				$html = $html.'<td>';
				$html = $html. $cadenaMartesHoraCuatro;
				$html = $html.'</td>';
				$html = $html.'<td>';
				$html = $html. $cadenaMiercolesHoraCuatro;
				$html = $html.'</td>';
				$html = $html.'<td>';
				$html = $html. $cadenaJuevesHoraCuatro;
				$html = $html.'</td>';
				$html = $html.'<td>';
				$html = $html. $cadenaViernesHoraCuatro;
				$html = $html.'</td>';
				$html = $html.'<td>';
				$html = $html. '/';
				$html = $html.'</td>';
				$html = $html.'</tr>';
				$html = $html.'<tr>';	
				$html = $html.'<td>';
				$html = $html. '11:25 am a 12:20 pm';
				$html = $html.'</td>';
				$html = $html.'<td>';
				$html = $html. $cadenaLunesHoraCinco;
				$html = $html.'</td>';
				$html = $html.'<td>';
				$html = $html. $cadenaMartesHoraCinco;
				$html = $html.'</td>';
				$html = $html.'<td>';
				$html = $html. $cadenaMiercolesHoraCinco;
				$html = $html.'</td>';
				$html = $html.'<td>';
				$html = $html. $cadenaJuevesHoraCinco;
				$html = $html.'</td>';
				$html = $html.'<td>';
				$html = $html. $cadenaViernesHoraCinco;
				$html = $html.'</td>';
				$html = $html.'<td>';
				$html = $html. '/';
				$html = $html.'</td>';
				$html = $html.'</tr>';
				$html=  $html.'<tr bgcolor="gray">';
				$html = $html.'<td>';
				$html = $html. '12:20 pm a 13:15 pm';
				$html = $html.'</td>';
				$html = $html.'<td>';
				$html = $html. $cadenaLunesHoraSeis;
				$html = $html.'</td>';
				$html = $html.'<td>';
				$html = $html. $cadenaMartesHoraSeis;
				$html = $html.'</td>';
				$html = $html.'<td>';
				$html = $html. $cadenaMiercolesHoraSeis;
				$html = $html.'</td>';
				$html = $html.'<td>';
				$html = $html. $cadenaJuevesHoraSeis;
				$html = $html.'</td>';
				$html = $html.'<td>';
				$html = $html. $cadenaViernesHoraSeis;
				$html = $html.'</td>';
				$html = $html.'<td>';
				$html = $html. '/';
				$html = $html.'</td>';
				$html = $html.'</tr>';
				$html = $html.'<tr>';	
				$html = $html.'<td>';
				$html = $html. '13:15 pm a 14:10 pm';
				$html = $html.'</td>';
				$html = $html.'<td>';
				$html = $html. $cadenaLunesHoraSiete;
				$html = $html.'</td>';
				$html = $html.'<td>';
				$html = $html. $cadenaMartesHoraSiete;
				$html = $html.'</td>';
				$html = $html.'<td>';
				$html = $html. $cadenaMiercolesHoraSiete;
				$html = $html.'</td>';
				$html = $html.'<td>';
				$html = $html. $cadenaJuevesHoraSiete;
				$html = $html.'</td>';
				$html = $html.'<td>';
				$html = $html. $cadenaViernesHoraSiete;
				$html = $html.'</td>';
				$html = $html.'<td>';
				$html = $html. '/';
				$html = $html.'</td>';
				$html = $html.'</tr>';			

			$html=$html.'</table></div>';			
     		 return ($html);
		}
		//-----------------------------------------------------------------------------------------------------------------------		
	}

?>

