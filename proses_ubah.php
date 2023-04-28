<!-- Aplikasi CRUD -->

<?php
// memanggil file siswa.php
include 'class/masyarakat.php';

if (isset($_POST['ubah'])) {
    if (isset($_POST['rt'])) {
        // membuat objek mahasiswa
        $dataMasyarakat = new Masyarakat();

        // ambil data hasil submit dari form ubah
        $rt = $_POST['rt'];
        $nama = trim($_POST['nama']);
        $tanggal = $_POST['tgl_lahir'];
        $tgl = explode('-', $tanggal);
        $tanggal_lahir = $tgl[2].'-'.$tgl[1].'-'.$tgl[0];

        $jenis_kelamin = $_POST['jenis_kelamin'];
        $status = trim($_POST['status']);

        // update data mahasiswa
        $dataMasyarakat->updateData($rt, $nama, $tanggal_lahir, $jenis_kelamin, $status);
    }
}
?>