<?php
include('layouts/_header.php');
include('config/config.php');
$loket = isset($_GET['loket']) ? $_GET['loket'] : NULL;

?>

<!--- Content ------------------------------->
<main class="flex-shrink-0">
    <div class="container pt-5">
        <div class="row justify-content-lg-center">
            <div class="col-lg-6 mb-4">
                <!-- <div class="px-4 py-3 mb-4 bg-white rounded-2 shadow-sm">
                    <div class="d-flex align-items-center me-md-auto">
                        <i class="bi-people-fill text-success me-3 fs-3"></i>
                        <h1 class="h5 pt-2">Nomor Antrian</h1>
                    </div>
                </div> -->

                <div class="card border-0 shadow-sm">
                    <div class="card-body text-center d-grid p-5">
                        <div id="print" class="border border-success rounded-2 py-2 mb-2">
                            <h5 class="text-center">KEJAKSAAN NEGERI MATARAM</h5>
                            <p class="text-center"> Jl. Dr Sudjono Lingkar Selatan No.189, Jempong Baru, Kec. Sekarbela, Kota Mataram</p>
                            <center>
                                <img class="responsive" src="assets/img/kejaksaan.png" alt="">
                            </center>
                            <hr>
                            <h4 class="pt-4 text-center">NOMOR ANTRIAN</h4>
                            <!-- menampilkan informasi jumlah antrian -->
                            <h1 id="antrian" class="display-1 fw-bold text-success text-center lh-1 pb-2"></h1>
                            <hr>
                            <p class="text-center">Silahkan tunggu sampai nomor anda dipanggil Waktu antrian</p>
                            <p class="text-center">BUDAYAKAN ANTRI DAN TERTIB</p>
                        </div>
                        <!-- button pengambilan nomor antrian -->
                        <!-- <a id="insert" href="javascript:void(0)" class="btn btn-success btn-block rounded-pill fs-5 px-5 py-2 mb-2">
                            <i class="bi-person-plus fs-4 me-2"></i> Ambil Nomor
                        </a>
                        <hr>
                        <a onclick="printContent('print');" class="btn btn-success btn-block rounded-pill fs-5 px-5 py-2 mb-2">
                            <i class="bi-print fs-4 me-2"></i> Cetak Nomor
                        </a> -->
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body text-center d-grid p-5">

                        <!-- button pengambilan nomor antrian -->
                        <a id="insert" href="javascript:void(0)" class="btn btn-success btn-block rounded-pill fs-5 px-5 py-3 mb-2">
                            <i class="bi-journal fs-4 me-2"></i> Ambil Nomor
                        </a>
                        <hr>
                        <a onclick="printContent('print');" class="btn btn-success btn-block rounded-pill fs-5 px-5 py-3 mb-2">
                            <i class="bi-printer fs-4 me-2"></i> Cetak Nomor
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