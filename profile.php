<?php include('header.php'); ?>
<?php include('sidebox.php'); ?>

<div id="content">	
    <h3><li>Profile SMK Negeri 1 Nanggulan</p></h3>

    <?php
    $cek = mysql_query("SELECT * FROM tb_profile ORDER BY nama ASC");
    $tampil = mysql_fetch_assoc($cek);

    $deskripsi = $tampil['deskripsi'];
    echo "<h3>" . $tampil['judul'] . "</h3>";
    echo $deskripsi;
    ?>

</div>

<?php include('footer.php'); ?>