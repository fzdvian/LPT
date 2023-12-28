<?php
require "function/function.php";

if (isset($_POST['Kirim'])) {
    $id = $_POST['id'];
    if (edit($_POST, $id) > 0) {
        echo "<script>alert('Pengaduan berhasil DICALLBACK!');document.location.href='#antrian'</script>";
    }
}

if (isset($_POST['fetchData'])) {
    $id = $_POST['id'];
    fetchFormData($id);
}

if (isset($_GET['delete_id'])) {
    $deleteId = $_GET['delete_id'];
    $deleteResult = deletePengaduan($deleteId);

    if ($deleteResult['success']) {
        echo "<script>alert('Pengaduan berhasil diclose!'); document.location.href='#antrian'</script>";
    } else {
        echo "<script>alert('Gagal mengclose pengaduan!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <title>Halaman Admin</title>
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
                <a href="login.php" id="logout"><i class='bx bx-log-out'></i>Logout</a>
            </div>
        </div>
    </div>
    <div class="container-content">
        <div class="thumbnail">
            <div class="thumbnail-img">
                <img src="img/admin.png" alt="">
            </div>
            <div class="thumbnail-text">
                <h1>Selamat Datang Admin!</h1>
                <p>Silahkan melakukan CALLBACK untuk menindaklanjuti pengaduan dari pelanggan</p>
                <a href="#antrian">CALLBACK</a>
            </div>
        </div>
        <div class="antrian" id="antrian">
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
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $tampil = mysqli_query($conn, "SELECT * FROM pengaduan");
                        while ($row = mysqli_fetch_array($tampil)) {
                        ?>
                            <tr>
                                <td><?= $row['nopel'] ?></td>
                                <td><?= $row['nama'] ?></td>
                                <td><?= $row['email'] ?></td>
                                <td><?= $row['notelp'] ?></td>
                                <td><?= $row['stats'] ?></td>
                                <td><?= $row['kategori'] ?></td>
                                <td><?= $row['alamat'] ?></td>
                                <td><a class="edit-btn" href='#' data-id='<?php echo $row['id'] ?>'>CALLBACK</a></td>
                                <td><a class="del-btn" href="#" data-id="<?= $row['id'] ?>">CLOSE</a></td>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="report-card-popup">
            <div class="report-card">
                <form action="admin.php" method="POST">
                    <div class="top-popup">
                        <span>Form Callback Pengaduan</span>
                        <button class="btn-close" id="close-report-popup">&times;</button>
                    </div>
                    <div class="form-group" id="form-container">
                        <label for="nopel">Nomor Pelanggan:</label>
                        <input type="number" id="nopel" name="nopel" readonly required /><br /><br />

                        <input type="hidden" id="id" name="id" value="" /> 

                        <label for="nama">Nama:</label>
                        <input type="text" id="nama" name="nama" required /><br /><br />

                        <label for="email">Email:</label>
                        <input type="text" id="email" name="email" required /><br /><br />

                        <label for="notelp">Nomor Telepon:</label>
                        <input type="number" id="notelp" name="notelp" required /><br /><br />

                        <label for="kategori">Kategori Pengaduan:</label>
                        <select id="kategori" name="kategori" required>
                        <option value="Permohonan Perubahan Daya">Permohonan Perubahan Daya</option>
                        <option value="Permohonan Penyambungan Baru">Permohonan Penyambungan Baru</option>
                        <option value="Permohonan Penyambungan Sementara">Permohonan Penyambungan Sementara</option>
                        <option value="Pemadaman Listrik">Pemadaman Listrik</option>
                        <option value="Tagihan Tidak Sesuai">Tagihan Tidak Sesuai</option>
                        <option value="Kerusakan Pada KWH Meter">Kerusakan Pada KWH Meter</option>
                        <option value="Pasang Unit Baru">Pasang Unit Baru</option>
                        <option value="Lainnya">Lainnya</option>
                        </select><br /><br />
                        
                        <label for="stats">Status Pengaduan:</label>
                        <select id="stats" name="stats" required>
                        <option value="DIPROSES">DIPROSES</option>
                        <option value="DICALLBACK">DICALLBACK</option></select
                        ><br /><br />

                        <label for="alamat">Alamat:</label><br />
                        <textarea id="alamat" name="alamat" readonly rows="4" required></textarea><br /><br />
                    </div>
                    <div class="btn-card-popup">
                        <button type="submit" name="Kirim">CALLBACK</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <footer>
      <div class="footer-top">
          <div class="logo-footer">x
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
          <div class="about" id="about">
              <h4>About</h4>
              <span>Aplikasi Layanan Pengaduan Terpadu PLN merupakan solusi inovatif yang ditawarkan oleh Perusahaan Listrik Negara (PLN) untuk mempermudah pelanggan dalam melaporkan dan menyelesaikan berbagai masalah terkait layanan listrik. Aplikasi ini dirancang untuk memberikan pengalaman pengguna yang lebih baik dan efisien dalam menangani pengaduan. </span>
          </div>
      </div>
  </footer>

<div class="copyright">
    <p>&copy; 2023 PT PLN Persero</p>
</div>

    <script>
    document.addEventListener("DOMContentLoaded", function () {
    const editButtons = document.querySelectorAll('.edit-btn');

    editButtons.forEach(function (button) {
        button.addEventListener('click', function (event) {
            event.preventDefault();
            const id = button.getAttribute('data-id');
            fillEditForm(id);
        });
    });

    function fillEditForm(id) {
    const formData = new FormData();
    formData.append('id', id);
    formData.append('fetchData', true);

    fetch('admin.php', {
        method: 'POST',
        body: formData
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {

        console.log('Nilai Stats dari server', data.data.stats);
        document.getElementById('id').value = id;
        // Isi formulir dengan data yang diterima dari server
        document.getElementById('nopel').value = data.data.nopel;
        document.getElementById('nama').value = data.data.nama;
        document.getElementById('email').value = data.data.email;
        document.getElementById('notelp').value = data.data.notelp;
        document.getElementById('stats').value = data.data.stats;
        document.getElementById('kategori').value = data.data.kategori;
        document.getElementById('alamat').value = data.data.alamat;

        // Aktifkan kolom-kolom yang ingin diubah
        document.getElementById('nama').removeAttribute('readonly');
        document.getElementById('email').removeAttribute('readonly');
        document.getElementById('notelp').removeAttribute('readonly');
        document.getElementById('stats').removeAttribute('readonly');
        document.getElementById('kategori').removeAttribute('readonly'); // Menghapus atribut disabled agar dapat diubah
        document.getElementById('alamat').removeAttribute('readonly');

        // Tampilkan popup atau lakukan tindakan lainnya
        const reportPopup = document.querySelector(".report-card-popup");
        reportPopup.classList.add("active");
    })
    .catch(error => console.error('Error:', error));
}
});

document.addEventListener("DOMContentLoaded", function () {
    const editButtons = document.querySelectorAll('.edit-btn');
    const delButtons = document.querySelectorAll('.del-btn');

    editButtons.forEach(function (button) {
        button.addEventListener('click', function (event) {
            event.preventDefault();
            const id = button.getAttribute('data-id');
            fillEditForm(id);
        });
    });

    delButtons.forEach(function (button) {
        button.addEventListener('click', function (event) {
            event.preventDefault();
            const id = button.getAttribute('data-id');
            const confirmDelete = confirm('Yakin ingin mengclose pengaduan?');

            if (confirmDelete) {
                document.location.href = 'admin.php?delete_id=' + id;
            }
        });
    });

    function fillEditForm(id) {
        // ... (kode sebelumnya)
    }
});

</script>


</script>

</body>

</html>
