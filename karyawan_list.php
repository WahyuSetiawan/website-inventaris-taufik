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

<h3>Manajemen Karyawan</h3>
<a href="karyawan_add.php">Tambah Data</a>
<br /><br />
<?php
$sql	= "SELECT * FROM tb_karyawan ORDER BY nik DESC";
$query	= mysql_query($sql) or die(mysql_error());
?>
<table width="707" border="0" bgcolor="#000000">
  <tr>
    <td width="27" bgcolor="#FFFFFF"><center>No</center></td>
    <td width="55" bgcolor="#FFFFFF"><center>Nik</center></td>
    <td width="81" bgcolor="#FFFFFF"><center>Nama Karyawan</center></td>
    <td width="77" bgcolor="#FFFFFF"><center>Jenis Kelamin</center></td>
    <td width="73" bgcolor="#FFFFFF"><center>Email</center></td>
    <td width="73" bgcolor="#FFFFFF"><center>No Hp</center></td>
    <td width="73" bgcolor="#FFFFFF"><center>Ket</center></td>
    <td width="46" bgcolor="#FFFFFF"><center>Aksi</center></td>
  </tr>
  
  <?php
  $no = 1;
  while($hasil = mysql_fetch_array($query))
  {
  //var_dump($hasil);
  ?>
  
  <tr>
    <td bgcolor="#FFFFFF"><center><?php echo $no++; ?></td>
    <td bgcolor="#FFFFFF"><center><?php echo $hasil['nik']; ?></center></td>
    <td bgcolor="#FFFFFF"><center><?php echo $hasil['nama']; ?></center></td>
    <td bgcolor="#FFFFFF"><center><?php echo $hasil['jk']; ?></center></td>
    <td bgcolor="#FFFFFF"><center><?php echo $hasil['email']; ?></center></td>    
    <td bgcolor="#FFFFFF"><center><?php echo $hasil['nohp']; ?></center></td>
    <td bgcolor="#FFFFFF"><center><?php echo $hasil['ket']; ?></center></td>
   
	<td bgcolor="#FFFFFF"><center><a href="karyawan_edit.php?id=<?php echo $hasil['nik']; ?>"><img src="image/tombol_edit.png" /></a> | <a href="karyawan_del.php?id=<?php echo $hasil['nik']; ?>"><img src="image/tombol_delete.png"  onclick="return confirm('Anda yakin ingin menghapus data ini') "/></a></center></td>
  </tr>
  <?php
  }
  ?>
</table>
<?php include('footer.php'); ?>