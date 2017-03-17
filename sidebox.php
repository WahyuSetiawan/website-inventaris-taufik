<!-- Bagian Content -->
<div id="content">
	<!-- Sidebox -->
	<div id="sidebox">
		<?php

		if(login()==true)
		{
		?>
		<div class="side-header">Menu Admin</div>
		<div class="side-konten">
			<ul>
            
				
                <li><a href="pinjam_list.php">Manajemen Daftar Pinjam</a></li>
                <li><a href="barang_list.php">Manajemen Barang</a></li>
                <!--<li><a href="detail_list.php">Manajemen Detail</a></li>-->
                <li><a href="jenis_list.php">Manajemen Jenis</a></li>
                <li><a href="status_list.php">Manajemen Status</a></li>
                <li><a href="ruangan_list.php">Manajemen Ruangan</a></li>
                <li><a href="pj_list.php">Manajemen Penanggung Jawab</a></li>
                <li><a href="gallery_list.php">Manajemen Gallery</a></li>
                <li><a href="petugas_list.php">Manajemen Petugas</a></li>
				<li><a href="karyawan_list.php">Manajemen Karyawan</a></li>
                <li><a href="profile_list.php">Manajemen Profile</a></li>
              
               
                
				
				<li><a href="logout.php" onClick="return confirm('Anda yakin ingin LogOut...??')">Logout</a></li>
			</ul>
        </div>
		<?php
		}
		else
		{
					if($_POST)
{
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	
	if($username=='' || $password=='')
	{
		$error = 'Maaf, Username Atau Password Masih kosong';
	}
	else
	{
		$sql	= "SELECT * FROM tb_admin WHERE username='$username' and password='$password'";
		$query	= mysql_query($sql) or die(mysql_error());
		
		if(mysql_num_rows($query)==0)
		{
			$error = 'Maaf, Username atau password salah';
		}
		else
		{
			$_SESSION['USERNAME'] = $username;
			header('Location:admin.php');
		}
	}
}

		?>	
		
        <div class="side-header">Login</div>
        <div class="side-konten">
		<?php
		if(isset($error))
		{
			echo $error;
		}
		?>
			<form method="post" action="">
				<input type="text" size="20" name="username" /> Username<br />
				<input type="password" size="20" name="password" /> Password <br />
				<input type="submit" value="login"  />
			</form>
        </div>
        
    <!--bagian sidebox Statistik Web -->
     <?php
	}
	?>
    
    
    <div class="side-header">Statistik Pengunjung</div>
    <div class="side-konten">
      <p><p align="center"> 10 Pengunjung</p></p>
    </div>
   </div>
   
    <!--bagian sidebox statistik pengunjung selesai -->
    
    
    
    <!-- Mainbox -->
    <div id="mainbox">
    
