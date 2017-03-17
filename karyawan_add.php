<?php
session_start();
include('include/function.php');
include('header.php');
//mengecek apakah sudah login
if(!login())
{
	header('Location:index.php');
}

//proses input data kedatabase
if($_POST)
{
	$nik			= $_POST['nik'];
	$nama			= $_POST['nama'];
	$jk				= $_POST['jk'];
	$email			= $_POST['email'];
	$nohp			= $_POST['nohp'];
	$ket			= $_POST['ket'];
	//var_dump($_POST);
	

	if($nik =='' || $nama =='')
	{
		$error_karyawan = 'Maaf, nik Wajib diisi';
	}
	else
	{
	
		
		$sql	= "INSERT INTO `db_inventaris`.`tb_karyawan` (`nik`, `nama`, `jk`, `email`, `nohp`, `ket`) VALUES ('$nik', '$nama', '$jk', '$email', '$nohp', '$ket')";
						
		$query	= mysql_query($sql) or die(mysql_error());
		
		refresh('karyawan_list.php');
	}
}
?>
<?php include('sidebox.php'); ?>

<h3>Menambah Data Karyawan</h3>
<?php

if(isset($error_karyawan))
{
	echo $error_karyawan;
}
?>

<form method="post" action="">
  <table width="300" border="0">
    <tr>
      <td>Nik</td>
      <td>:</td>
      <td><label>
        <input name="nik" type="text" id="nik" />
      </label></td>
    </tr>
    <tr>
      <td>Nama Karyawan</td>
      <td>:</td>
      <td><label>
        <input name="nama" type="text" id="nama" />
      </label></td>
    </tr>
    <tr>
     			 <td>Jenis Kelamin</td>
     			  <td align="center">:</td>
       			 <td><input name="jk" type="radio" value="pria">Pria
      			  <input name="jk" type="radio" value="wanita" checked>Wanita
      		    </td>
  			  </tr>
    <tr>
      <td>Email</td>
      <td>:</td>
      <td><label>
        <input name="email" type="text" id="email" />
      </label></td>
    </tr>
    <tr>
      <td>No Hp</td>
      <td>:</td>
      <td><label>
        <input name="nohp" type="text" id="nohp" />
      </label></td>
    </tr>
    <tr>
      <td>Ket</td>
      <td>:</td>
      <td><label>
        <input name="ket" type="text" id="ket" />
      </label></td>
    </tr>
    <tr>
      <td><label>
        <input type="submit" name="Submit" value="Tambah" />
      </label></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>

<?php include('footer.php'); ?>