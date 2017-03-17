
<?php include('header.php'); ?>
<?php include('sidebox.php'); ?>

<h3>Manajemen detail</h3>
<a href="detail_add.php">Tambah Data</a>
<br /><br />
<?php

$sql	= "SELECT * FROM tb_detail ORDER BY id_detail DESC";
$query	= mysql_query($sql) or die(mysql_error());
?>

<table width="714" border="0" bgcolor="#000000">
  <tr>
    <td width="32" bgcolor="#FFFFFF"><center>No</center></td>
     <td width="46" bgcolor="#FFFFFF"><center>Id Pinjam</center></td>
    <td width="46" bgcolor="#FFFFFF"><center>Id Barang</center></td>
     <td width="101" bgcolor="#FFFFFF"><center>Nama Pinjam</center></td>
     <td width="101" bgcolor="#FFFFFF"><center>Nik</center></td>
    <td width="60" bgcolor="#FFFFFF"><center>Barang</center></td>
    <td width="55" bgcolor="#FFFFFF"><center>Tanggal Pinjam</center></td>
	 <td width="55" bgcolor="#FFFFFF"><center>Tanggal Kembali</center></td>
     <td width="43" bgcolor="#FFFFFF"><center>Jumlah</center></td>
	 <td width="43" bgcolor="#FFFFFF"><center>No Hp</center></td> 
    <td width="84" bgcolor="#FFFFFF"><center>Keterangan</center></td>
    <td width="35" bgcolor="#FFFFFF"><center>Aksi</center></td>
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
	<td bgcolor="#FFFFFF"><center><?php echo $hasil['nik']; ?></center></td>
    <td bgcolor="#FFFFFF"><center><?php echo $hasil['nama_barang']; ?></center></td>
    <td bgcolor="#FFFFFF"><center><?php echo $hasil['tgl_pinjam']; ?></center></td>
    <td bgcolor="#FFFFFF"><center><?php echo $hasil['tgl_kembali']; ?></center></td>
    <td bgcolor="#FFFFFF"><center><?php echo $hasil['jml']; ?></center></td>
	    <td bgcolor="#FFFFFF"><center><?php echo $hasil['no_hp']; ?></center></td>
    <td bgcolor="#FFFFFF"><center><?php echo $hasil['ket']; ?></center></td>
   <td bgcolor="#FFFFFF"><center><a href="detail_ekspor.php?id=<?php echo $hasil['id_detail']; ?>"><img src="image/cetak.png"/></a> |<a href="detail_edit.php?id=<?php echo $hasil['id_detail']; ?>"><img src="image/tombol_edit.png" /></a> | <a href="detail_del.php?id=<?php echo $hasil['id_detail']; ?>"><img src="image/tombol_delete.png"  onclick="return confirm('Anda yakin ingin menghapus data ini') "/></a></center></td>
  </tr>
  
  <?php
  }
  ?>
</table>
<?php include('footer.php'); ?>