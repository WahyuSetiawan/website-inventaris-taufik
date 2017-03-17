<?php
include('include/koneksi.php');
$judul=$_POST['judul'];
$file = $_FILES['foto']['name'];
if(!empty($file)){
	$move = move_uploaded_file($_FILES['foto']['tmp_name'], 'photo/'.$file);
//	if($move){
		$query=mysql_query("INSERT INTO tb_gallery (nama_file,judul_foto,waktu) VALUES('$file','$judul',NOW())");
		if($query){
			header("location: gallery_list.php");
		}
//	}
}

?>