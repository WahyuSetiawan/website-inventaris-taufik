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

<h3>Manajemen Penanggung Jawab</h3>
<a href="pj_add.php">Tambah Data</a>
<br /><br />
<?php
$sql	= "SELECT * FROM tb_pj ORDER BY id_pj DESC";
$query	= mysql_query($sql) or die(mysql_error());
?>
<table width="694" border="0" bgcolor="#000000">
  <tr>
    <td width="37" bgcolor="#FFFFFF"><center>No</center></td>
    <td width="107" bgcolor="#FFFFFF"><center>Kode Ruangan</center></td>
    <td width="199" bgcolor="#FFFFFF"><center>Penanggung Jawab</center></td>
    <td width="149" bgcolor="#FFFFFF"><center>Nik</center></td>
    <td width="115" bgcolor="#FFFFFF"><center>Ket</center></td>
	<td width="61" bgcolor="#FFFFFF"><center>Aksi</center></td>
  </tr>
  <?php
  $no = 1;
  while($hasil = mysql_fetch_array($query))
  {
  ?>
  <tr>
    <td bgcolor="#FFFFFF"><center><?php echo $no++; ?></center></td>
    <td bgcolor="#FFFFFF"><center><?php echo $hasil['id_ruangan']; ?></center></td>
    <td bgcolor="#FFFFFF"><center><?php echo $hasil['nama_pj']; ?></center></td>
    <td bgcolor="#FFFFFF"><center><?php echo $hasil['nik']; ?></center></td>
    <td bgcolor="#FFFFFF"><center><?php echo $hasil['ket']; ?></center></td>
	<td bgcolor="#FFFFFF"><center><a href="pj_edit.php?id=<?php echo $hasil['id_pj']; ?>"><img src="image/tombol_edit.png"/></a> | <a href="pj_del.php?id=<?php echo $hasil['id_pj']; ?>"><img src="image/tombol_delete.png" onClick="return confirm('Anda yakin ingin menghapus data ini')"/></a></center></td>
  </tr>
  <?php
  }
  ?>
</table>
<?php include('footer.php'); ?>