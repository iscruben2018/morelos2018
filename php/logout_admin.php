<?php
session_start();

session_destroy();

echo "<script>window.location='../usuarios/admin/';</script>";
?>
<h2 align="center">Cargando...</h2><br><br>
<div align="center">
<img src='../images/loading.gif'>
</div>
