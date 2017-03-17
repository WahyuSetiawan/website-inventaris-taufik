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

  <h3><font color="#CCCCCC">
      <marquee direction="left"="right" bgcolor="#666666">
      	<font face="Frank Ruehl">
        	Selamat Datang di halaman Administrator Inventarisasi Barang Di Laboratorium Online SMK Negeri 1 Nanggulan. Jl. Gajahmada, Wijimulyo, Nanggulan, Telp. (0274) 7101 354, Kode Pos 55671 Kulon Progo
        </font>
      </marquee>
      </h3>
      </font>
      


<!--<P align="justify"><strong><em>Silahkan Gunakan menu disamping untuk mengelola isi Content website ini</em></strong>.</p>-->
    
       <?php
echo "<p>Hai Administrator Silahkan Gunakan menu disamping untuk mengelola isi Content website ini.</p>
	<p>&nbsp;</p>
	<p align=justify><img src=ikon/logo.png width=398 height=312 /></p>
	<p align=right>Login Hari ini : ";
	echo date("l, d F Y | H:i:s");
	//print(date("d M Y"));
?>
 <!--<p align="justify"><img src="ikon/logo.png" width="398" height="312" /></p>-->



 
<?php include('footer.php'); ?>
 
 
