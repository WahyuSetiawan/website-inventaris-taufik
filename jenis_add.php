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
	$jenis		= $_POST['jenis'];
	$satuan		= $_POST['satuan'];
	
	
	if($jenis=='' || $satuan=='')
	{
		$error_jenis= ' Maaf, Jenis Wajib diisi';
	}
	else
	{
		$sql	= "INSERT INTO tb_jenis(jenis,satuan) VALUES('$jenis','$satuan')";
		$query	= mysql_query($sql) or die(mysql_error());
		
		refresh('jenis_list.php');
	}
}
?>
<?php include('sidebox.php'); ?>

<h3>Menambah Data Jenis</h3>
<?php

if(isset($error_jenis))
{
	echo $error_jenis;
}
?>
<form method="post" action="">
  <table width="200" border="0">
    <tr>
      <td>Jenis</td>
      <td>:</td>
      <td><label>
        <input name="jenis" type="text" id="jenis" />
      </label></td>
    </tr>
    <tr>
      <td>Satuan</td>
      <td>:</td>
      <td><label>
        <input name="satuan" type="text" id="satuan" />
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