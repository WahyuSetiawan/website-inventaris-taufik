<?php include('header.php'); ?>
<?php include('sidebox.php'); ?>


<script type="text/javascript" src="fancybox/jquery-1.4.3.min.js"></script>
<script type="text/javascript" src="fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<link href="fancybox/jquery.fancybox-1.3.4.css" type="text/css" rel="stylesheet"/>
<script type="text/javascript">
$(document).ready(function(){
	$(".fancy").fancybox();
	});
</script>


<div id="wrap">
 
   	<h3>Gallery Foto</h3>
    <a href="gallery_add.php" title="Tambah">Tambah</a><br /><br />
      <table width="100%" border="1" cellspacing="0" cellpadding="0">
		  <tr class="table">
          	  <td width="41"><center>No</center></td>
		      <td width="204"><center>Nama</center></td>
			  <td width="200"><center>Judul</center></td>
		      <td width="142"><center>Waktu</center></td>
		      <td colspan="3"><center>aksi</center></td>
		  </tr>
         <?php
		  $no=1;
		  $cek=mysql_query("SELECT * FROM tb_gallery ORDER BY waktu ASC");
		  while($ambil=mysql_fetch_array($cek)){
			$waktu=$ambil['waktu'];
			$tanggal = substr($waktu,8,2);
			$bulan = substr($waktu,5,2);
			$tahun = substr($waktu,0,4);
			$tgl=$tanggal."/".$bulan."/".$tahun;
		  ?>
		  <tr>
		      <td align="center"><?php echo $no ?></td>
		      <td><?php echo $ambil['nama_file']; ?></td>
		      <td><center><?php echo $ambil['judul_foto']; ?></center></td>
		      <td align="center"><?php echo $tgl; ?></td>
              <td width="33">
              	<a href="photo/<?php echo $ambil['nama_file']; ?>" title="<?php echo $ambil['judul_foto']; ?>" class="fancy"><center>
              		<img src="image/tombol_view.png" title="Lihat" width="13" border="0" /></center>
                </a>
              </td>
              <td width="34">
              	<a href="gallery_ubah.php?id=<?php echo $ambil['id_foto']; ?>" title="Ubah"><center>
              		<img src="image/tombol_edit.png" title="Ubah" border="0" /></center>
                </a>
              </td>
              <td width="35">
              	<a href="gallery_hapus.php?id=<?php echo $ambil['id_foto']; ?>" title="Hapus"><center>
              		<img src="image/tombol_delete.png" onclick="return confirm('Anda yakin ingin menghapus data ini') "title="Hapus" width="13" border="0" /></center>
                </a>
              </td>
		  </tr>
          <?php
		  $no++;
		  }
		  ?>
	  </table>
    </div>
    
    <?php include('footer.php'); ?>