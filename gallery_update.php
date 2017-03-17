<?php
include('include/koneksi.php');
$id=$_POST['id'];
$judul=$_POST['judul'];
$file = $_FILES['foto']['name'];
if(!empty($file)){
	$move = move_uploaded_file($_FILES['foto']['tmp_name'], 'photo/'.$file);
	if($move){
		$query=mysql_query("UPDATE tb_gallery SET nama_file='$file', judul_foto='$judul' WHERE id_foto='$id'");
		if($query){
			header("location: gallery_list.php");
		}
	}
}
else{
	$query=mysql_query("UPDATE tb_gallery SET judul_foto='$judul' WHERE id_foto='$id'");
	if($query){
		header("location: gallery_list.php");
	}
}
?>