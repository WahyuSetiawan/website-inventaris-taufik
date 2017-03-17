<?php
session_start();
include('include/function.php');

if(!login())
{
	header('Location:index.php');
}
?>

<?php include('header.php'); ?>
<?php include('sidebox.php'); ?>

<script type="text/javascript" src="fancybox/jquery-1.4.3.min.js"></script>
<script type="text/javascript" src="fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<link href="fancybox/jquery.fancybox-1.3.4.css" type="text/css" rel="stylesheet"/>
<script type="text/javascript">
$(document).ready(function(){
	$(".fancy").fancybox();
	});
</script>

<h3>Manajemen Inventaris Barang</h3>
<a href="barang_add.php">Tambah Data</a>

<?php

$sql	= "Select * from tb_barang b join tb_jenis j on b.id_jenis=j.id_jenis join tb_status s on s.id_status=b.id_status join tb_ruangan rn on rn.id_ruangan=b.id_ruangan";
/*
$sql	= "Select * from tb_barang b join tb_jenis j on b.id_jenis=j.id_jenis join tb_status s on s.id_status=b.id_status join tb_ruangan rn on rn.id_ruangan=b.id_ruangan by id_ruangan";							
*/
$query	= mysql_query($sql) or die(mysql_error());

?>
<table width="705" border="0" bgcolor="#000000">
  <tr>
    <td bgcolor="#FFFFFF"><center>No</center></td>
    <td bgcolor="#FFFFFF"><center>Id Barang</center></td>
    <td bgcolor="#FFFFFF"><center>Nama Barang</center></td>
    <td bgcolor="#FFFFFF"><center>No Seri Pabrik</center></td>
	<td bgcolor="#FFFFFF"><center>Tgl Masuk</center></td>
    <td bgcolor="#FFFFFF"><center>Jenis</center></td>
    <td bgcolor="#FFFFFF"><center>Status</center></td>
    <td bgcolor="#FFFFFF"><center>Ruangan</center></td>
    <td bgcolor="#FFFFFF"><center>Harga Beli</center></td>
	<td bgcolor="#FFFFFF"><center>Gambar</center></td>
	<td bgcolor="#FFFFFF"><center>Jumlah</center></td>
    <td bgcolor="#FFFFFF"><center>ket</center></td>
	<td bgcolor="#FFFFFF"><center>Aksi</center></td>
  </tr>
  
  <?php
  $no = 1;
  while($hasil = mysql_fetch_array($query))
  {
  ?>
  <tr>
    <td height="80" bgcolor="#FFFFFF"><center><?php echo $no++; ?></td></center>
    <td bgcolor="#FFFFFF"><center><?php echo $hasil['id_barang']; ?></td></center>
	<td bgcolor="#FFFFFF"><center><?php echo $hasil['nama']; ?></td></center>
    <td bgcolor="#FFFFFF"><center><?php echo $hasil['no_seri_pabrik']; ?></td></center>
    <td bgcolor="#FFFFFF"><center><?php echo $hasil['tgl_masuk']; ?></td></center>
	<td bgcolor="#FFFFFF"><center><?php echo $hasil['jenis']; ?></td></center>
    <td bgcolor="#FFFFFF"><center><?php echo $hasil['status']; ?></td></center>
    <td bgcolor="#FFFFFF"><center><?php echo $hasil['ruangan']; ?></td></center>
    <td bgcolor="#FFFFFF"><center><?php echo $hasil['harga_beli']; ?></td></center>
   <td bgcolor="#FFFFFF"><center> <a href="photo/<?php echo $hasil['gambar']; ?>" title="<?php echo $hasil['nama_file']; ?>" class="fancy">
                <img src="photo/<?php echo $hasil['gambar']; ?>" title="<?php echo $hasil['nama_file']; ?>" width="75" border="0" />
                </a></td></center>
				
    <td bgcolor="#FFFFFF"><center><?php echo $hasil['jml']; ?></td></center>            
				
    <td bgcolor="#FFFFFF"><center><?php echo $hasil['ket']; ?></td></center>
	<td bgcolor="#FFFFFF"><center><a href="barang_edit.php?id=<?php echo $hasil['id_barang']; ?>"><img src="image/tombol_edit.png" /></a> | <a href="barang_del.php?id=<?php echo $hasil['id_barang']; ?>"><img src="image/tombol_delete.png" onclick="return confirm('Anda yakin ingin menghapus data ini') "/></a></td></center>
  </tr>
  <?php
  }
  ?>
</table>
<?php include('footer.php'); ?>