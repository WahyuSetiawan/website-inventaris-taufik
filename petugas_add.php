<?php include('header.php'); ?>
<?php include('sidebox.php'); ?>

<h3>Menambah Data Petugas</h3>
<?php

//proses input data kedatabase
if($_POST)
{
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
		$sql	= "INSERT INTO tb_petugas (nama_petugas,nik,jk,no_hp,level_petugas) VALUES('$username','$nik','$jk','$no_hp','$level')";
		$sql1	= "INSERT INTO tb_admin (username,password,id_petugas) VALUES('$username','$password',LAST_INSERT_ID())";
		$query	= mysql_query($sql) or die(mysql_error());
		mysql_query($sql1) or die(mysql_error());
		
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
                <td><input name="username" type="text" size="15" maxlength="10" /> *</td>
              </tr>
              <tr>
                <td>Password</td>
                <td align="center">:</td>
                <td><input name="password" type="password" size="15" maxlength="10" /> *</td>
              </tr>
              <tr>
                <td>Re : Password</td>
                <td align="center">:</td>
                <td><input name="re_password" type="password" size="15" maxlength="10" /> *</td>
              </tr>
               <tr>
    			  <td>Nik</td>
    			   <td align="center">:</td>
    			  <td><label>
     			   <input name="nik" type="text" id="nik" />
  				  </label></td>
  				  </tr>
                <tr>
     			 <td>Jenis Kelamin</td>
     			  <td align="center">:</td>
       			 <td><input name="jk" type="radio" value="pria">Pria
      			  <input name="jk" type="radio" value="wanita" checked>Wanita
      		    </td>
  			  </tr>
               <tr>
    			  <td>No Hp</td>
    			   <td align="center">:</td>
    			  <td><label>
     			   <input name="no_hp" type="text" id="no_hp" />
  				  </label></td>
  				  </tr>
              <tr>
                <td>Level User</td>
                <td align="center">:</td>
                <td>
               	  <select name="level">
               	    <option value="Admin">Admin</option>
               	    <option value="Petugas" selected="selected">Petugas</option>
       	          </select>
                </td>
              </tr>
              <tr>
              	<td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>
                	<input name="petugas_list.php" type="submit" value="Simpan" />
                    <i>* Max 10 Character</i>
                </td>
              </tr>
            </table>
            </form>
            
 
<?php include('footer.php'); ?>