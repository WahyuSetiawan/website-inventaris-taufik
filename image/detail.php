<?php include('header.php'); ?>
<?php include('sidebox.php'); ?> 

<h3> Detail Peminjaman</h3>

<?php

$sql	= "SELECT * FROM tb_detail ORDER BY id_detail DESC";
$query	= mysql_query($sql) or die(mysql_error());

?>

<table width="717" border="0" bgcolor="#000000">
  <tr>
    <td width="31" bgcolor="#FFFFFF"><center>No</center></td>
     <td width="54" bgcolor="#FFFFFF"><center>Id Pinjam</center></td>
	 <td width="54" bgcolor="#FFFFFF"><center>Id Barang</center></td>
     <td width="107" bgcolor="#FFFFFF"><center>Nama Pinjam</center></td>
     <td width="60" bgcolor="#FFFFFF"><center>Tgl Pinjam</center></td>
     <td width="60" bgcolor="#FFFFFF"><center>Barang</center></td>
     <td width="57" bgcolor="#FFFFFF"><center>Jumlah</center></td>
	  <td width="43" bgcolor="#FFFFFF"><center>No Hp</center></td>
     <td width="50" bgcolor="#FFFFFF"><center>Keterangan</center></td>
  
    
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
    <td bgcolor="#FFFFFF"><center><?php echo $hasil['nama_pinjam']; ?></center></td>
    <td bgcolor="#FFFFFF"><center><?php echo $hasil['tgl_pinjam']; ?></center></td>
    <td bgcolor="#FFFFFF"><center><?php echo $hasil['nama_barang']; ?></center></td>
    <td bgcolor="#FFFFFF"><center><?php echo $hasil['jml']; ?></center></td>
	<td bgcolor="#FFFFFF"><center><?php echo $hasil['no_hp']; ?></center></td>
    <td bgcolor="#FFFFFF"><center><?php echo $hasil['ket']; ?></center></td>
    
  </tr>
    <?php
}
  
  ?>
</table>


 <?php include('footer.php'); ?>