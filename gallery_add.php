<?php include('header.php'); ?>
<?php include('sidebox.php'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tugas Akhir</title>
<link href="style/style.css" rel="stylesheet" type="text/css" />
</head>
  
<div id="wrap">
 <div id="admin">
 
   	<h3>Tambah</h3>
    
    <form action="gallery_simpan.php" method="post" enctype="multipart/form-data" name="gallery_simpan">
    
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="100">Judul</td>
        <td align="center">:</td>
        <td><input name="judul" type="text" id="judul" size="75" maxlength="100" /></td>
      </tr>
  		<tr>
    		<td>File</td>
   		  <td width="10" align="center">:</td>
    		<td><input name="foto" type="file" id="foto" size="30" /></td>
  		</tr>
  		<tr>
    		<td colspan="2">&nbsp;</td>
    		<td><input type="submit" name="simpan" id="simpan" value="Save" />
            &nbsp;
          <input type="button" name="cancel" id="cancel" value="Cancel" onClick="self.history.back()" /></td>
  		</tr>
	</table>
    </form>
    </div>
    </div>
    <?php include('footer.php'); ?>