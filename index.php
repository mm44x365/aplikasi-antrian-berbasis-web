<?php
include('layouts/_header.php');

?>

<!--- Content ------------------------------->
<main class="flex-shrink-0">
  <div class="container pt-5">
    <!-- tampilkan pesan selamat datang -->
    <!-- <div class="alert alert-light d-flex align-items-center mb-5" role="alert">
      <i class="bi-info-circle text-success me-3 fs-3"></i>
      <div>
        Selamat Datang di <strong>Aplikasi Antrian Berbasis Web</strong>. Silahkan pilih halaman yang ingin ditampilkan.
      </div>
    </div> -->

    <div class="row gx-5">
      <!-- link halaman nomor antrian -->
      <div class="col-lg-6 mb-4">
        <div class="card border-0 shadow-sm">
          <div class="card-body p-5">
            <div class="feature-icon-1 bg-success bg-gradient mb-4">
              <i class="bi-people"></i>
            </div>
            <h3>Nomor Antrian</h3>
            <p class="mb-4">Halaman Nomor Antrian digunakan pengunjung untuk mengambil nomor antrian.</p>
            <a href="antrian.php" class="btn btn-success rounded-pill px-4 py-2">
              Tampilkan <i class="bi-chevron-right ms-2"></i>
            </a>
          </div>
        </div>
      </div>
      <!-- link halaman panggilan antrian -->
      <div class="col-lg-6 mb-4">
        <div class="card border-0 shadow-sm">
          <div class="card-body p-5">
            <div class="feature-icon-1 bg-success bg-gradient mb-4">
              <i class="bi-mic"></i>
            </div>
            <h3>Panggilan Antrian</h3>
            <p class="mb-4">Halaman Panggilan Antrian digunakan petugas loket untuk memanggil antrian pengunjung.</p>
            <a href="panggil.php?loket=1" class="btn btn-success rounded-pill px-4 py-2">
              Loket 1 <i class="bi-chevron-right ms-2"></i>
            </a>
            <a href="panggil.php?loket=2" class="btn btn-success rounded-pill px-4 py-2">
              Loket 2 <i class="bi-chevron-right ms-2"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<?php
include('layouts/_footer.php');
?>