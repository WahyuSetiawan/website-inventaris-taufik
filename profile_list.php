<?php include('header.php'); ?>
<?php include('sidebox.php'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Tugas Akhir</title>
        <link href="../style.css" rel="stylesheet" type="text/css" />
    </head>

    <body>
        <div id="wrap">

            <div id="admin">
                <h3>Profile</h3>
                <a href="tambah_profil.php" title="Tambah">Tambah</a><br /><br />
                <table width="100%" border="1" cellspacing="0" cellpadding="0">
                    <tr class="table">
                        <td width="100">Nama</td>
                        <td width="200">judul</td>
                        <td>deskripsi</td>
                        <td colspan="2">aksi</td>
                    </tr>
                    <?php
                    $cek = mysql_query("SELECT * FROM tb_profile ORDER BY nama ASC");
                    $ambil = mysql_fetch_assoc($cek);

                    $tampil = $ambil['deskripsi'];
                    $deskripsi = strip_tags(substr($tampil, 0, 200));
                    ?>
                    <tr>
                        <td valign='top'><?php echo $ambil['nama']; ?></td>
                        <td valign='top'><?php echo $ambil['judul']; ?></td>
                        <td><?php echo $deskripsi; ?> (...)</td>
                        <td width="13">
                            <a href="ubah_profil.php?id=<?php echo $ambil['nama']; ?>" title="Ubah">
                                <img src="image/tombol_edit.png" title="Edit" border="0" />
                            </a>
                        </td>
                        <td width="13">
                            <a href="hapus_profil.php?id=<?php echo $ambil['nama']; ?>" title="Hapus">
                                <img src="image/tombol_delete.png" title="Hapus" width="13" border="0" />
                            </a>
                        </td>
                    </tr>
                    <?php
                    ?>
                </table>
            </div>

        </div>
    </body>
</html>
<?php include('footer.php'); ?>
