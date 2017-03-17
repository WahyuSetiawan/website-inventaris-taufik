<?php include('header.php'); ?>
<?php include('sidebox.php'); ?>


<?php include('include/koneksi.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tugas Akhir</title>
<link href="../style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../fancybox/jquery-1.4.3.min.js"></script>
<script type="text/javascript" src="../fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<link href="../fancybox/jquery.fancybox-1.3.4.css" type="text/css" rel="stylesheet"/>
<script type="text/javascript">
$(document).ready(function(){
	$(".fancy").fancybox();
	});
</script>
</head>

<body>
<div id="wrap">
  	
    
   	<h3>Ubah</h3>
    <?php
	$id=$_GET['id'];
	$cek=mysql_query("SELECT * FROM tb_gallery WHERE id_foto='$id'");
	$tampil=mysql_fetch_array($cek);
	?>
    <form action="gallery_update.php" method="post" enctype="multipart/form-data" name="gallery_update">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="100">Judul</td>
        <td align="center">:</td>
        <td><input name="judul" type="text" id="judul" value="<?php echo $tampil['judul_foto']; ?>" size="75" maxlength="100" /></td>
      </tr>
  		<tr>
    		<td valign="top">File</td>
	    <td width="10" align="center" valign="top">:</td>
    		<td><input name="foto" type="file" id="foto" size="30" /><br />* Kosongkan jika tidak di ganti !</td>
  		</tr>
  		<tr>
  		  <td valign="top">&nbsp;</td>
  		  <td align="center" valign="top">&nbsp;</td>
  		  <td>
          <a href="photo/<?php echo $tampil['nama_file']; ?>" title="<?php echo $tampil['judul_foto']; ?>" class="fancy">
          <img src="photo/<?php echo $tampil['nama_file']; ?>" title="<?php echo $tampil['judul_foto']; ?>" height="150" align="top" style="border:1px solid #000;" border="0" />
          </a>
          </td>
	    </tr>
  		<tr>
    		<td colspan="2"><input name="id" type="hidden" id="id" value="<?php echo $tampil['id_foto']; ?>" /></td>
    		<td><input type="submit" name="update" id="update" value="Update" />
            &nbsp;
          <input type="button" name="cancel" id="cancel" value="Cancel" onclick="self.history.back()" /></td>
  		</tr>
	</table>
    </form>
    </div>
    <?php include('footer.php'); ?>
</div>
</body>
</html>