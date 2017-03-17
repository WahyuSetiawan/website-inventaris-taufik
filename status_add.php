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
	$status	= $_POST['status'];
	
	
	
	if($status=='' || $status =='')
	{
		$error_status = 'Maaf, status Wajib diisi';
	}
	else
	{
		$sql	= "INSERT INTO tb_status(status) VALUES('$status')";
		$query	= mysql_query($sql) or die(mysql_error());
		
		refresh('status_list.php');
	}
}

?>
<?php include('sidebox.php'); ?>

<h3>Menambah Data Status</h3>
<?php

if(isset($error_status))
{
	echo $error_status;
}
?>
<form method="post" action="">
  <table width="200" border="0">
    <tr>
      <td>status</td>
      <td>:</td>
      <td><label>
        <input name="status" type="text" id="status" />
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