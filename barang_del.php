<?php

include('include/koneksi.php');
include('include/function.php');

$id 	= $_GET['id'];
$sql	= "DELETE FROM tb_barang WHERE id_barang='$id'";
$query	= mysql_query($sql) or die(mysql_error());

refresh('barang_list.php');

?>