  <!-- Footer -->
  <footer class="footer mt-auto py-4">
      <div class="container-fluid">
          <!-- copyright -->
          <div class="copyright text-center mb-2 mb-md-0">
              &copy; 2022 - <a class="text-danger text-decoration-none">Pratama Ardy Prayoga</a>. Some Rights Reserved .
          </div>
      </div>
  </footer>
  <!-- load file audio bell antrian -->
  <audio id="tingtung" src="assets/audio/tingtung.mp3"></audio>

  <!-- jQuery Core -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <!-- Popper and Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

  <!-- DataTables -->
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.js"></script>
  <!-- Responsivevoice -->
  <!-- Get API Key -> https://responsivevoice.org/ -->
  <script src="https://code.responsivevoice.org/responsivevoice.js?key=jQZ2zcdq"></script>

  <script type="text/javascript">
      $(document).ready(function() {
          // tampilkan jumlah antrian
          $('#antrian').load('get_antrian.php');

          // proses insert data
          $('#insert').on('click', function() {
              $.ajax({
                  type: 'POST', // mengirim data dengan method POST
                  url: 'insert.php', // url file proses insert data
                  success: function(result) { // ketika proses insert data selesai
                      // jika berhasil
                      if (result === 'Sukses') {
                          // tampilkan jumlah antrian
                          $('#antrian').load('get_antrian.php').fadeIn('slow');
                      }
                  },
              });
          });
          <?php
            if ($loket) {
            ?>
              // tampilkan informasi antrian
              $('#jumlah-antrian').load('get_jumlah_antrian.php');
              $('#antrian-sekarang').load('get_antrian_sekarang.php');
              $('#antrian-selanjutnya').load('get_antrian_selanjutnya.php');
              $('#sisa-antrian').load('get_sisa_antrian.php');

              // menampilkan data antrian menggunakan DataTables
              var table = $('#tabel-antrian').DataTable({
                  "lengthChange": false, // non-aktifkan fitur "lengthChange"
                  "searching": false, // non-aktifkan fitur "Search"
                  "ajax": "get_antrian_table.php", // url file proses tampil data dari database
                  // menampilkan data
                  "columns": [{
                          "data": "no_antrian",
                          "width": '250px',
                          "className": 'text-center'
                      },
                      {
                          "data": "status",
                          "visible": false
                      },
                      {
                          "data": null,
                          "orderable": false,
                          "searchable": false,
                          "width": '100px',
                          "className": 'text-center',
                          "render": function(data, type, row) {
                              // jika tidak ada data "status"
                              if (data["status"] === "") {
                                  // sembunyikan button panggil
                                  var btn = "-";
                              }
                              // jika data "status = 0"
                              else if (data["status"] === "0") {
                                  // tampilkan button panggil
                                  var btn = "<button class=\"btn btn-success btn-sm rounded-circle\"><i class=\"bi-mic-fill\"></i></button>";
                              }
                              // jika data "status = 1"
                              else if (data["status"] === "1") {
                                  // tampilkan button ulangi panggilan
                                  var btn = "<button class=\"btn btn-secondary btn-sm rounded-circle\"><i class=\"bi-mic-fill\"></i></button>";
                              };
                              return btn;
                          }
                      },
                  ],
                  "order": [
                      [0, "desc"] // urutkan data berdasarkan "no_antrian" secara descending
                  ],
                  "iDisplayLength": 10, // tampilkan 10 data per halaman
              });


              // panggilan antrian dan update data
              $('#tabel-antrian tbody').on('click', 'button', function() {
                  // ambil data dari datatables 
                  var data = table.row($(this).parents('tr')).data();
                  // buat variabel untuk menampilkan data "id"
                  var id = data["id"];
                  // buat variabel untuk menampilkan audio bell antrian
                  var bell = document.getElementById('tingtung');

                  // mainkan suara bell antrian
                  bell.pause();
                  bell.currentTime = 0;
                  bell.play();

                  // set delay antara suara bell dengan suara nomor antrian
                  durasi_bell = bell.duration * 770;

                  // mainkan suara nomor antrian
                  setTimeout(function() {
                      responsiveVoice.speak("Nomor Antrian, " + data["no_antrian"] + ", menuju, loket, <?= $loket ?>", "Indonesian Male", {
                          rate: 0.9,
                          pitch: 1,
                          volume: 1
                      });
                  }, durasi_bell);

                  // proses update data
                  $.ajax({
                      type: "POST", // mengirim data dengan method POST
                      url: "update.php", // url file proses update data
                      data: {
                          id: id
                      } // tentukan data yang dikirim
                  });
              });

              // auto reload data antrian setiap 1 detik untuk menampilkan data secara realtime
              setInterval(function() {
                  $('#jumlah-antrian').load('get_jumlah_antrian.php').fadeIn("slow");
                  $('#antrian-sekarang').load('get_antrian_sekarang.php').fadeIn("slow");
                  $('#antrian-selanjutnya').load('get_antrian_selanjutnya.php').fadeIn("slow");
                  $('#sisa-antrian').load('get_sisa_antrian.php').fadeIn("slow");
                  table.ajax.reload(null, false);
              }, 1000);
          <?php
            }
            ?>


      });

      function printContent(el) {
          var restorepage = $('body').html();
          var printcontent = $('#' + el).clone();
          $('body').empty().html(printcontent);
          window.print();
          $('body').html(restorepage);
      }
  </script>
  </body>

  </html>