<?php
session_start();
include('include/function.php');
include('header.php');
//mengecek apakah sudah login
if(!login())
{
	header('Location:index.php');
}

//proses menampilkan data
if($_GET && !$_POST)
{
	$id = $_GET['id'];
	
	$sql	= "SELECT * FROM tb_karyawan WHERE nik='$id'";
	$query	= mysql_query($sql) or die(mysql_error());
	$hasil	= mysql_fetch_array($query) or die(mysql_error());
}
elseif($_POST) //proses update data
{
	$nik				= $_POST['nik'];
	$nama				= $_POST['nama'];
	$jk					= $_POST['jk'];
	$email				= $_POST['email'];
	$nohp				= $_POST['nohp'];
	$ket				= $_POST['ket'];
	
	
	if($nik=='' || $nama =='')
	{
		$error_karyawan = 'Maaf, nik Wajib diisi';
	}
	else
	{
		
	
		$sql	= "UPDATE tb_karyawan SET nik='$nik',nama='$nama',jk='$jk',email='$email',nohp='$nohp',ket='$ket' WHERE nik=$nik";
		
		$query	= mysql_query($sql) or die(mysql_error());
		
		refresh('karyawan_list.php');
	}
}

?>
<?php include('sidebox.php'); ?>

<h3> Edit Data Karyawan</h3>
<?php

if(isset($error_karyawan))
{
	echo $error_karyawan;
}
?>
<form method="post" action="">
  <table width="200" border="0">
    <tr>
      <td>Nik</td>
      <td>:</td>
      <td><label>
        <input name="nik" type="text" id="nik" value="<?php echo $hasil['nik']; ?>" />
      </label></td>
    </tr>
	  <tr>
      <td>Nama Karyawan</td>
      <td>:</td>
      <td><label>
        <input name="nama" type="text" id="nama" value="<?php echo $hasil['nama']; ?>" />
      </label></td>
    </tr>
	   <td>Jenis Kelamin</td>
				<td align="center">:</td>
   			   <td> <input name="jk" type="radio" value="pria"
  			    <?php if($hasil['jk']=="pria")
				  print("checked");?>>Pria
 			     <input name="jk" type="radio" value="wanita"
  			    <?php if($hasil['jk']=="wanita")
				  print("checked");?>>Wanita
  			    </td>
  			  </tr>
	  <tr>
      <td>Email</td>
      <td>:</td>
      <td><label>
        <input name="email" type="text" id="email" value="<?php echo $hasil['email']; ?>" />
      </label></td>
    </tr>
	  <tr>
      <td>No Hp</td>
      <td>:</td>
      <td><label>
        <input name="nohp" type="text" id="no_hp" value="<?php echo $hasil['nohp']; ?>" />
      </label></td>
    </tr>
	  <tr>
      <td>Ket</td>
      <td>:</td>
      <td><label>
        <input name="ket" type="text" id="ket" value="<?php echo $hasil['ket']; ?>" />
      </label></td>
    </tr>
    <tr>
      <td><label>
        <input type="submit" name="Submit" value="Simpan" />
      </label></td>
      <td>&nbsp;</td>
      <td><input name="id" type="hidden" id="id" value="<?php echo $hasil['nik']; ?>"></td>
    </tr>
  </table>
</form>

<?php include('footer.php'); ?>