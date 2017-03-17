<?php include('header.php'); ?>
<?php include('sidebox.php'); ?> 

<h3> Data Peminjaman </h3>

<?php


$sql	= "SELECT * FROM tb_pinjam p join tb_karyawan k on p.nik=k.nik join tb_detail on tb_detail.id_pinjam = p.id_pinjam join tb_barang on tb_detail.id_barang = tb_barang.id_barang ORDER BY p.id_pinjam DESC";
$query	= mysql_query($sql) or die(mysql_error());

?>

<table width="705" border="0" bgcolor="#000000">
  <tr>
    <td width="47" bgcolor="#FFFFFF"><center>No</center></td>
    <td width="107" bgcolor="#FFFFFF"><center>Id Pinjam</center></td>
    <td width="107" bgcolor="#FFFFFF"><center>Id Barang</center></td>
    <td width="77" bgcolor="#FFFFFF"><center>Nama </center></td>
    <td width="73" bgcolor="#FFFFFF"><center>Nik</center></td>
	<td width="107" bgcolor="#FFFFFF"><center>Barang</center></td>
    <td width="146" bgcolor="#FFFFFF"><center>Tgl Pinjam</center></td>
	<td width="146" bgcolor="#FFFFFF"><center>Tgl Kembali</center></td>
	<td width="107" bgcolor="#FFFFFF"><center>Jml</center></td>
    <td width="107" bgcolor="#FFFFFF"><center>No Hp</center></td>
	<td width="107" bgcolor="#FFFFFF"><center>Ket</center></td>




  
    
  </tr>
  
  <?php
  $no = 1;
  while($hasil = mysql_fetch_array($query))
  {
  ?>
  
  <tr>
    <td bgcolor="#FFFFFF"><center><?php echo $no++; ?></center></td>
    <td bgcolor="#FFFFFF"><center><?php echo $hasil['id_pinjam']; ?></center></td>
	<td bgcolor="#FFFFFF"><center><?php echo $hasil['id_barang']; ?></center></td>
	<td bgcolor="#FFFFFF"><center><?php echo $hasil['nama']; ?></center></td>
    <td bgcolor="#FFFFFF"><center><?php echo $hasil['nik']; ?></center></td>
	<td bgcolor="#FFFFFF"><center><?php echo $hasil['nama']; ?></center></td>    
    <td bgcolor="#FFFFFF"><center><?php echo $hasil['tgl_pinjam']; ?></center></td>
    <td bgcolor="#FFFFFF"><center><?php echo $hasil['tgl_kembali']; ?></center></td>
	<td bgcolor="#FFFFFF"><center><?php echo $hasil['jml']; ?></center></td>
	<td bgcolor="#FFFFFF"><center><?php echo $hasil['nohp']; ?></center></td>
	<td bgcolor="#FFFFFF"><center><?php echo $hasil['ket']; ?></center></td>
  </tr>
    <?php
}
  
  ?>
</table>


 <?php include('footer.php'); ?>