<html>
<head>
<script type="text/javascript">
function imprSelec(muestra){
	

var ficha=document.getElementById(muestra);
var ventimp=window.open('','popimpr');
ventimp.document.write(ficha.innerHTML);
ventimp.document.close();
var css=ventimp.document.createElement("link");
css.setAttribute("href","mm_lodging1.css");
css.setAttribute("rel","stylesheet");
css.setAttribute("type","text/css");
ventimp.document.head.appendChild(css);


ventimp.print();
ventimp.close();

}
</script>

</head>
<body>
<div id='muestra'>
  <table width="971" cellpadding="2" cellspacing="1" border="1" id="calendar" align="center">
        <tr>
          <td width="12%" class="subHeader"><img src="../../morelosjuniook/images/logo-3.png" width="79" height="77" /></td>
          <td colspan="9" class="subHeader"><p class="Estilo1">Escuela Preparatoria Jos&eacute; Ma. Morelos de Zit&aacute;cuaro,S.C</p>
            <p class="Estilo3">Incorporada a la U.M.S.N.H</p>
            <p class="Estilo3">Clave:109-218.1&quot;74&quot; </p>
            <p align="right"><span class="Estilo1">SOLICITUD DE REINSCRIPCION </span> </p></td>
        </tr>
		
		<tr id="weekdays" bgcolor="#999966">
		  <th colspan="5" align="center" bgcolor="#FFFFFF" class="Estilo1"><span class="bodyText"><span class="Estilo3">H.ZIT&Aacute;CUARO,MICH A 15 DE JUNIO DEL 2016 </span></span></th>
		  <th colspan="5" align="center" bgcolor="#FFFFFF" class="bodyText"><span class="Estilo1">CICLO ESCOLAR 2016-2017 </span></th>
	    </tr>
		<tr id="weekdays" bgcolor="#999966">
		  <th height="20" colspan="10" align="center" bgcolor="#1B1417"><span class="Estilo37">DATOS ACAD&Eacute;MICOS </span></th>
        </tr>
		<tr bgcolor="#CCCC99" id="calheader">
		  <td height="30" colspan="3" align="center" valign="top" bgcolor="#FFFFFF" class="Estilo15">SECCION Y/O BACH: </td>
          <td colspan="3" align="center" valign="top" bgcolor="#FFFFFF" class="calendarText"><span class="Estilo15">SEMESTRE: </span></td>
          <td colspan="4" align="center" valign="top" bgcolor="#FFFFFF" class="calendarText"><span class="Estilo15">MATRICULA: </span></td>
        </tr>
        
        <tr bgcolor="#CCCC99" id="calheader">
          <td colspan="10" align="center" valign="top" bgcolor="#1B1417" class="bodyText Estilo8"><span class="Estilo23">DATOS DEL ALUMNO </span></td>
        </tr>
        <tr bgcolor="#ededde">
          <td height="23" colspan="3" valign="top" bgcolor="#FFFFFF" class="calendarText"><span class="Estilo26">NOMBRE:</span></td>
          <td colspan="3" valign="top" bgcolor="#FFFFFF" class="calendarText">&nbsp;</td>
          <td colspan="4" valign="top" bgcolor="#FFFFFF" class="calendarText">&nbsp;</td>
        </tr>
        <tr bgcolor="#ededde">
          <td height="19" colspan="5" valign="top" bgcolor="#FFFFFF" class="calendarText"><span class="Estilo26">FECHA DE NACIMIENTO:</span></td>
          <td height="19" colspan="5" valign="top" bgcolor="#FFFFFF" class="calendarText"><span class="Estilo26">LUGAR DE NACIMIENTO :</span></td>
        </tr>
        <tr bgcolor="#ededde">
          <td height="23" colspan="3" valign="top" bgcolor="#FFFFFF" class="calendarText"><span class="Estilo26">DOMICILIO:</span></td>
          <td height="23" colspan="7" valign="top" bgcolor="#FFFFFF" class="calendarText">&nbsp;</td>
        </tr>
        <tr bgcolor="#ededde">
          <td height="18" colspan="5" valign="top" bgcolor="#FFFFFF" class="calendarText"><span class="Estilo26">COLONIA:</span></td>
          <td height="18" colspan="5" valign="top" bgcolor="#FFFFFF" class="calendarText"><span class="Estilo26">CODIGO POSTAL :</span></td>
        </tr>
        <tr bgcolor="#ededde">
          <td height="18" colspan="5" valign="top" bgcolor="#FFFFFF" class="calendarText"><span class="Estilo26">CIUDAD:</span></td>
          <td height="18" colspan="5" valign="top" bgcolor="#FFFFFF" class="calendarText"><span class="Estilo26">ESTADO:</span></td>
        </tr>
        <tr bgcolor="#ededde">
          <td height="19" colspan="5" valign="top" bgcolor="#FFFFFF" class="calendarText"><span class="Estilo26">TELEFONOS:</span></td>
          <td height="19" colspan="5" valign="top" bgcolor="#FFFFFF" class="calendarText"><span class="Estilo26">EMAIL:</span></td>
        </tr>
        <tr bgcolor="#ededde">
          <td height="35" colspan="5" valign="top" bgcolor="#FFFFFF" class="calendarText"><span class="Estilo26">PROBLEMAS DE SALUD (ESPECIFIQUE):</span><span class="Estilo26"> SI ( ) NO ( ) </span></td>
          <td height="35" colspan="5" valign="top" bgcolor="#FFFFFF" class="calendarText"><span class="Estilo26">CUENTA CON ALGUNA BECA  (ESPECIFIQUE):</span><span class="Estilo26"> SI ( ) NO ( ) </span></td>
        </tr>
        <tr bgcolor="#ededde">
          <td height="39" colspan="5" valign="top" bgcolor="#FFFFFF" class="calendarText"><span class="Estilo26">CUENTA CON SERVICIO DE SALUD (ESPECIFIQUE):</span><span class="Estilo26"> SI ( ) NO ( ) </span></td>
          <td height="39" colspan="5" valign="top" bgcolor="#FFFFFF" class="calendarText"><span class="Estilo26">HABLA O DOMINA ALGUNA LENGUA INDIGENA  (ESPECIFIQUE):</span><span class="Estilo26"> SI ( ) NO ( ) </span></td>
        </tr>
        <tr bgcolor="#ededde">
          <td height="24" colspan="10" valign="top" bgcolor="#1B1417" class="calendarText Estilo30"><div align="center" class="Estilo32">DATOS DEL PADRE O TUTOR </div></td>
        </tr>
        <tr bgcolor="#ededde">
          <td height="19" colspan="5" valign="top" bgcolor="#FFFFFF" class="calendarText"><span class="Estilo26">NOMBRE:</span></td>
          <td height="19" colspan="5" valign="top" bgcolor="#FFFFFF" class="calendarText"><span class="Estilo26">ESTADO CIVIL: </span></td>
        </tr>
        <tr bgcolor="#ededde">
          <td height="23" valign="top" bgcolor="#FFFFFF" class="calendarText"><span class="Estilo26">DOMICILIO:</span></td>
          <td height="23" colspan="9" valign="top" bgcolor="#FFFFFF" class="calendarText">&nbsp;</td>
        </tr>
		
		
		
        <tr bgcolor="#ededde">
          <td height="18" colspan="5" valign="top" bgcolor="#FFFFFF" class="calendarText"><span class="Estilo26">COLONIA:</span></td>
          <td height="18" colspan="5" valign="top" bgcolor="#FFFFFF" class="calendarText"><span class="Estilo26">C&Oacute;DIGO POSTAL </span></td>
        </tr>
        <tr bgcolor="#ededde">
          <td height="18" colspan="5" valign="top" bgcolor="#FFFFFF" class="calendarText"><span class="Estilo26">CIUDAD:</span></td>
          <td height="18" colspan="5" valign="top" bgcolor="#FFFFFF" class="calendarText"><span class="Estilo26">ESTADO:</span></td>
        </tr>
        <tr bgcolor="#ededde">
          <td height="18" colspan="5" valign="top" bgcolor="#FFFFFF" class="calendarText"><span class="Estilo26">TEL&Eacute;FONOS:</span></td>
          <td height="18" colspan="5" valign="top" bgcolor="#FFFFFF" class="calendarText"><span class="Estilo26">EMAIL:</span></td>
        </tr>
        <tr bgcolor="#ededde">
          <td height="18" colspan="5" valign="top" bgcolor="#FFFFFF" class="calendarText"><span class="Estilo26">OCUPACI&Oacute;N:</span></td>
          <td height="18" colspan="5" valign="top" bgcolor="#FFFFFF" class="calendarText"><span class="Estilo26">LUGAR DE TRABAJO: </span></td>
        </tr>
        <tr bgcolor="#ededde">
          <td height="24" colspan="10" valign="top" bgcolor="#1B1417" class="calendarText"><div align="center"><span class="Estilo32">RESPONSIVA</span></div></td>
        </tr>
        <tr bgcolor="#ededde">
          <td height="32" colspan="10" valign="top" bgcolor="#FFFFFF" class="calendarText"><span class="Estilo26">Los suscritos se comprometen a respetar y estar confomr con lo establecido en el REGLAMENTO ESCOLAR y a colaborar con las autoridades escolares para lograr el m&aacute;ximo aprovechamiento acad&eacute;mico </span></td>
        </tr>
        <tr bgcolor="#ededde">
          <td height="50" colspan="2" rowspan="2" valign="top" bgcolor="#FFFFFF" class="calendarText">&nbsp;</td>
          <td height="23" colspan="4" valign="top" bgcolor="#FFFFFF" class="calendarText"><span class="Estilo26">FIRMA DEL ALUMNO</span></td>
          <td height="23" colspan="4" valign="top" bgcolor="#FFFFFF" class="calendarText"><span class="Estilo26">FIRMA DEL PADRE O TUTOR </span></td>
        </tr>
        <tr bgcolor="#ededde">
          <td height="25" colspan="4" valign="top" bgcolor="#FFFFFF" class="calendarText"><p>&nbsp;</p>
          <p>___________________________________________________</p></td>
          <td height="25" colspan="4" valign="top" bgcolor="#FFFFFF" class="calendarText"><p>&nbsp;</p>
          <p>_____________________________________________</p></td>
        </tr>
        
        <tr bgcolor="#CCCC99" id="calheader">
          <td colspan="10" align="center" valign="top" bgcolor="#000000" class="calendarText"><span class="Estilo32">PARA USO EXCLUSIVO DEL DEPARTAMENTO DE CONTROL ESCOLAR </span></td>
        </tr>
        
        
        <tr bgcolor="#ededde">
          <td colspan="2" rowspan="5" valign="top" bgcolor="#FFFFFF" class="calendarText"><p>&nbsp;</p>
          <p><span class="Estilo26">ALUMNO REGULAR</span></p>
          <p><span class="Estilo26">( )</span></p></td>
          <td height="35" colspan="6" valign="top" bgcolor="#FFFFFF" class="calendarText"><div align="center"><span class="Estilo26">ALUMNO IRREGULAR ( ) </span></div></td>
          <td width="3%" rowspan="5" valign="top" bgcolor="#FFFFFF" class="calendarText">&nbsp;</td>
          <td width="20%" rowspan="2" valign="top" bgcolor="#FFFFFF" class="calendarText"><span class="Estilo26">RECIBI&Oacute; Y RECIBI&Oacute; </span></td>
        </tr>
        <tr bgcolor="#CCCC99" id="calheader">
          <td colspan="6" align="center" valign="top" bgcolor="#66CC99" class="calendarText Estilo38">CARGA DE MATERIAS </td>
        </tr>
        <tr bgcolor="#ededde">
          <td height="24" colspan="6" valign="top" bgcolor="#FFFFFF" class="calendarText">&nbsp;</td>
          <td width="20%" rowspan="3" valign="top" bgcolor="#FFFFFF" class="calendarText"><p>&nbsp;</p>
          <p>___________________________</p></td>
        </tr>
        <tr bgcolor="#ededde">
          <td height="25" colspan="6" valign="top" bgcolor="#FFFFFF" class="calendarText">&nbsp;</td>
        </tr>
        <tr bgcolor="#ededde">
          <td height="24" colspan="6" valign="top" bgcolor="#FFFFFF" class="calendarText">&nbsp;</td>
        </tr>
      </table>

</div>
<a href='javascript:imprSelec("muestra")'>Imprimir</a>

</body>
</html>