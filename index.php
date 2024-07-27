<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Boxicons -->
    <link
      href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css"
      rel="stylesheet"
    />
    <!-- My CSS -->
    <link rel="stylesheet" href="./assets/css/style.css" />
    

    <title>Data Management Mahasiswa</title>
  </head>
  <body>
    <!-- SIDEBAR -->
    <section id="sidebar">
      <a href="#" class="brand">
        <i class="bx bxs-graduation"></i>
        <span class="text">Data Mahasiswa</span>
      </a>
      <ul class="side-menu top">
        <li class="active">
          <a href="#">
            <i class="bx bxs-dashboard"></i>
            <span class="text">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="./views/mahasiswa.php">
            <i class="bx bxs-user-detail"></i>
            <span class="text">Data Mahasiswa</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="bx bxs-book-alt"></i>
            <span class="text">Courses</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- SIDEBAR -->

    <!-- CONTENT -->
    <section id="content">
      <!-- NAVBAR -->
      <nav>
        <i class="bx bx-menu"></i>
        <form action="#">
          <div class="form-input">
            <input type="search" placeholder="Search..." />
            <button type="submit" class="search-btn">
              <i class="bx bx-search"></i>
            </button>
          </div>
        </form>
        <input type="checkbox" id="switch-mode" hidden />
        <label for="switch-mode" class="switch-mode"></label>
        <a href="#" class="notification">
          <i class="bx bxs-bell"></i>
          <span class="num">8</span>
        </a>
        <a href="#" class="profile">
          <img src="img/people.png" />
        </a>
      </nav>
      <!-- NAVBAR -->

      <!-- MAIN -->
      <main>
        <div class="head-title">
          <div class="left">
            <h1>Dashboard</h1>
            <ul class="breadcrumb">
              <li>
                <a href="#">Dashboard</a>
              </li>
              <li><i class="bx bx-chevron-right"></i></li>
              <li>
                <a class="active" href="#">Home</a>
              </li>
            </ul>
          </div>
        </div>

        <?php
        // Koneksi ke database
        $servername = "localhost"; // Nama server Anda
        $username = "root"; // Nama pengguna database Anda
        $password = ""; // Kata sandi database Anda
        $dbname = "university"; // Nama database Anda
        
        $conn = new mysqli($servername, $username, $password, $dbname);
        
         // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT COUNT(*) as total FROM mahasiswa"; 
        $result = $conn->query($sql); 

        $total_mahasiswa = 0; 
        if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $total_mahasiswa = $row['total']; 
      } else { 
          echo "0 results"; 
      }
      
      $conn->close(); 
      
      ?>

        <ul class="box-info">
          <li>
            <i class="bx bxs-graduation"></i>
            <span class="text">
              <h3><?php echo $total_mahasiswa; ?></h3>
              <p>Total Mahasiswa</p>
            </span>
          </li>
          <li>
            <i class="bx bxs-book"></i>
            <span class="text">
              <h3>Coming Soon</h3>
              <p>Kursus Aktif</p>
            </span>
          </li>
        </ul>
      </main>
      <!-- MAIN -->
    </section>
    <!-- CONTENT -->

    <script src="./assets/js/script.js"></script>
  </body>
</html>
