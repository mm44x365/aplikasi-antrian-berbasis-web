<?php
include('layouts/_header.php');
include('config/config.php');
$loket = $_GET['loket'];

?>

<!--- Content ------------------------------->
<main class="flex-shrink-0">
    <div class="container pt-4">
        <div class="d-flex flex-column flex-md-row px-4 py-3 mb-4 bg-white rounded-2 shadow-sm">
            <!-- judul halaman -->
            <div class="d-flex align-items-center me-md-auto">
                <i class="bi-mic-fill text-success me-3 fs-3"></i>
                <h1 class="h5 pt-2">Panggilan Antrian (Loket <?= $loket ?>)</h1>
            </div>
            <!-- breadcrumbs -->
            <div class="ms-5 ms-md-0 pt-md-3 pb-md-0">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <!-- <li class="breadcrumb-item"><a href="http://www.indrasatya.com/"><i class="bi-house-fill text-success"></i></a></li>
                        <li class="breadcrumb-item" aria-current="page">Dashboard</li>
                        <li class="breadcrumb-item" aria-current="page">Antrian</li> -->
                        <a href="<?= $base_url ?>" class="btn btn-success btn-sm" style="margin-right: 5px;"><i class=" bi-house-door-fill"> Home</i></a>
                        <?php
                        switch ($loket) {
                            case '1':
                                echo "<a href='" . $base_url . "/panggil.php?loket=2' class='btn btn-success btn-sm' style='margin-right: 5px;'><i class='bi-arrow-left-right'> Pindah Loket 2</i></a>";
                                break;
                            case '2':
                                echo "<a href='" . $base_url . "/panggil.php?loket=1' class='btn btn-success btn-sm' style='margin-right: 5px;'><i class='bi-arrow-left-right'> Pindah Loket 1</i></a>";
                                break;
                        }

                        ?>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <!-- menampilkan informasi jumlah antrian -->
            <div class="col-md-3 mb-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-start">
                            <div class="feature-icon-3 me-4">
                                <i class="bi-people text-warning"></i>
                            </div>
                            <div>
                                <p id="jumlah-antrian" class="fs-3 text-warning mb-1"></p>
                                <p class="mb-0">Jumlah Antrian</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- menampilkan informasi nomor antrian yang sedang dipanggil -->
            <div class="col-md-3 mb-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-start">
                            <div class="feature-icon-3 me-4">
                                <i class="bi-person-check text-success"></i>
                            </div>
                            <div>
                                <p id="antrian-sekarang" class="fs-3 text-success mb-1"></p>
                                <p class="mb-0">Antrian Sekarang</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- menampilkan informasi nomor antrian yang akan dipanggil selanjutnya -->
            <div class="col-md-3 mb-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-start">
                            <div class="feature-icon-3 me-4">
                                <i class="bi-person-plus text-info"></i>
                            </div>
                            <div>
                                <p id="antrian-selanjutnya" class="fs-3 text-info mb-1"></p>
                                <p class="mb-0">Antrian Selanjutnya</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- menampilkan informasi jumlah antrian yang belum dipanggil -->
            <div class="col-md-3 mb-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-start">
                            <div class="feature-icon-3 me-4">
                                <i class="bi-person text-danger"></i>
                            </div>
                            <div>
                                <p id="sisa-antrian" class="fs-3 text-danger mb-1"></p>
                                <p class="mb-0">Sisa Antrian</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <div class="table-responsive">
                    <table id="tabel-antrian" class="table table-bordered table-striped table-hover" width="100%">
                        <thead>
                            <tr>
                                <th>Nomor Antrian</th>
                                <th>Status</th>
                                <th>Panggil</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
include('layouts/_footer.php');
?>