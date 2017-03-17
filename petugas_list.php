
<?php include('header.php'); ?>
<?php include('sidebox.php'); ?>

<h3>Manajemen Karyawan</h3>
<a href="petugas_add.php">Tambah Data Petugas</a>
<br /><br />
<?php
$sql	= "SELECT * FROM tb_admin join tb_petugas on tb_admin.id_petugas = tb_petugas.id_petugas ORDER BY id_admin DESC";
$query	= mysql_query($sql) or die(mysql_error());
?>
<table width="650" border="0" bgcolor="#000000">
  <tr>
    <td width="29" bgcolor="#FFFFFF"><center>No</center></td>
    <td width="65" bgcolor="#FFFFFF"><center>Nama</center></td>
    <td width="72" bgcolor="#FFFFFF"><center>Password</center></td>
    <td width="90" bgcolor="#FFFFFF"><center>Nik</center></td>
    <td width="71" bgcolor="#FFFFFF"><center>Jenis Kelamin</center></td>
    <td width="118" bgcolor="#FFFFFF"><center>No Hp</center></td>
    <td width="79" bgcolor="#FFFFFF"><center>Level</center></td>
	<td width="45" bgcolor="#FFFFFF"><center>Aksi</center></td>
  </tr>
  
  <?php
  $no = 1;
  while($hasil = mysql_fetch_array($query))
  {
  ?>
  <tr>
    <td bgcolor="#FFFFFF"><center><?php echo $no++; ?></center></td>
    <td bgcolor="#FFFFFF"><?php echo $hasil['username']; ?></td>
    <td bgcolor="#FFFFFF"><?php echo $hasil['password']; ?></td>
    <td bgcolor="#FFFFFF"><?php echo $hasil['nik']; ?></td>
    <td bgcolor="#FFFFFF"><?php echo $hasil['jk']; ?></td>
    <td bgcolor="#FFFFFF"><?php echo $hasil['no_hp']; ?></td>
    <td bgcolor="#FFFFFF"><center><?php echo $hasil['level_petugas']; ?></center></td>
	<td bgcolor="#FFFFFF"><center><a href="petugas_edit.php?id=<?php echo $hasil['id_admin']; ?>"><img src="image/tombol_edit.png" /></a> | 
    <a href="petugas_del.php?id=<?php echo $hasil['id_admin']; ?>"> <img src="image/tombol_delete.png" onclick="return confirm('Anda yakin ingin menghapus data ini')"/></a></center></td>
  </tr>
  <?php
  }
  ?>
</table>
<?php include('footer.php'); ?>