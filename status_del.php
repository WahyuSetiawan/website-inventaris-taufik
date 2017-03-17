<?php

include('include/koneksi.php');
include('include/function.php');

$id 	= $_GET['id'];
$sql	= "DELETE FROM tb_status WHERE id_status=$id";
$query	= mysql_query($sql) or die(mysql_error());

refresh('status_list.php');

?>