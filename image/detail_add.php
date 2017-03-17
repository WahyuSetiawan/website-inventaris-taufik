<?php include('header.php'); ?>
<?php include('sidebox.php'); ?>

<h3>Menambah Data Detail Pinjam</h3>
<?php
//proses input data kedatabase
if($_POST)
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
		$sql 	= "INSERT INTO tb_detail (id_pinjam,id_barang,nama_pinjam,nik,nama_barang,tgl_pinjam,tgl_kembali,jml,no_hp,ket) VALUES ('$id_pinjam','$id_barang','$nama_pinjam','$nik','$nama_barang','$tgl_pinjam','$tgl_kembali','$jml','$no_hp','$ket')";
		
		
		$query	= mysql_query($sql) or die(mysql_error());
		
		
		refresh('detail_list.php');
	}
}


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
        <input name="id_pinjam" type="text" id="id_pinjam" />
      </label></td>
    </tr>
	  <tr>
      <td>Id Barang</td>
      <td>:</td>
      <td><label>
        <input name="id_barang" type="text" id="id_barang" />
      </label></td>
    </tr>
    <tr>
      <td>Nama Pinjam</td>
      <td>:</td>
      <td><label>
        <input name="nama_pinjam" type="text" id="nama_pinjam" />
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
      <td>Barang</td>
      <td>:</td>
      <td><label>
        <input name="nama_barang" type="text" id="nama_barang" />
      </label></td>
    </tr>
    <tr>
     <td>Tgl Pinjam</td>
      <td>:</td>
      <td><label>
        <input name="tgl_pinjam" type="date" id="tgl_pinjam" />
      </label></td>
      </tr>
	   <tr>
      <td>Tgl Kembali</td>
      <td>:</td>
      <td><label>
        <input name="tgl_kembali" type="date" id="tgl_kembali" />
      </label></td>
    </tr>
     
    <tr>
      <td>Jumlah</td>
      <td>:</td>
      <td><label>
        <input name="jml" type="text" id="jml" />
      </label></td>
    </tr>
	 <tr>
      <td>No Hp</td>
      <td>:</td>
      <td><label>
        <input name="no_hp" type="text" id="no_hp" />
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
        <input type="submit" name="Submit" value="Tambah" />
      </label></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>

<?php include('footer.php'); ?>