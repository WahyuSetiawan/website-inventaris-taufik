<?php include('header.php'); ?>
<?php include('sidebox.php'); ?>

<h3>Menambah Data Ruangan</h3>
<?php

//proses input data kedatabase
if($_POST)
{
	$id_ruangan 	= $_POST['id_ruangan'];
	$ruangan		= $_POST['ruangan'];
	$ket			= $_POST['ket'];
	
	
	if($ruangan=='' || $ket =='')
	{
		$error_ruangan = 'Maaf, id_ruangan dan ruangan Wajib diisi';
	}
	else
	{
		$sql	= "INSERT INTO tb_ruangan(id_ruangan,ruangan,ket) VALUES('$id_ruangan','$ruangan','$ket')";
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
  <table width="200" border="0">
   <tr>
      <td>Kode Ruangan</td>
      <td>:</td>
      <td><label>
        <input name="id_ruangan" type="text" id="id_ruangan" />
      </label></td>
    </tr>
    <tr>
      <td>Ruangan</td>
      <td>:</td>
      <td><label>
        <input name="ruangan" type="text" id="ruangan" />
      </label></td>
    </tr>
    <tr>
      <td>Ket</td>
      <td>:</td>
      <td><label>
        <textarea name="ket" type="text" id="ket" /></textarea>
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