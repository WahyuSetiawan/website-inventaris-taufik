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
	$id_ruangan	= $_POST['id_ruangan'];
	$nama_pj 	= $_POST['nama_pj'];
	$nik		= $_POST['nik'];
	$ket		= $_POST['ket'];
	
	
	if($id_ruangan=='' || $nama_pj =='')
	{
		$error_pj = 'Maaf, id_ruangan dan nama_pj Wajib diisi';
	}
	else
	{
		$sql	= "INSERT INTO tb_pj(id_ruangan,nama_pj,nik,ket) VALUES('$id_ruangan','$nama_pj','$nik','$ket')";
		$query	= mysql_query($sql) or die(mysql_error());
		
		refresh('pj_list.php');
	}
}
?>
<?php include('sidebox.php'); ?>

<h3>Menambah Data Penanggung Jawab</h3>
<?php

if(isset($error_pj))
{
	echo $error_pj;
}
?>
<form method="post" action="">
  <table width="320" border="0">
      <tr>
      <td>Kode Ruangan</td>
      <td>:</td>
      <td><label>
      <select name="id_ruangan" id="id_ruangan">
	  <?php
	  	$sql_id_ruangan		= "SELECT * FROM tb_ruangan ORDER BY id_ruangan";
		$query_id_ruangan		= mysql_query($sql_id_ruangan) or die(mysql_error());
		
		while($id_ruangan = mysql_fetch_array($query_id_ruangan))
		{
	  ?>
        <option value="<?php echo $id_ruangan['id_ruangan']; ?>"><?php echo $id_ruangan['id_ruangan']; ?></option>
	  <?php
		}
	  ?>
      </select>
      </label></td>
    </tr>
     <tr>
      <td>Penanggung Jawab</td>
      <td>:</td>
      <td><label>
        <input name="nama_pj" type="text" id="nama_pj" />
      </label></td>
    </tr>
     <tr>
      <td>Nik</td>
      <td>:</td>
      <td><label>
        <input name="nik" type="text" id="nik" />
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