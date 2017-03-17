<?php
session_start();
include('include/function.php');

//mengecek apakah sudah login
if(!login())
{
	header('Location:index.php');
}

include('header.php'); 

//proses menampilkan data
if($_GET && !$_POST)
{
	$id = $_GET['id'];
	
	$sql	= "SELECT * FROM tb_detail WHERE id_detail=$id";
	$query	= mysql_query($sql) or die(mysql_error());
	$hasil	= mysql_fetch_array($query) or die(mysql_error());
}
elseif($_POST) //proses update data
{
	
	$id_pinjam				= $_POST['id_pinjam'];
	$id_barang				= $_POST['id_barang'];
	$nama_pinjam			= $_POST['nama_pinjam'];
	$nik					= $_POST['nik'];
	$nama_barang			= $_POST['nama_barang'];
	$tgl_pinjam	  			= $_POST['tgl_pinjam'];
	$tgl_kembali			= $_POST['tgl_kembali'];
	$jml 					= $_POST['jml'];
	$no_hp					= $_POST['no_hp'];
	$ket					= $_POST['ket'];
	
		if($id_pinjam =='' || $id_barang =='')
	{
		$error_detail = 'Maaf, id_pinjam dan id_barang Wajib diisi';
	}
	else
	{
		
			
			$sql ="UPDATE tb_detail SET id_pinjam='".$_POST['id_pinjam']."', id_barang='".$_POST['id_barang']."' nama_pinjam= '".$_POST['nama_pinjam']."', tgl_pinjam='".$_POST['tgl_pinjam']."', nama_barang='".$_POST['nama_barang']."', jml='".$_POST['jml']."', ket='".$_POST['ket']."' WHERE id_pinjam = '".$_GET['id_pinjam']."'";
		
	
		
		$query	= mysql_query($sql) or die(mysql_error());
		
		refresh('detail_list.php');
	}
}
?>
<?php include('sidebox.php'); ?>

<h3>Edit Detail</h3>

<?php
if(isset($error_detail))
{
	echo $error_detail;
}
?>
<form method="post" action="">
  <table width="300" border="0">
    <tr>
      <td>Id Pinjam</td>
      <td>:</td>
      <td><label>
        <input name="id_pinjam" type="text" id="id_pinjam" value="<?php echo $hasil['id_pinjam']; ?>" />
      </label></td>
    </tr>
	 <tr>
      <td>Id Barang</td>
      <td>:</td>
      <td><label>
        <input name="id_barang" type="text" id="id_barang" value="<?php echo $hasil['id_barang']; ?>" />
      </label></td>
    </tr>
     <tr>
      <td>Nama Pinjam</td>
      <td>:</td>
      <td><label>
        <input name="nama_pinjam" type="text" id="nama_pinjam" value="<?php echo $hasil['nama_pinjam']; ?>" />
      </label></td>
    </tr>
	  <tr>
      <td>Nik</td>
      <td>:</td>
      <td><label>
        <input name="nik" type="text" id="nik" value="<?php echo $hasil['nik']; ?>" />
      </label></td>
    </tr>
	  <tr>
      <td>Barang</td>
      <td>:</td>
      <td><label>
        <input name="nama_barang" type="text" id="nama_barang" value="<?php echo $hasil['nama_barang']; ?>" />
      </label></td>
    </tr>
    <tr>
     <td>Tgl Pinjam</td>
      <td>:</td>
      <td><label>
        <input name="tgl_pinjam" type="date" id="tgl_pinjam" value="<?php echo $hasil['tgl_pinjam']; ?> " />
      </label></td>
    </tr>
    <tr>
      <td>Tgl Kembali</td>
      <td>:</td>
      <td><label>
        <input name="nama_barang" type="date" id="nama_barang" value="<?php echo $hasil['nama_barang']; ?>" />
      </label></td>
    </tr>
    <tr>
      <td>Jumlah</td>
      <td>:</td>
      <td><label>
        <input name="jml" type="text" id="jml" value="<?php echo $hasil['jml']; ?>" />
      </label></td>
    </tr>
	  <tr>
      <td>No Hp/td>
      <td>:</td>
      <td><label>
        <input name="no_hp" type="text" id="no_hp" value="<?php echo $hasil['no_hp']; ?>" />
      </label></td>
    </tr>
    <tr>
      <td>Keterangan</td>
      <td>:</td>
      <td><label>
      <select name="ket" id="ket">
	  <?php
	  	$sql_status		= "SELECT * FROM tb_status ORDER BY status";
		$query_status		= mysql_query($sql_status) or die(mysql_error());
		
		while($status = mysql_fetch_array($query_status))
		{
	  ?>
        <option value="<?php echo $status['status']; ?>"><?php echo $status['status']; ?></option>
	  <?php
		}
	  ?>
      </select>
      </label></td>
    </tr>
    <tr>
      <td><label>
        <input type="submit" name="Submit" value="Simpan" />
      </label></td>
      <td>&nbsp;</td>
      <td><input name="id" type="hidden" kd="id" value="<?php echo $hasil['id_detail']; ?>"></td>
    </tr>
  </table>
</form>

<?php include('footer.php'); ?>