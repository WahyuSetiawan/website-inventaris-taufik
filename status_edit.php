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
	
	$sql	= "SELECT * FROM tb_status WHERE id_status=$id";
	$query	= mysql_query($sql) or die(mysql_error());
	$hasil	= mysql_fetch_array($query) or die(mysql_error());
}
elseif($_POST) //proses update data
{
	$id		= $_POST['id'];
	$status	= $_POST['status'];
	
	
	if($status=='' || $status =='')
	{
		$error_status = 'Maaf, status Wajib diisi';
	}
	else
	{
		$sql	= "UPDATE tb_status SET status='$status'WHERE id_status=$id";
		
		$query	= mysql_query($sql) or die(mysql_error());
		
		refresh('status_list.php');
	}
}

?>
<?php include('sidebox.php'); ?>

<h3> Edit Data Status</h3>
<?php

if(isset($error_status))
{
	echo $error_status;
}
?>
<form method="post" action="">
  <table width="200" border="0">
    <tr>
      <td>Status</td>
      <td>:</td>
      <td><label>
        <input name="status" type="text" id="status" value="<?php echo $hasil['status']; ?>" />
      </label></td>
    </tr>
    <tr>
      <td><label>
        <input type="submit" name="Submit" value="Simpan" />
      </label></td>
      <td>&nbsp;</td>
      <td><input name="id" type="hidden" id="id" value="<?php echo $hasil['id_status']; ?>"></td>
    </tr>
  </table>
</form>

<?php include('footer.php'); ?>