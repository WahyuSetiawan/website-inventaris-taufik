<?php
if(!isset($_SESSION)){
session_start();
}
include_once('include/koneksi.php');
include_once('include/function.php');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="ikon/Home.png" rel="shortcut icon" type="image/x-icon" />
<title>Sistem Informasi Inventarisasi</title>

<link type="text/css" rel="stylesheet" href="style/style.css" />
</head>
<body>

<div id="halaman">

<!--Bagian Header-->

<div id="header">
	<div id="logo">
	<h3>
      <font color="#CCCCCC">
      <center>
        <h3><font size="6">
          <font face="Bodoni MT Condensed">
           Sistem Informasi Inventarisasi Barang Laboratorium SMKN 1 Nanggulan  </font>
        </font>
        </h3>
      </center>
      </font>
      </h3>
</div>
</div>

<!--bagian header selesai -->


<!--Bagian Menu-->
<div id="menu">
	<ul id="navigasi"><center>
    	<!--</h1><font face="Monotype Corsiva">-->
        	
    	<li><a href="index.php">Beranda</a> </li>
        <li><a href="profile.php">Profile</a></li>
		<li><a href="karyawan.php">Karyawan</a></li>
        <li><a href="pinjam.php">Peminjaman</a></li>
        <li><a href="barang.php">Inventaris</a></li>
       <li><a href="gallery.php">Gallery</a></li>
        	
        </font>
	</ul>
    </center>
</div>

<!--bagian menu selesai -->
