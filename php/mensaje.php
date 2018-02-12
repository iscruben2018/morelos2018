<?php
echo"
<script> $(function () { $('#myModal').modal({ keyboard: false })}); </script>

<div class='modal fade' id='myModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
<div class='modal-dialog'> <div class='modal-content'>
<div class='modal-header' style='background:url(../img/barranegra2.png);'>
<button type='button' class='close' data-dismiss='modal' aria-hidden='true' style='color:white;' onClick='carga();'> X </button>
<h4 class='modal-title' id='myModalLabel'>".$cabecera."</h4> </div>
<div class='modal-body' style='background:url(../img/madera.png);'>
".$mensaje."
</div>

<div class='modal-footer' style='background:url(../img/navabajo.png);'>
</div>";

?>
