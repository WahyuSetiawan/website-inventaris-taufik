<?php include('header.php'); ?>
<?php include('sidebox.php'); ?>


<h3>Data Barang</h3>

<?php
/*
$sql 	= "SELECT b.id_barang,b.nama,b.no_seri_pabrik,b.tgl_masuk,b.harga_beli,b.gambar,b.ket,j.jenis,s.status,rn.ruangan
			FROM tb_barang b,tb_jenis j,tb_status s,tb_ruangan rn
							where ((b.id_jenis=j.id_jenis) and (b.id_status=s.id_status) and (b.id_ruangan=rn.id_ruangan)) 		 										                                    order by id_barang";
*/
$sql	= "Select * from tb_barang b join tb_jenis j on b.id_jenis=j.id_jenis join tb_status s on s.id_status=b.id_status join tb_ruangan rn on rn.id_ruangan=b.id_ruangan";
							
		
							
$query	= mysql_query($sql) or die(mysql_error());


?>
<table width="710" border="0" bgcolor="#000000">
  <tr>
    <td width="21" bgcolor="#FFFFFF"><center>No</center></td>
     <td width="43" bgcolor="#FFFFFF"><center>Id Barang</center></td>
     <td width="66" bgcolor="#FFFFFF"><center>Nama Barang</center></td>
   	 <td width="107" bgcolor="#FFFFFF"><center>No Seri Pabrik</center></td>
	 <td width="75" bgcolor="#FFFFFF"><center>Tgl Masuk</center></td>
     <td width="42" bgcolor="#FFFFFF"><center>Jenis</center></td>
     <td width="50" bgcolor="#FFFFFF"> <center>Status</center></td>
     <td width="70" bgcolor="#FFFFFF"><center>Ruangan</center></td>
     <td width="70" bgcolor="#FFFFFF"> <center>Harga Beli</center></td>
     <td width="73" bgcolor="#FFFFFF"><center>Gambar</center></td>
	   <td width="73" bgcolor="#FFFFFF"><center>Jumlah</center></td>
	 <td width="47" bgcolor="#FFFFFF"><center>Ket</center></td>
  </tr>
  
  <?php
  $no = 1;
  while($hasil = mysql_fetch_array($query))
  {
  ?>
  
  <tr>
    <td bgcolor="#FFFFFF"><?php echo $no++; ?></td>
    <td bgcolor="#FFFFFF"><?php echo $hasil['id_barang']; ?></td>
    <td bgcolor="#FFFFFF"><?php echo $hasil['nama']; ?></td>
	<td bgcolor="#FFFFFF"><?php echo $hasil['no_seri_pabrik']; ?></td>
    <td bgcolor="#FFFFFF"><?php echo $hasil['tgl_masuk']; ?></td>
    <td bgcolor="#FFFFFF"><?php echo $hasil['jenis']; ?></td>
	<td bgcolor="#FFFFFF"><?php echo $hasil['status']; ?></td>
    <td bgcolor="#FFFFFF"><?php echo $hasil['ruangan']; ?></td>
    <td bgcolor="#FFFFFF"><?php echo $hasil['harga_beli']; ?></td>
    <td bgcolor="#FFFFFF"><center> <a href="photo/<?php echo $hasil['gambar']; ?>" title="<?php echo $hasil['nama_file']; ?>" class="fancy">
                <img src="photo/<?php echo $hasil['gambar']; ?>" title="<?php echo $hasil['nama_file']; ?>" width="75" border="0" />
                </a></td></center>
                
    <td bgcolor="#FFFFFF"><?php echo $hasil['jml']; ?></td>          
    <td bgcolor="#FFFFFF"><?php echo $hasil['ket']; ?></td>
	
  </tr>
    <?php
}
  
  ?>
</table>




<?php include('footer.php'); ?>