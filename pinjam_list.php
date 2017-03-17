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

<h3>Manajemen pinjam</h3>
<a href="pinjam_add.php">Tambah Data</a>
<br /><br />
<?php
$sql	= "SELECT * FROM tb_pinjam p join tb_karyawan k on p.nik=k.nik  ORDER BY id_pinjam DESC";
$query	= mysql_query($sql) or die(mysql_error());
?>
<table width="702" border="0" bgcolor="#000000">
  <tr>
    <td width="37" bgcolor="#FFFFFF"><center>No</center></td>
    <td width="93" bgcolor="#FFFFFF"><center>Id Pinjam</center></td>
	<td width="110" bgcolor="#FFFFFF"><center>Nik</center></td>
	  <td width="93" bgcolor="#FFFFFF"><center>Nama</center></td>
    <td width="110" bgcolor="#FFFFFF"><center>Tgl Pinjam</center></td>
    <td width="103" bgcolor="#FFFFFF"><center>Tgl Kembali</center></td>
	<td width="102" bgcolor="#FFFFFF"><center>Aksi</center></td>
  </tr>
  
  <?php
  $no = 1;
  while($hasil = mysql_fetch_array($query))
  {
  ?>
  
  <tr>
    <td bgcolor="#FFFFFF"><center><?php echo $no++; ?></td>
    <td bgcolor="#FFFFFF"><center><?php echo $hasil['id_pinjam']; ?></center></td>
    <td bgcolor="#FFFFFF"><center><?php echo $hasil['nik']; ?></center></td>
	    <td bgcolor="#FFFFFF"><center><?php echo $hasil['nama']; ?></center></td>    
    <td bgcolor="#FFFFFF"><center><?php echo $hasil['tgl_pinjam']; ?></center></td>
    <td bgcolor="#FFFFFF"><center><?php echo $hasil['tgl_kembali']; ?></center></td>
   
	<td bgcolor="#FFFFFF"><center><a href="detail_pinjam.php?id=<?php echo $hasil['id_pinjam']; ?>"><img src="image/kaca_pembesar.png" /></a> | <a href="pinjam_edit.php?id=<?php echo $hasil['id_pinjam']; ?>"><img src="image/tombol_edit.png" /></a> | <a href="pinjam_del.php?id=<?php echo $hasil['id_pinjam']; ?>"><img src="image/tombol_delete.png"  onclick="return confirm('Anda yakin ingin menghapus data ini') "/></a></center></td>
  </tr>
  <?php
  }
  ?>
</table>
<?php include('footer.php'); ?>