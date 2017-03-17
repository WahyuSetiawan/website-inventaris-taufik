<?php
session_start();
include('include/function.php');

//mengecek apakah sudah login
if (!login()) {
    header('Location:index.php');
}

include('header.php');

//proses menampilkan data
if ($_GET && !$_POST) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM tb_barang WHERE id_barang='".$id."'";
    $query = mysql_query($sql) or die(mysql_error());
    $hasil = mysql_fetch_array($query) or die(mysql_error());
} elseif ($_POST) { //proses update data
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

    var_dump($gambar);
    return 0;

    if ($nama == '' || $no_seri_pabrik == '') {
        $error_barang = 'Maaf, nama dan no_seri_pabrik Wajib diisi';
    } else {
        /*
          $sql	= "UPDATE tb_barang SET id_barang='$id_barang',nama='$nama',no_seri_pabrik'$no_seri_pabrik',tgl_masuk='$tgl_masuk',id_jenis='$id_jenis',id_status='$id_status',id_ruangan='$id_ruangan',harga_beli='$harga_beli',
          gambar='$gambar',jml='$jml',ket='$ket' WHERE id_barang=$id_barang";
         */
        $sql = "UPDATE tb_barang b join tb_jenis j on b.id_jenis=j.id_jenis join tb_status s on s.id_status=b.id_status join tb_ruangan rn on rn.id_ruangan=b.id_ruangan SET id_barang='$id_barang',nama='$nama',no_seri_pabrik='$no_seri_pabrik',tgl_masuk='$tgl_masuk',b.id_jenis='$id_jenis',b.id_status='$id_status',b.id_ruangan='$id_ruangan',harga_beli='$harga_beli',
				gambar='$gambar',jml='$jml',b.ket='$ket' WHERE id_barang=$id_barang ";


        $query = mysql_query($sql) or die(mysql_error());
        move_uploaded_file($_FILES['gambar']['tmp_name'], "photo/" . $_FILES['gambar']['name']);
        refresh('barang_list.php');
    }
}
?>

<?php include('sidebox.php'); ?>

<h3> Edit Data Barang</h3>

<?php
if (isset($error_barang)) {
    echo $error_barang;
}
?>

<form method="post" action="">
    <table width="350" border="0">
        <tr>
            <td>Id Barang</td>
            <td>:</td>
            <td><label>
                    <input name="id_barang" type="text" id="id_barang" value="<?php echo $hasil['id_barang']; ?>" />
                </label></td>
        </tr>
        <tr>
            <td>Nama Barang</td>
            <td>:</td>
            <td><label>
                    <input name="nama" type="text" id="nama" value="<?php echo $hasil['nama']; ?>" />
                </label></td>
        </tr>
        <tr>
            <td>No Seri Pabrik</td>
            <td>:</td>
            <td><label>
                    <input name="no_seri_pabrik" type="text" id="no_seri_pabrik" value="<?php echo $hasil['no_seri_pabrik']; ?>" />
                </label></td>
        </tr>
        <tr>
            <td>Tgl Masuk</td>
            <td>:</td>
            <td><label>
                    <input name="tgl_masuk" type="date" id="tgl_masuk" value="<?php echo $hasil['tgl_masuk']; ?>" />
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
                            <option value="<?php echo $jenis['id_jenis']; ?>" <?php if ($jenis['id_jenis'] == $hasil['id_jenis']) {
        echo 'selected';
    } ?>><?php echo $jenis['jenis']; ?></option>
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
                            <option value="<?php echo $status['id_status']; ?>" <?php if ($status['id_status'] == $hasil['id_status']) {
        echo 'selected';
    } ?>><?php echo $status['status']; ?></option>
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
                            <option value="<?php echo $ruangan['id_ruangan']; ?>"<?php if ($ruangan['id_ruangan'] == $hasil['id_ruangan']) {
        echo 'selected';
    } ?>><?php echo $ruangan['ruangan']; ?></option>
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
                    <input name="harga_beli" type="text" id="harga_beli" value="<?php echo $hasil['harga_beli']; ?>" ></textarea>
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
                    <input name="jml" type="text" id="jml" value="<?php echo $hasil['jml']; ?> "/>
                </label></td>
        </tr>
        <tr>
            <td>Ket</td>
            <td>:</td>
            <td><label>
                    <input name="ket" type="text" id="ket" value="<?php echo $hasil['ket']; ?> "/>
                </label></td>
        </tr>
        <tr>
            <td><label>
                    <input type="submit" name="Submit" value="Simpan" />
                </label></td>
            <td>&nbsp;</td>
            <td><input name="id" type="hidden" id="id" value="<?php echo $hasil['id_barang']; ?>"></td>
        </tr>
    </table>
</form>

<?php include('footer.php'); ?>