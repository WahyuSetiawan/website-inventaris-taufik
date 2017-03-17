<?php include('header.php'); ?>
<?php include('sidebox.php'); ?>


<h3>Data Karyawan</h3>

<?php

$sql	= "SELECT * FROM tb_karyawan ORDER BY nik DESC";						
$query	= mysql_query($sql) or die(mysql_error());


?>
<table width="693" border="0" bgcolor="#000000">
  <tr>
    <td width="32" bgcolor="#FFFFFF"><center>No</center></td>
    <td width="89" bgcolor="#FFFFFF"><center>Nik</center></td>
    <td width="129" bgcolor="#FFFFFF"><center>Nama Karyawan</center></td>
    <td width="72" bgcolor="#FFFFFF"><center>Jenis Kelamin</center></td>
    <td width="125" bgcolor="#FFFFFF"><center>Email</center></td>
    <td width="116" bgcolor="#FFFFFF"><center>No Hp</center></td>
    <td width="100" bgcolor="#FFFFFF"><center>Ket</center></td>
  </tr>
  
  <?php
  $no = 1;
  while($hasil = mysql_fetch_array($query))
  {
  ?>
  
  <tr>
    <td bgcolor="#FFFFFF"><center><?php echo $no++; ?></center></td>
    <td bgcolor="#FFFFFF"><?php echo $hasil['nik']; ?></td>
    <td bgcolor="#FFFFFF"><?php echo $hasil['nama']; ?></td>
	<td bgcolor="#FFFFFF"><?php echo $hasil['jk']; ?></td>
    <td bgcolor="#FFFFFF"><?php echo $hasil['email']; ?></td>
    <td bgcolor="#FFFFFF"><?php echo $hasil['nohp']; ?></td>          
    <td bgcolor="#FFFFFF"><?php echo $hasil['ket']; ?></td>
	
  </tr>
    <?php
}
  
  ?>
</table>




<?php include('footer.php'); ?>