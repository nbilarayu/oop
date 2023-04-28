<?php include 'template/header.php'; ?>
<?php include 'template/topnavbar.php'; ?>
<?php include 'template/sidebar.php'; ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Masyarakat</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Data Masyarakat</li>
            </ol>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
        
        <div class="mb-3">
          <a href="tambahdata.php" class='btn btn-success'><i class="fas fa-plus"></i> Tambah Data</a>
        </div>
        

        <?php
      if (empty($_GET['alert'])) {
          echo '';
      } elseif ($_GET['alert'] == 1) { ?>
        <script>
          Swal.fire(
            'Gagal!',
            'Terjadi kesalahan',
            'error'
          );
        </script>
      <?php } elseif ($_GET['alert'] == 2) { ?>
        <script>
          Swal.fire(
            'Sukses!',
            'Data masyarakat berhasil disimpan',
            'success'
          );
        </script>
      <?php } elseif ($_GET['alert'] == 3) { ?>
        <script>
          Swal.fire(
            'Sukses!',
            'Data masyarakat berhasil diubah',
            'success'
          );
        </script>
      <?php } elseif ($_GET['alert'] == 4) { ?>
        <script>
          Swal.fire(
            'Sukses!',
            'Data masyarakat berhasil dihapus',
            'success'
          );
        </script>
      <?php } ?>


        <table class="table table-striped table-hover" id="dataTables-example">
          <!--Judul Tabel-->
          <thead>
            <tr>
              <th>No.</th>
              <th>Rt</th>
              <th>Nama</th>
              <th>Tanggal Lahir</th>
              <th>Jenis Kelamin</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <!--Isi Data Tabel-->
            <tbody>
<?php
// memanggil file mahasiswa.php
include 'class/masyarakat.php';
// membuat objek mahasiswa
$dataMasyarakat = new Masyarakat();
// mengambil seluruh data mahasiswa
$result = $dataMasyarakat->tampilData();
$no = 1;
foreach ($result as $data) {
    $tanggal = $data['tgl_lahir'];
    $tgl = explode('-', $tanggal);
    $tanggal_lahir = $tgl[2].'-'.$tgl[1].'-'.$tgl[0];
    ?>
    
    <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $data['rt']; ?></td>
        <td><?php echo $data['nama']; ?></td>
        <td><?php echo $tanggal_lahir; ?></>
        <td><?php echo $data['jenis_kelamin']; ?></td>
        <td><?php echo $data['status']; ?></td>
        <td> 
            <a href="update.php?id=<?php echo $data['id']; ?>" class='btn btn-info'><i class="fas fa-edit"></i></a>
            <a data-toggle="tooltip" data-placement="top" title="Hapus" class="btn btn-danger" onclick="hapusDataMasyarakat('<?php echo $data['nama']; ?>', '<?php echo $data['rt']; ?>')"><i class="fas fa-trash"></i></a>
        </td>
    </tr>
    <?php ++$no; ?>
<?php } ?>

            </tbody>
          
          </table>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
</div>
<script>
  function hapusDataMasyarakat(nama, rt) {
      console.log(nama)
      console.log(rt)
      Swal.fire({
        title: 'Apakah anda yakin?',
        text: `Anda ingin menghapus data masyarakat ${nama} ?`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus data!'
      }).then((result) => {
        if (result.isConfirmed) {
          document.location.href = `proses_hapus.php?id=${rt}>`
        }
      })
    };
    
      
    
  </script>


<?php include 'template/footer.php'; ?>
