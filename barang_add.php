<?php
session_start();
include('include/function.php');
include('header.php');
//mengecek apakah sudah login
if (!login()) {
    header('Location:index.php');
}


//proses input data kedatabase
if ($_POST) {
    $id_barang = $_POST['id_barang'];
    $nama = $_POST['nama'];
    $no_seri_pabrik = $_POST['no_seri_pabrik'];
    $tgl_masuk = $_POST['tgl_masuk'];
    $id_jenis = $_POST['id_jenis'];
    $id_status = $_POST['id_status'];
    $id_ruangan = $_POST['id_ruangan'];
    $harga_beli = $_POST['harga_beli'];
    $gambar = $_FILES['gambar']['name'];
    $jml = $_POST['jml'];
    $ket = $_POST['ket'];
    //pengecekan apabila ada yg wajib di isi
    if ($nama == '' || $no_seri_pabrik == '' || $id_jenis == '') {
        $error_barang = 'Maaf, Form masih belum lengkap';
    } else {


        $sql = "INSERT INTO tb_barang (id_barang,nama,no_seri_pabrik,tgl_masuk,id_jenis,id_status,id_ruangan,harga_beli,gambar,jml,ket) VALUES("
                . "'" . $id_barang . "','" . $nama . "','" . $no_seri_pabrik . "',"
                . "'" . $tgl_masuk . "','" . $id_jenis . "','" . $id_status . "',"
                . "'" . $id_ruangan . "','" . $harga_beli . "','" . $gambar . "',"
                . "'" . $jml . "','" . $ket . "')";
        $query = mysql_query($sql) or die(mysql_error());
        move_uploaded_file($_FILES['gambar']['tmp_name'], "photo/" . $_FILES['gambar']['name']);
        refresh('barang_list.php');
    }
}
?>

<?php include('sidebox.php'); ?>

<h3>Menambah Data Barang</h3>
<?php
if (isset($error_barang)) {
    echo $error_barang;
}
?>
<form method="post" action="" enctype="multipart/form-data">
    <table width="450" border="0">
        <tr>
            <td>Id Barang</td>
            <td>:</td>
            <td><label>
                    <input name="id_barang" type="text" id="id_barang" />
                </label></td>
        </tr>
        <tr>
            <td>Nama Barang</td>
            <td>:</td>
            <td><label>
                    <input name="nama" type="text" id="nama" />
                </label></td>
        </tr>
        <tr>
            <td>No Seri Pabrik</td>
            <td>:</td>
            <td><label>
                    <input name="no_seri_pabrik" type="text" id="no_seri_pabrik" />
                </label></td>
        </tr>
        <tr>
            <td>Tgl Masuk</td>
            <td>:</td>
            <td><label>
                    <input name="tgl_masuk" type="date" id="tgl_masuk" />
                </label></td>
        </tr>
        <tr>
            <td>Jenis</td>
            <td>:</td>
            <td><label>
                    <select name="id_jenis" id="id_jenis">
                        <?php
                        $sql_jenis = "SELECT * FROM tb_jenis ORDER BY id_jenis";
                        $query_jenis = mysql_query($sql_jenis) or die(mysql_error());

                        while ($jenis = mysql_fetch_array($query_jenis)) {
                            ?>
                            <option value="<?php echo $jenis['id_jenis']; ?>"><?php echo $jenis['jenis']; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </label></td>
        </tr>
        <tr>
            <td>Status</td>
            <td>:</td>
            <td><label>
                    <select name="id_status" id="id_status">
                        <?php
                        $sql_status = "SELECT * FROM tb_status ORDER BY id_status";
                        $query_status = mysql_query($sql_status) or die(mysql_error());

                        while ($status = mysql_fetch_array($query_status)) {
                            ?>
                            <option value="<?php echo $status['id_status']; ?>"><?php echo $status['status']; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </label></td>
        </tr>
        <tr>
            <td><label>Ruangan</label></td>
            <td>:</td>
            <td><label>
                    <select name="id_ruangan" id="id_ruangan">
                        <?php
                        $sql_ruangan = "SELECT * FROM tb_ruangan ORDER BY id_ruangan";
                        $query_ruangan = mysql_query($sql_ruangan) or die(mysql_error());

                        while ($ruangan = mysql_fetch_array($query_ruangan)) {
                            ?>
                            <option value="<?php echo $ruangan['id_ruangan']; ?>"><?php echo $ruangan['ruangan']; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </label></td>
        </tr>
        <tr>
            <td>Harga Beli</td>
            <td>:</td>
            <td><label>
                    <input name="harga_beli" type="text" id="harga_beli" />
                </label></td>
        </tr>
        <tr>
            <td>Gambar</td>
            <td>:</td>
            <td><label>
                    <input name="gambar" type="file" id="gambar" />
                </label></td>
        </tr>
        <tr>
            <td>Jumlah</td>
            <td>:</td>
            <td><label>
                    <input name="jml" type="text" id="jml">
                </label></td>
        </tr>
        <tr>
            <td>Ket</td>
            <td>:</td>
            <td><label>
                    <input name="ket" type="text" id="ket">
                </label></td>
        </tr>
        <tr>
            <td><label>
                    <input type="submit" name="Submit" value="Tambah">
                </label></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
    </table>
</form>

<?php include('footer.php'); ?>