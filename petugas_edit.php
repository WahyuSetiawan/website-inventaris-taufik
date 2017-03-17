<?php include('header.php'); ?>
<?php include('sidebox.php'); ?>


<h3>Ubah Data Petugas</h3>

<?php

//proses menampilkan data
if($_GET && !$_POST)
{
	$id = $_GET['id'];
	
	$sql	= "SELECT * FROM tb_admin join tb_petugas on tb_admin.id_petugas = tb_petugas.id_petugas WHERE id_admin=$id";
	$query	= mysql_query($sql) or die(mysql_error());
	$hasil	= mysql_fetch_array($query) or die(mysql_error());
}
elseif($_POST) //proses update data
{
	$id			= $_POST['id'];
	$username	= $_POST['username'];
	$password	= md5($_POST['password']);
	$nik		= $_POST['nik'];
	$jk			= $_POST['jk'];
	$no_hp		= $_POST['no_hp'];
	$level		= $_POST['level'];
	
	if($username=='' || $password =='')
	{
		$error_petugas = 'Maaf, username Wajib diisi';
	}
	else
	{
		$sql	= "UPDATE tb_petugas join tb_admin on tb_petugas.id_petugas = tb_admin.id_petugas SET nama_petugas='$username', nik='$nik', jk='$jk',email='$email',no_hp='$no_hp',level_petugas='$level',username='$username',password='$password' WHERE id_admin=$id";
		
		$query	= mysql_query($sql) or die(mysql_error());
		
		refresh('petugas_list.php');
	}
}


if(isset($error_petugas))
{
	echo $error_petugas;
}
?>

    <form method="post" action="">
            <table width="100%" border="0" cellspacing="1" cellpadding="2">
              <tr>
                <td>Username</td>
                <td align="center">:</td>
                <td><input name="username" type="text" size="15" maxlength="10" value="<?php echo $hasil['username']; ?>" /> *</td>
              </tr>
              <tr>
                <td>Password</td>
                <td align="center">:</td>
                <td><input name="password" type="password" size="15" maxlength="10" /> **</td>
              </tr>
              <tr>
                <td>Re : Password</td>
                <td align="center">:</td>
                <td><input name="re_password" type="password" size="15" maxlength="10" /> **</td>
              </tr>
              <tr>
    			  <td>Nik</td>
    			   <td align="center">:</td>
    			  <td><label>
     			   <input name="nik" type="text" id="nik" value="<?php echo $hasil['nik']; ?>"/>
  				  </label></td>
  				  </tr>
               <tr>
    		    <td>Jenis Kelamin</td>
				<td align="center">:</td>
   			   <td> <input name="jk" type="radio" value="pria"
  			    <?php if($hasil['jk']=="pria")
				  print("checked");?>>Pria
 			     <input name="jk" type="radio" value="wanita"
  			    <?php if($hasil['jk']=="wanita")
				  print("checked");?>>Wanita
  			    </td>
  			  </tr>
               <tr>
    			  <td>Email</td>
    			   <td align="center">:</td>
    			  <td><label>
     			   <input name="email" type="text" id="email" value="<?php echo $hasil['email']; ?>"/>
  				  </label></td>
  				  </tr>
               <tr>
    			  <td>No Hp</td>
    			   <td align="center">:</td>
    			  <td><label>
     			   <input name="no_hp" type="text" id="no_hp" value="<?php echo $hasil['no_hp']; ?>"/>
  				  </label></td>
  				  </tr>
              <tr>
                <td>Level User</td>
                <td align="center">:</td>
                <td>
               	  <select name="level">
               	    <option value="admin" <?php if($hasil['level_petugas']=='admin'){ echo('selected="selected"'); } ?> >Admin</option>
               	    <option value="petugas" <?php if($hasil['level_petugas']=='petugas'){ echo('selected="selected"'); } ?> >Petugas</option>
       	          </select>
                </td>
              </tr>
              <tr>
              	<td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>
                	<input name="id" type="hidden" value="<?php echo $id; ?>" />
                	<input name="petugas_update" type="submit" value="Update" />
                    <br /><br /><i>* Max 10 Character
                    <br />** Kosongkan jika tak diubah</i>
                </td>
              </tr>
            </table>
            </form>
            
            <?php include('footer.php'); ?>