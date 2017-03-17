<?php
include('include/koneksi.php');
$id=$_GET['id'];
$hapus=mysql_query("DELETE FROM tb_gallery WHERE id_foto='$id'");
if($hapus){
	header("location: gallery_list.php");
}
?>