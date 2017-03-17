
<?php include('header.php'); ?>
<?php include('sidebox.php');?>



<script type="text/javascript" src="fancybox/jquery-1.4.3.min.js"></script>
<script type="text/javascript" src="fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<link href="fancybox/jquery.fancybox-1.3.4.css" type="text/css" rel="stylesheet"/>
<script type="text/javascript">
$(document).ready(function(){
	$(".fancy").fancybox();
	});
</script>

<!--<div id="wrap">-->
	<div id="content">
  	<h3><p align="justify"><li>Galeri Foto SMK Negeri 1 Nanggulan</li></p></h3>
   
        <?php
		include('include/koneksi.php');
		$cek=mysql_query("SELECT * FROM tb_gallery ORDER BY waktu ASC");
		$lihat=mysql_num_rows($cek);
		if($lihat==0){
			echo"<p>Belum ada foto yang dapat ditampilkan !</p>";
		}
		else{
			$i=1;
		?>
        <table border="2" cellspacing="5" cellpadding="0">
          <tr>
        <?php
			while($tampil=mysql_fetch_array($cek)){
				$waktu=$tampil['waktu'];
				$tanggal = substr($waktu,8,2);
				$bulan = substr($waktu,5,2);
				$tahun = substr($waktu,0,4);
				$tgl=$tanggal."/".$bulan."/".$tahun;
							
		?>
            <td valign="top"><table border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="center" width="140"><?php echo $tampil['judul_foto']; ?></td>
              </tr>
              <tr>
                <td>
                <a href="photo/<?php echo $tampil['nama_file']; ?>" title="<?php echo $tampil['judul_foto']; ?>" class="fancy">
                <img src="photo/<?php echo $tampil['nama_file']; ?>" title="<?php echo $tampil['judul_foto']; ?>" width="140" border="0" />
                </a>
                </td>
              </tr>
              <tr>
                <td align="center"><?php echo $tgl; ?></td>
              </tr>
            </table></td>
        <?php
				if($i % 4 == 0){
					echo"</tr><tr>";
				}
				$i++;
			}
		?>
          </tr>
        </table>
        <?php
		}
		?>
    </div>
    
   
	<?php include('footer.php'); ?>