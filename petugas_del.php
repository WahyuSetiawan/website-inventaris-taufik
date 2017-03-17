<?php

include('include/koneksi.php');
include('include/function.php');

$id 	= $_GET['id'];
$sql	= "DELETE FROM tb_admin WHERE id_admin=$id";
$query	= mysql_query($sql) or die(mysql_error());

refresh('petugas_list.php');

?>