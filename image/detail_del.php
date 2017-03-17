<?php

include('include/koneksi.php');
include('include/function.php');

$id 	= $_GET['id'];
$sql	= "DELETE FROM tb_detail WHERE id_detail=$id";
$query	= mysql_query($sql) or die(mysql_error());

refresh('detail_list.php');

?>