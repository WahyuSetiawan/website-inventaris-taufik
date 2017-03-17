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

<h3>Manajemen Detail Peminjaman Barang</h3>

<?php
$sql	= "select "
        . "tb_pinjam.id_pinjam, tb_karyawan.nik, tb_karyawan.nohp, tb_pinjam.tgl_pinjam, tb_pinjam.tgl_kembali, "
        . "tb_karyawan.nama as 'karyawan', tb_barang.nama,"
        . "tb_barang.id_barang,"
        . "tb_detail.id_barang, tb_detail.jml , tb_detail.ket "
        . "from tb_pinjam "
        . "join tb_detail on tb_pinjam.id_pinjam = tb_detail.id_pinjam "
        . "join tb_barang on tb_barang.id_barang = tb_detail.id_barang "
        . "join tb_karyawan on tb_karyawan.nik = tb_pinjam.nik "
        . "where tb_pinjam.id_pinjam = '" . $_GET['id'] . "'";
$query	= mysql_query($sql) or die(mysql_error());

?>

<h3><u>Detail Peminjaman</u></h3>
<form method="post" action="">
    <table width="300" border="0">
        <tr>
            <td>Id Pinjam</td>
            <td>:</td>
            <td><label>
                    <input name="id_pinjam" type="text" id="id_pinjam" />
                </label></td>
        </tr>
        <tr>
            <td>Nik</td>
            <td>:</td>
            <td><select name="nik">
                    <?php
                    $sql = "select * from tb_karyawan";
                    $data_mentah = mysql_query($sql) or exit($sql);

                    while ($hasil = mysql_fetch_assoc($data_mentah)) {
                        ?>
                        <option value="<?php echo $hasil['nik'] ?>"><?php echo $hasil['nik'] ?></option>
                    <?php } ?>
                </select></td>
        </tr>
        <tr>
            <td>Tgl Pinjam</td>
            <td>:</td>
            <td><label>
                    <input name="tgl_pinjam" type="date" id="tgl_pinjam" />
                </label></td>
        </tr>
        <tr>
            <td>Tgl Kembali</td>
            <td>:</td>
            <td><label>
                    <input name="tgl_kembali" type="date" id="tgl_kembali" />
                </label></td>
        </tr>
        <tr>
            <td>Keterangan</td>
            <td>:</td>
            <td><label>
                    <select name="ket">
                        <option>Dipinjam</option>
                        <option>Dikembalikan</option>
                    </select>
                </label></td>
        </tr>
    </table>
</form>

<h3><u>Input Barang</u></h3>

<table>
<table width="300" border="0">
  <tr>
    <td>Id Barang</td>
    <td>:</td>
    <td><select name="barang1">
      <option value="-">-</option>
      <?php
                    $sql = "select * from tb_barang";
                    $data_mentah = mysql_query($sql) or exit($sql);

                    while ($hasil = mysql_fetch_assoc($data_mentah)) {
                        ?>
      <option value="<?php echo $hasil['id_barang'] ?>"><?php echo $hasil['nama'] ?></option>
      <?php } ?>
    </select>
        <input type="submit" name="Submit2" value="Tambah" />
    </td>
  </tr>
</table>

<table width="640" border="0" bgcolor="#000000">
  <tr>
    <td width="37" bgcolor="#FFFFFF"><center>No</center></td>
	<td width="254" bgcolor="#FFFFFF"><center>Nama Barang</center></td>
	<td width="132" bgcolor="#FFFFFF"><center>Jumlah</center></td>
	<td width="105" bgcolor="#FFFFFF"><center>Keterangan</center></td>
	<td width="90" bgcolor="#FFFFFF"><center>Aksi</center></td>
  </tr>
  
  <?php
  $no = 1;
  while($hasil = mysql_fetch_array($query))
  {
  ?>
  
  <tr>
    <td bgcolor="#FFFFFF"><center><?php echo $no++; ?></td>
	<td bgcolor="#FFFFFF"><center><?php echo $hasil['nama']; ?></center></td> 
    <td bgcolor="#FFFFFF"><center><?php echo $hasil['jml']; ?></center></td>
	 <td bgcolor="#FFFFFF"><center><?php echo $hasil['ket']; ?></center></td>
		 
	<td bgcolor="#FFFFFF"><center><a href="detail_ekport_single.php"?id=<?php echo $hasil['id_pinjam']; ?>"><p>unduh</p></a></center></td>
  </tr>
  <?php
  }
  ?>
</table>
<?php include('footer.php'); ?>