<?php
require "function/function.php";

if(isset($_POST['kirim'])){
    if(insert($_POST) > 0){
        echo "<script>alert('Berhasil membuat Pengaduan! Pengaduan akan otomatis terhapus setelah tercallback selama 24 jam');document.location.href='Layanan.php'</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pengaduan</title>
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/styles.css" /> 
</head>
<body>
    <div class="container-header">
        <div class="navbar">
            <div class="logo">
                <div class="logo-image"><img src="img/logo.png" alt=""></div>
                <p>|</p>
                <div class="logo-text">Layanan Pelanggan Terpadu</div>
            </div>
            <div class="navlink">
              <a href="index.php" id="home">Home</a>
              <a href="Layanan.php" id="layanan">Pengaduan</a>
              <a href="#footer">Learn More</a>
              <a href="login.php" id="logout"><i class='bx bx-log-out'></i>Logout</a>
          </div>
        </div>
    </div>
    <div class="layanan">
        <div class="judul">
            <h1>Formulir Pengaduan</h1>
            <p>Silakan isi formulir di bawah ini untuk mengajukan pengaduan masalah</p>
        </div>
        <div class="form">
             <form autocapitalize="off" onsubmit="return confirmSubmit()" method="POST">
                        <label for="nomor_pelanggan">Nomor Pelanggan:</label>
                            <input
                            type="number"
                            id="nopel"
                            name="nopel"
                    
                            /><br /><br />
                            <input type="hidden" name="savedUsername" id="savedUsername">
                            
                            <label for="nama">Nama:</label>
                            <input type="text" id="nama" name="nama" required /><br /><br />
                
                            <label for="email">Email:</label>
                            <input type="text" id="email" name="email" required /><br /><br />
                
                            <label for="notelp">Nomor Telepon:</label>
                            <input
                            type="number"
                            id="notelp"
                            name="notelp"
                            required
                            /><br /><br />

                            <!-- <label for="kategori">Status Pengaduan:</label>
                            <select id="stats" name="stats" required>
                            <option value="Permohonan">Permohonan</option>
                            <option value="Pengaduan">Pengaduan</option>
                            </select><br /><br /> -->
                
                            <label for="kategori">Kategori Pengaduan:</label>
                            <select id="kategori" name="kategori" required>
                            <option value="Permohonan Perubahan Daya">Permohonan Perubahan Daya</option>
                            <option value="Permohonan Penyambungan Baru">Permohonan Penyambungan Baru</option>
                            <option value="Permohonan Penyambungan Sementara">Permohonan Penyambungan Sementara</option>
                            <option value="Pemadaman Listrik">Pemadaman Listrik</option>
                            <option value="Tagihan Tidak Sesuai">Tagihan Tidak Sesuai</option>
                            <option value="Kerusakan Pada KWH Meter">Kerusakan Pada KWH Meter</option>
                            <option value="Pasang Unit Baru">Pasang Unit Baru</option>
                            <option value="Lainnya">Lainnya</option></select
                            ><br /><br />
                
                            <label for="alamat">Alamat:</label><br />
                            <textarea id="alamat" name="alamat" rows="4" required></textarea
                            ><br /><br />

                            <input type="submit" name="kirim" id="kirim" value="Kirim" />
                            <input type="reset" name="batal" id="batal" value="Batal" />
                </form>
            </div>
        </div>
            <div class="antrian">
                <div class="table-container">
                    <h1>Daftar Pengaduan</h1>
                    <table>
                        <thead>
                            <tr>
                                <th>Nomor Pelanggan</th>
                                <th>Nama Pelanggan</th>
                                <th>Email</th>
                                <th>Nomor Telepon</th>
                                <th>Status Pengaduan</th>
                                <th>Kategori Pengaduan</th>
                                <th>Alamat</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $tampil=mysqli_query($conn, "SELECT * FROM pengaduan");
                            while ($row = mysqli_fetch_array($tampil)){
                            ?>
                                <tr>
                                    <td><?= $row['nopel'] ?></td>
                                    <td><?= $row['nama'] ?></td>
                                    <td><?= $row['email'] ?></td>
                                    <td><?= $row['notelp'] ?></td>
                                    <td><?= $row['stats'] ?></td>
                                    <td><?= $row['kategori'] ?></td>
                                    <td><?= $row['alamat'] ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <footer>
      <div class="footer-top" id="footer">
          <div class="logo-footer">
              <img src="img/logo.png" alt="">
              <p>|</p>
              <span>PT PLN <span class="psiko">Persero</span></span>
          </div>
          <div class="content-footer">
            <div class="contact">
                  <h4>Contact</h4>
                  <span><i class='bx bxs-phone-call' ></i> (kode area) 123</span>
                  <span><i class='bx bx-envelope'></i></i> pln123@pln.co.id</span>
              </div>
              <div class="social-media">
                  <h4>Social Media</h4>
                  <span><i class='bx bxl-instagram'></i> pln123_official</span>
                  <span><i class='bx bxl-twitter'></i> @pln_123</span>
              </div>
          </div>
      </div>
      <div class="footer-bot">
          <div class="about">
              <h4>About</h4>
              <span>Aplikasi Layanan Pengaduan Terpadu PLN merupakan solusi inovatif yang ditawarkan oleh Perusahaan Listrik Negara (PLN) untuk mempermudah pelanggan dalam melaporkan dan menyelesaikan berbagai masalah terkait layanan listrik. Aplikasi ini dirancang untuk memberikan pengalaman pengguna yang lebih baik dan efisien dalam menangani pengaduan. </span>
          </div>
      </div>
  </footer>

  <div class="copyright">
      <p>&copy; 2023 PT PLN Persero</p>
  </div>

    <script>

function confirmSubmit() {
    // Tampilkan dialog konfirmasi
    var confirmResult = confirm("Yakin ingin membuat pengaduan?");

    // Jika pengguna memilih 'OK' (true), kirim pengaduan
    if (confirmResult) {
        return true;
    } else {
        // Jika pengguna memilih 'Cancel' (false), batalkan pengiriman
        return false;
    }
}

    document.addEventListener("DOMContentLoaded", function () {
        const Report = document.getElementById("report-popup");
        const Ticket = document.getElementById("ticket-popup");
        const ticketPopup = document.querySelector(".ticket-card-popup");
        const reportPopup = document.querySelector(".report-card-popup");
        const closeBtn1 = document.getElementById("close-report-popup");
        const closeBtn2 = document.getElementById("close-ticket-popup");

        if (Report) {
            Report.addEventListener("click", () => {
                reportPopup.classList.add("active");
            });
        }

        if (Ticket) {
            Ticket.addEventListener("click", () => {
                ticketPopup.classList.add("active");
            });
        }

        if (closeBtn1) {
            closeBtn1.addEventListener("click", (event) => {
                event.preventDefault();
                reportPopup.classList.remove("active");
            });
        }

        if (closeBtn2) {
            closeBtn2.addEventListener("click", (event) => {
                event.preventDefault();
                ticketPopup.classList.remove("active");
            });
        }

        let stars = document.querySelectorAll('.star');
        stars.forEach(function (e) {
            e.addEventListener('click', function (event) {
                let previousSiblings = [];
                let currentElement = e;

                let previousSibling = e.previousElementSibling;

                while (previousSibling) {
                    previousSiblings.push(previousSibling);
                    previousSibling = previousSibling.previousElementSibling;
                }

                previousSiblings.push(currentElement);

                stars.forEach(function (star) {
                    if (star != currentElement) {
                        star.classList.remove('selected');
                    }
                });

                previousSiblings.forEach(function (element) {
                    element.classList.add('selected');
                });

                console.log("Elemen yang dipilih dan previous siblings:");
                console.log(previousSiblings);
            });
        });
    });
</script>
</body>
</html>

