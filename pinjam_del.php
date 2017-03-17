<?php

include('include/koneksi.php');
include('include/function.php');

$id 	= $_GET['id'];
$sql	= "DELETE FROM tb_pinjam WHERE id_pinjam='$id'";
$query	= mysql_query($sql) or die(mysql_error());

refresh('pinjam_list.php');

?>