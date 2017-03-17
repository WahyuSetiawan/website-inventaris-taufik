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
	
	$sql	= "SELECT * FROM tb_pinjam join tb_karyawan on tb_karyawan.nik = tb_pinjam.nik join tb_detail on tb_detail.id_pinjam = tb_pinjam.id_pinjam join tb_barang on tb_barang.id_barang=tb_detail.id_barang WHERE tb_pinjam.id_pinjam='$id'";
	$query	= mysql_query($sql) or die(mysql_error());
	$hasil	= mysql_fetch_array($query) or die(mysql_error());
}
elseif(isset($_POST['Submit'])) //proses update data
{
/*echo '<pre>';
var_dump($_POST);
echo '</pre>';*/
	$id_pinjam				= $_POST['id_pinjam'];
	$id_barang				= $_POST['id_barang'];
	$nama_pinjam			= $_POST['nama_pinjam'];
	$nik					= $_POST['nik'];
	$nama_barang			= $_POST['nama_barang'];
	$tgl_pinjam	  			= $_POST['tgl_pinjam'];
	$tgl_kembali			= $_POST['tgl_kembali'];
	$no_hp					= $_POST['no_hp'];
	$keterangan				= $_POST['keterangan'];

	if($id_pinjam=='')
	{
		$error_pinjam = 'Maaf,id_pinjam Wajib diisi';
	}
	else
	{
		
		$sql ="UPDATE tb_pinjam SET id_pinjam='".$id_pinjam."', id_barang= '".$id_barang."', nama_pinjam='".$nama_pinjam."', nik='".$nik."', nama_barang='".$nama_barang."',tgl_pinjam='".$tgl_pinjam."', tgl_kembali='".$tgl_kembali."', jml='".$jml."'no_hp='".$no_hp."',keterangan='".$keterangan. "' WHERE id_pinjam = '".$id_pinjam."'";
		
		echo $sql;
		$query	= mysql_query($sql) or die($sql);
	//Jika berhasil	
		header("location:pinjam_list.php");
		echo "Data telah tersimpan";
		/*refresh('pinjam_list.php');*/
		}
}
?>
<?php include('sidebox.php'); ?>

<h3>Edit Pinjam</h3>

<?php

if(isset($error_pinjam))
{
	echo $error_pinjam;
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
        <input name="nama_pinjam" type="text" id="nama_pinjam" value="<?php echo $hasil[5]; ?>" />
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
        <input name="nama_barang" type="text" id="nama_barang" value="<?php echo $hasil['nama']; ?>" />
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
        <input name="tgl_kembali" type="date" id="tgl_kembali" value="<?php echo $hasil['tgl_kembali']; ?>" />
      </label></td>
    </tr>
	  <tr>
      <td>No Hp</td>
      <td>:</td>
      <td><label>
        <input name="no_hp" type="text" id="no_hp" value="<?php echo $hasil['nohp']; ?>" />
      </label></td>
    </tr>
    <tr>
      <td>Keterangan</td>
      <td>:</td>
      <td><label>
      <select name="keterangan">
	  <option>Dipinjam</option>
	  <option>Dikembalikan</option>
	  </select>
      </label></td>
    </tr>
    <tr>
      <td><label>
        <input type="submit" name="Submit" value="Simpan" />
      </label></td>
      <td>&nbsp;</td>
      <td><input name="id" type="hidden" kd="id" value="<?php echo $hasil['id_pinjam']; ?>"></td>
    </tr>
  </table>
</form>

<?php include('footer.php'); ?>