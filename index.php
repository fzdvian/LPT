<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Homepage</title>
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/styles.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  </head>
  <body>
  <div class="container-header">
    <div class="navbar" id='navbar'>
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
  <div class="container-content">
    <div class="thumbnail">
            <div class="thumbnail-img">
                <img src="img/home.png" alt="">
            </div>
            <div class="thumbnail-text">
                <h1>Selamat Datang Para Pelanggan Setia PLN</h1>
                <p>Aplikasi Layanan Pelanggan Terpadu PLN merupakan solusi inovatif yang ditawarkan oleh Perusahaan Listrik Negara (PLN) untuk memberikan pengalaman layanan yang lebih baik kepada pelanggan. Aplikasi ini didesain untuk memudahkan pelanggan dalam melaporkan pengaduan dan mengajukan permohonan layanan listrik tanpa kesulitan. Berikut adalah beberapa</p>
                <a href="#services">Selengkapnya</a>
            </div>
      </div>

    <div class="services" id="services">
      <div class="service-list">
            <ul>
              <li>
                <h3>Perubahan Daya/Migrasi</h3>
                <p>Perubahan daya adalah layanan untuk meningkatkan atau menurunkan kapasitas daya listrik untuk rumah atau keperluan bisnis dan lainya.</p>
              </li>
              <li>
                <h3>Penyambungan Sementara</h3>
                <p>Sambungan sementara sendiri adalah layanan pemasangan daya listrik dalam waktu sementara untuk kegiatan tertentu yang membutuhkan daya listrik lebih besar, misalnya untuk acara pesta, baik pesta ulang tahun, pernikahan, atau kegiatan-kegiatan lainnya yang memerlukan daya listrik berkapasitas tinggi.</p>
              </li>
              <li>
                <h3><a href="Layanan.php">Layanan Pengaduan Terpadu</a></h3>
                <p>Kami menyediakan layanan pengaduan guna untuk membantu para pelanggan untuk memecahkan masalah terkait kelistrikan secara online yang cepat, mudah, nyaman, dan aman serta dapat dimonitor prosesnya.</p>
              </li>
            </ul>
          </div>
          <div class="img-service">
            <img src="img/service.png" alt="">
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
    document.addEventListener("DOMContentLoaded", function() {
        const Report = document.getElementById("report-popup");
        const Ticket = document.getElementById("ticket-popup");
        const ticketPopup = document.querySelector(".ticket-card-popup");
        const reportPopup = document.querySelector(".report-card-popup");
        const closeBtn1 = document.getElementById("close-report-popup");
        const closeBtn2 = document.getElementById("close-ticket-popup");

        if (Report && reportPopup && Ticket && ticketPopup && closeBtn1 && closeBtn2) {
            Report.addEventListener("click", () => {
                reportPopup.classList.add("active");
            });

            Ticket.addEventListener("click", () => {
                ticketPopup.classList.add("active");
            });

            closeBtn1.addEventListener("click", (event) => {
                event.preventDefault();
                reportPopup.classList.remove("active");
            });

            closeBtn2.addEventListener("click", (event) => {
                event.preventDefault();
                ticketPopup.classList.remove("active");
            });
        }
    });
  </script>

</body>
</html>
