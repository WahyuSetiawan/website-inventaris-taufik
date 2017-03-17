<?php

include('include/koneksi.php');
include('include/function.php');

$id 	= $_GET['id'];
$sql	= "DELETE FROM tb_karyawan WHERE nik='$id'";
$query	= mysql_query($sql) or die(mysql_error());

refresh('karyawan_list.php');

?>