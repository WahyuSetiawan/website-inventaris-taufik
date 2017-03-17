<?php

include('include/koneksi.php');
include('include/function.php');

$id 	= $_GET['id'];
$sql	= "DELETE FROM tb_jenis WHERE id_jenis=$id";
$query	= mysql_query($sql) or die(mysql_error());

refresh('jenis_list.php');

?>