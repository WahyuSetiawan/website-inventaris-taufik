<?php

include('include/koneksi.php');
include('include/function.php');

$id 	= $_GET['id'];
$sql	= "DELETE FROM tb_ruangan WHERE id_ruangan=$id";
$query	= mysql_query($sql) or die(mysql_error());

refresh('ruangan_list.php');

?>