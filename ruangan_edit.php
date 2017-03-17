<?php include('header.php'); ?>
<?php include('sidebox.php'); ?>

<h3> Edit Data Ruangan</h3>
<?php

//proses menampilkan data
if($_GET && !$_POST)
{
	$id = $_GET['id'];
	
	$sql	= "SELECT * FROM tb_ruangan WHERE id_ruangan=$id";
	$query	= mysql_query($sql) or die(mysql_error());
	$hasil	= mysql_fetch_array($query) or die(mysql_error());
}
elseif($_POST) //proses update data
{
	$id			= $_POST['id'];
	$id_ruangan	= $_POST['id_ruangan'];
	$ruangan	= $_POST['ruangan'];
	$ket		= $_POST['ket'];
	
	if($ruangan=='' || $ruangan=='')
	{
		$error_ruangan = 'Maaf, ruangan Wajib diisi';
	}
	else
	{
		$sql	= "UPDATE tb_ruangan SET id_ruangan='$id_ruangan',ruangan='$ruangan',ket='$ket'WHERE id_ruangan=$id";
		
		$query	= mysql_query($sql) or die(mysql_error());
		
		refresh('ruangan_list.php');
	}
}


if(isset($error_ruangan))
{
	echo $error_ruangan;
}
?>
<form method="post" action="">
  <table width="300" border="0">
    <tr>
      <td>Kode Ruangan</td>
      <td>:</td>
      <td><label>
        <input name="id_ruangan" type="text" id="id_ruangan" value="<?php echo $hasil['id_ruangan']; ?>" />
      </label></td>
    </tr>
     <tr>
      <td>Ruangan</td>
      <td>:</td>
      <td><label>
        <input name="ruangan" type="text" id="ruangan" value="<?php echo $hasil['ruangan']; ?>" />
      </label></td>
    </tr>
    <tr>
      <td>Satuan</td>
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
      <td><input name="id" type="hidden" id="id" value="<?php echo $hasil['id_ruangan']; ?>"></td>
    </tr>
  </table>
</form>

<?php include('footer.php'); ?>