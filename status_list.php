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

<h3>Manajemen Status</h3>
<a href="status_add.php">Tambah Data</a>
<br /><br />
<?php
$sql	= "SELECT * FROM tb_status ORDER BY id_status DESC";
$query	= mysql_query($sql) or die(mysql_error());
?>
<table width="259" border="0" bgcolor="#000000">
  <tr>
    <td width="30" bgcolor="#FFFFFF"><center>No</center></td>
    <td width="158" bgcolor="#FFFFFF"><center>Status</center></td>
	<td width="57" bgcolor="#FFFFFF"><center>Aksi</center></td>
  </tr>
  <?php
  $no = 1;
  while($hasil = mysql_fetch_array($query))
  {
  ?>
  <tr>
    <td bgcolor="#FFFFFF"><center><?php echo $no++; ?></center></td>
    <td bgcolor="#FFFFFF"><center><?php echo $hasil['status']; ?></center></td>
	<td bgcolor="#FFFFFF"><center><a href="status_edit.php?id=<?php echo $hasil['id_status']; ?>"><img src="image/tombol_edit.png"/></a> | <a href="status_del.php?id=<?php echo $hasil['id_status']; ?>"><img src="image/tombol_delete.png" onclick="return confirm('Anda yakin ingin menghapus data ini')"/></a></center></td>
  </tr>
  <?php
  }
  ?>
</table>
<?php include('footer.php'); ?>