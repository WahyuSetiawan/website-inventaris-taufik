<?php
session_start();
include('include/function.php');
include('header.php');

//mengecek apakah sudah login

if (!login()) {
    header('Location:index.php');
}

//proses input data kedatabase
if (isset($_POST['Submit'])) {
    $id_pinjam = $_POST['id_pinjam'];
    $barang1 = $_POST['barang1'];
    $nik = $_POST['nik'];
    $tgl_pinjam = $_POST['tgl_pinjam'];
    $tgl_kembali = $_POST['tgl_kembali'];
    $jml = $_POST['jml'];
    $ket = $_POST['ket'];

    if ($id_pinjam == '') {
        $error_pinjam = 'Maaf, id_pinjam Wajib diisi';
    } else {
        header("location:pinjam_list.php");
    }
}
?>
<?php include('sidebox.php'); ?>

<h3>Menambah Data Peminjaman Barang</h3>
<?php
if (isset($error_pinjam)) {
    echo $error_pinjam;
}
?>
<h3><u>Data Pinjam</u></h3>
<form method="post" action="">
    <table width="300" border="0">
        <tr>
            <td>Id Pinjam</td>
            <td>:</td>
            <td><label>
                    <input name="id_pinjam" type="text" id="id_pinjam" />
                </label></td>
        </tr>
        <tr>
            <td>Nik</td>
            <td>:</td>
            <td><select name="nik">
                    <?php
                    $sql = "select * from tb_karyawan";
                    $data_mentah = mysql_query($sql) or exit($sql);

                    while ($hasil = mysql_fetch_assoc($data_mentah)) {
                        ?>
                        <option value="<?php echo $hasil['nik'] ?>"><?php echo $hasil['nik'] ?></option>
                    <?php } ?>
                </select></td>
        </tr>
        <tr>
            <td>Tgl Pinjam</td>
            <td>:</td>
            <td><label>
                    <input name="tgl_pinjam" type="date" id="tgl_pinjam" />
                </label></td>
        </tr>
        <tr>
            <td>Tgl Kembali</td>
            <td>:</td>
            <td><label>
                    <input name="tgl_kembali" type="date" id="tgl_kembali" />
                </label></td>
        </tr>
        <tr>
            <td>Keterangan</td>
            <td>:</td>
            <td><label>
                    <select name="ket">
                        <option>Dipinjam</option>
                        <option>Dikembalikan</option>
                    </select>
                </label></td>
        </tr>
    </table>
</form>

<h3><u>Input Barang</u></h3>

<table>
    <form action="post">
        <table width="300" border="0">
            <tr>
                <td>Id Barang</td>
                <td>:</td>
                <td><select name="barang1">
                        <option value="-">-</option>
                        <?php
                        $sql = "select * from tb_barang";
                        $data_mentah = mysql_query($sql) or exit($sql);

                        while ($hasil = mysql_fetch_assoc($data_mentah)) {
                            ?>
                            <option value="<?php echo $hasil['id_barang'] ?>"><?php echo $hasil['nama'] ?></option>
                        <?php } ?>
                    </select>
                    <input type="submit" name="Submit_tambah" value="Tambah" />
                </td>
            </tr>
            <tr>
                <td>jumlah</td>
                <td><input name="jumlah" type="text"/></td>
            </tr>
        </table>
    </form>
    <table width="300" border="0">
        <tr>
            <td><label>
                    <input type="submit" name="Submit" value="Simpan Data" />
                </label></td>
    </table>
    <p>&nbsp;</p>
    <table width="702" border="0" bgcolor="#000000">
        <tr>
            <td width="40" bgcolor="#FFFFFF"><center>No</center></td>
        <td width="151" bgcolor="#FFFFFF"><center>Id Barang</center></td>
        <td width="192" bgcolor="#FFFFFF"><center>Nama Barang</center></td>
        <td width="102" bgcolor="#FFFFFF"><center>Jumlah</center></td>
        <td width="106" bgcolor="#FFFFFF"><center>Keterangan</center></td>
        </tr>

        <?php
        $no = 1; {
            ?>

            <tr>
                <td bgcolor="#FFFFFF"><center><?php echo $no++; ?></td>
                <td bgcolor="#FFFFFF"><center><?php echo $hasil['id_barang']; ?></center></td>
                <td bgcolor="#FFFFFF"><center><?php echo $hasil['nik']; ?></center></td>   
                <td bgcolor="#FFFFFF"><center><?php echo $hasil['jml']; ?></center></td>
                <td bgcolor="#FFFFFF"><center><?php echo $hasil['ket']; ?></center></td>

                </tr>
                <?php
            }
            ?>
    </table>


    <?php include('footer.php'); ?>