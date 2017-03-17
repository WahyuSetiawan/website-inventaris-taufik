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

<h3>Manajemen Jenis</h3>
<a href="jenis_add.php">Tambah Data</a>
<br /><br />
<?php
$sql	= "SELECT * FROM tb_jenis ORDER BY id_jenis DESC";
$query	= mysql_query($sql) or die(mysql_error());
?>
<table width="400" border="0" bgcolor="#000000">
  <tr>
    <td width="41" bgcolor="#FFFFFF"><center>No</center></td>
    <td width="167" bgcolor="#FFFFFF"><center>Nama Jenis</center></td>
    <td width="114" bgcolor="#FFFFFF"><center>satuan</center></td>
	<td width="60" bgcolor="#FFFFFF"><center>Aksi</center></td>
  </tr>
  <?php
  $no = 1;
  while($hasil = mysql_fetch_array($query))
  {
  ?>
  <tr>
    <td bgcolor="#FFFFFF"><center><?php echo $no++; ?></center></td>
    <td bgcolor="#FFFFFF"><center><?php echo $hasil['jenis']; ?></center></td>
    <td bgcolor="#FFFFFF"><center><?php echo $hasil['satuan']; ?></center></td>
	<td bgcolor="#FFFFFF"><center><a href="jenis_edit.php?id=<?php echo $hasil['id_jenis']; ?>"><img src="image/tombol_edit.png"/></a> | <a href="jenis_del.php?id=<?php echo $hasil['id_jenis']; ?>"><img src="image/tombol_delete.png" onclick="return confirm('Anda yakin ingin menghapus data ini')"/></a></center></td>
  </tr>
  <?php
  }
  ?>
</table>
<?php include('footer.php'); ?>