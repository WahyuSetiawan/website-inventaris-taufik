<?php
include('include/koneksi.php');
include('include/function.php');
$no = 1;
$tanggal = date('D d-M-Y');
/* $query = "SELECT * FROM tb_detail where id_detail='".$_GET['id']."'"; */
$query = "SELECT"
        . " k.nama, tb_detail.id_pinjam, k.nik, p.tgl_pinjam, p.tgl_kembali, k.nohp, tb_detail.ket "
        . " FROM tb_pinjam p "
        . "join tb_karyawan k on p.nik=k.nik "
        . "join tb_detail on tb_detail.id_pinjam = p.id_pinjam "
        . "join tb_barang on tb_detail.id_barang = tb_barang.id_barang "
        . "ORDER BY p.id_pinjam DESC";
$unduh = mysql_query($query) or exit(mysql_error());

header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=Laporan_Data_Pinjam.doc");
?>
<table border="0" align="center" bgcolor="#FF9933">
    <tr> 
        <td><font size="+2"><strong>Laporan : Data Peminjaman Barang</strong></font></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr bgcolor="#FFFFFF">
        <td><hr />
            <h4 align="center"><u>DATA PEMINJAMAN</u></h4>
            <table border="0" align="center" bordercolor="#FF6600" >
                <tr bgcolor="#FF9933">
                    <th>No</th>
                    <th>Id Pinjam</th>
                    <th>Id Barang</th>
                    <th>Nama pinjam</th>
                    <th>Nik</th>
                    <th>Barang</th>
                    <th>Tgl Pinjam</th>
                    <th>Tgl Kembali</th>
                    <th>Jumlah</th>
                    <th>No Hp</th>
                    <th>Keterangan</th>
                </tr>

                <?php
                $id_pinjam_sebelum = "";
                while ($value = mysql_fetch_assoc($unduh)) {
                    if ($id_pinjam_sebelum == $value['id_pinjam']) {
                        continue;
                    }
                    $id_pinjam_sebelum = $value['id_pinjam'];
                    ?>
                    <tr bgcolor="#99CC33">
                        <td align="center"><?php echo $no++; ?></td>
                        <td align="center"><?php echo $value['id_pinjam']; ?></td>
                        <td align="center">
                         <?php
                            $i = 0;
                            $text = '';
                            $query_barang = mysql_query("select tb_detail.id_barang from tb_detail join tb_barang on tb_barang.id_barang = tb_detail.id_barang where tb_detail.id_pinjam = '" . $value['id_pinjam'] . "'");
                            while ($result = mysql_fetch_assoc($query_barang)) {
                                if ($i > 0) {
                                    $text .= ", ";
                                }
                                $text .= $result['id_barang'];
                                $i++;
                            }
                            echo $text;
                            ?>
                        </td>
                        <td align="center"><?php echo $value['nama']; ?></td>
                        <td align="center"><?php echo $value['nik']; ?></td>
                        <td align="center">
                            <?php
                            $i = 0;
                            $text = '';
                            $query_barang = mysql_query("select * from tb_detail join tb_barang on tb_barang.id_barang = tb_detail.id_barang where tb_detail.id_pinjam = '" . $value['id_pinjam'] . "'");
                            while ($result = mysql_fetch_assoc($query_barang)) {
                                if ($i > 0) {
                                    $text .= ", ";
                                }
                                $text .= $result['nama'];
                                $i++;
                            }
                            echo $text;
                            ?>
                        </td>
                        <td align="center"><?php echo $value['tgl_pinjam']; ?></td> 
                        <td align="center"><?php echo $value['tgl_kembali']; ?></td>
                        <td align="center">
                            <?php
                            $i = 0;
                            $text = '';
                            $query_barang = mysql_query("select tb_detail.jml from tb_detail join tb_barang on tb_barang.id_barang = tb_detail.id_barang where tb_detail.id_pinjam = '" . $value['id_pinjam'] . "'");
                            while ($result = mysql_fetch_assoc($query_barang)) {
                                if ($i > 0) {
                                    $text .= ", ";
                                }
                                $text .= $result['jml'];
                                $i++;
                            }
                            echo $text;
                            ?>
                        </td>
                        <td align="center"><?php echo $value['nohp']; ?></td>
                        <td align="center"><?php echo $value['ket']; ?></td>
                    </tr>
                <?php } ?>
                <tr><td colspan="4">Tanggal Cetak : <?php echo "$tanggal"; ?></td><td colspan="3"></td></tr>
            </table>

            <hr />
            <br /><br />
        </td>
    </tr>
</table>
<?php
// } ?>