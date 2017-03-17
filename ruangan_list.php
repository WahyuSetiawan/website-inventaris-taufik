
<?php include('header.php'); ?>
<?php include('sidebox.php'); ?>

<h3>Manajemen Ruangan</h3>
<a href="ruangan_add.php">Tambah Data</a>
<br /><br />
<?php
$sql	= "SELECT * FROM tb_ruangan ORDER BY id_ruangan DESC";
$query	= mysql_query($sql) or die(mysql_error());
?>
<table width="472" border="0" bgcolor="#000000">
  <tr>
    <td width="34" bgcolor="#FFFFFF"><center>No</center></td>
    <td width="99" bgcolor="#FFFFFF"><center>Kode Ruangan</center></td>
    <td width="134" bgcolor="#FFFFFF"><center>Ruangan</center></td>
    <td width="134" bgcolor="#FFFFFF"><center>Ket</center></td>
	<td width="49" bgcolor="#FFFFFF"><center>Aksi</center></td>
  </tr>
  <?php
  $no = 1;
  while($hasil = mysql_fetch_array($query))
  {
  ?>
  <tr>
    <td bgcolor="#FFFFFF"><center><?php echo $no++; ?></center></td>
    <td bgcolor="#FFFFFF"><center><?php echo $hasil['id_ruangan']; ?></center></td>
    <td bgcolor="#FFFFFF"><center><?php echo $hasil['ruangan']; ?></center></td>
    <td bgcolor="#FFFFFF"><center><?php echo $hasil['ket']; ?></center></td>
	<td bgcolor="#FFFFFF"><center><a href="ruangan_edit.php?id=<?php echo $hasil['id_ruangan']; ?>"><img src="image/tombol_edit.png"/></a> | <a href="ruangan_del.php?id=<?php echo $hasil['id_ruangan']; ?>"><img src="image/tombol_delete.png" onclick="return confirm('Anda yakin ingin menghapus data ini')"/></a></center></td>
  </tr>
  <?php
  }
  ?>
</table>
<?php include('footer.php'); ?>