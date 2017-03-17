<?php

include('include/koneksi.php');
include('include/function.php');

$id 	= $_GET['id'];
$sql	= "DELETE FROM tb_pj WHERE id_pj=$id";
$query	= mysql_query($sql) or die(mysql_error());

refresh('pj_list.php');

?>