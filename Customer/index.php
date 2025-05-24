<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Streamhub</title>
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
      integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet" />
  </head>
  <body id="top">
    <!-- Floating Icon -->
    <a href="#top" class="scroll-to-top" id="scrollToTop">
      <i class="bx bx-up-arrow-alt"></i>
    </a>
    
    <!-- Header -->
    <header>
      <div class="left-head">
        <div class="navbar">
          <div class="toggle_btn">
            <i class="fa-solid fa-bars"></i>
          </div>
        </div>
        <div class="dropdown-menu">
          <li>
            <a href="#top"><i class="fa-solid fa-house"></i> Home</a>
          </li>
          <li>
            <a href="#about"><i class="fa-regular fa-address-card"></i> About</a>
          </li>
          <li>
            <a href="#feedback"><i class="fa-regular fa-address-book"></i> Feedback</a>
          </li>
        </div>
      </div>
      <div class="center-head">
        <img src="../Assets/logo.png" alt="Streamhub" />
      </div>
      <div class="right-head"></div>
    </header>
    <!-- Akhir Header -->

    <!-- Section Home -->
    <section id="home">
      <h3>STREAMHUB MOVIE LIST</h3>
      <div class="movie-list">
        <?php include 'movies.php'; ?>
      </div>
    </section>
    <!-- Akhir Section Home -->

    <!-- Section About -->
    <section id="about">
      <h1 style="margin-bottom: 20px">Tonton, Rasakan, Ceritakan!</h1>
      <p>
        Dibuat Pada Tahun 2024 oleh Sekelompok Mahasiswa IT USU, Stream hub adalah Website Gratis yang menyediakan berbagai Pilihan Film untuk para pecinta Film di Indonesia. Stream hub Menyediakan berbagai jenis Film dengan kualitas HD,
        suara yang jernih, dan subtitle berbahasa Indonesia. Stream hub bertujuan untuk menyalurakan Film dan memberikan akses yang mudah bagi mereka yang kesulitan untuk menonton film secara langsung. Tidak dapat menemukan Film yang kamu
        cari? Tenang saja . Stram hub memiliki sistem Report yang dapat menghub ungkan kamu langsung dengan para Admin yang bertanggung jawab. Apa? Website Error? kamu juga bisa langsung menghubungi para Admin melalui fitur Report. Jangan
        Takut karena para Admin tidak jahat ;)
      </p>
      <h1 class="introduce">Kami Menciptakan, Anda Menikmati</h1>

      <!-- Member Tim -->
      <div class="slider-container">
        <div class="slider-images">
          <div class="slider-img">
            <img src="../Assets/creator/4.jpg" alt="1" />
            <h1>Fidelis</h1>
            <div class="details">
              <h2>Fidelis</h2>
              <p>Front-end Developer Web Admin</p>
              <a href="https://www.instagram.com/delpyys/" class="insta"><i class="fa-brands fa-instagram"></i></a>
              <a href="#" class="github"><i class="fa-brands fa-github"></i></a>
            </div>
          </div>
          <div class="slider-img">
            <img src="../Assets/creator/3.jpg" alt="2" />
            <h1>Rafael</h1>
            <div class="details">
              <h2>Rafael</h2>
              <p>Front-end Developer Web Customer</p>
              <a class="insta" href="https://www.instagram.com/zeentoo26?igsh=MW4zbzgwbDN2N2VpdA=="><i class="fa-brands fa-instagram"></i></a>
              <a href="https://github.com/Rafael-S-26" class="github"><i class="fa-brands fa-github"></i></a>
            </div>
          </div>
          <div class="slider-img">
            <img src="../Assets/creator/2.jpg" alt="3" />
            <h1>Paskalis</h1>
            <div class="details">
              <h2>Paskalis</h2>
              <p>Designer Web Customer</p>
              <a class="insta" href="https://www.instagram.com/justraven._/"><i class="fa-brands fa-instagram"></i></a>
              <a href="https://github.com/PaskalisSitumorang" class="github"><i class="fa-brands fa-github"></i></a>
            </div>
          </div>
          <div class="slider-img active">
            <img src="../Assets/creator/1.jpg" alt="4" />
            <h1>Mike</h1>
            <div class="details">
              <h2>Michael Babtista (Team Leader)</h2>
              <p>Backend Developer</p>
              <a class="insta" href="https://www.instagram.com/mike._.airjordan/"><i class="fa-brands fa-instagram"></i></a>
              <a href="https://github.com/mikepakpahan" class="github"><i class="fa-brands fa-github"></i></a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Akhir Section About -->

    <!-- Section Feedback -->
    <section id="feedback" class="feedback-section">
      <h2>Pengen request film? Tinggalkan pesan anda.</h2>
      <p style="font-size: 0.8rem">(Asal jangan request film jepang)</p>

    <form id="feedback-form" method="POST" class="feedback-form">
        <div class="form-group">
            <label for="name">Nama:</label>
            <input type="text" id="name" name="name" placeholder="Masukkan nama Anda" required />
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Masukkan email Anda" required />
        </div>
        <div class="form-group">
            <label for="message">Pesan:</label>
            <textarea id="message" name="message" rows="5" placeholder="Tulis pesan Anda di sini..." required></textarea>
        </div>
        <button type="submit" class="btn-submit">Kirim Feedback</button>
    </form>

    </section>

    <script src="scripts.js"></script>
    <script src="jQuery.js"></script>
    <script>
      jQuery(document).ready(function ($) {
        $(".slider-img").on("click", function () {
          $(".slider-img").removeClass("active");
          $(this).addClass("active");
        });
      });

// feedback form
      document.addEventListener('DOMContentLoaded', function () {
          const form = document.getElementById('feedback-form');
          
          form.addEventListener('submit', function (event) {
              event.preventDefault(); // Mencegah form submit biasa

              const formData = new FormData(form);

              // Mengirim data ke PHP menggunakan AJAX
              fetch('feedback.php', {
                  method: 'POST',
                  body: formData
              })
              .then(response => response.text())
              .then(data => {
                  if (data === 'Success') {
                      // Menampilkan alert jika pesan berhasil dikirim
                      alert('Pesan Anda telah dikirim. Kami akan menguhubungi anda lewat email, Terima kasih!.');
                      form.reset(); // Mengosongkan form setelah berhasil
                  } else {
                      alert('Terjadi kesalahan saat mengirim pesan. Coba lagi nanti.');
                  }
              })
              .catch(error => {
                  console.error('Error:', error);
                  alert('Terjadi kesalahan pada sistem. Coba lagi nanti.');
              });
          });
      });


    </script>
  </body>
</html>
