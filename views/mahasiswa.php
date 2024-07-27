<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Boxicons -->
<link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet" />
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
<!-- My CSS -->
<link rel="stylesheet" href="../assets/css/style.css" />

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="
https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js
"></script>

    <title>Data Management Mahasiswa</title>
    
</head>
<body>
    <!-- SIDEBAR -->
    <section id="sidebar">
      <a href="../index.php" class="brand">
        <i class="bx bxs-graduation"></i>
        <span class="text">Data Mahasiswa</span>
      </a>
      <ul class="side-menu top">
        <li>
          <a href="../index.php">
            <i class="bx bxs-dashboard"></i>
            <span class="text">Dashboard</span>
          </a>
        </li>
        <li class="active">
          <a href="#">
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
        <form action="mahasiswa.php" method="get">
          <div class="form-input">
            <input type="text" name="search" placeholder="Search by name..." value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>" />
            <button type="submit" class="search-btn">
              <i class="bx bx-search"></i>
            </button>
          </div>
        </form>
        <input type="checkbox" id="switch-mode" hidden />
        <label for="switch-mode" class="switch-mode"></label>
      </nav>
      <!-- NAVBAR -->

      <!-- MAIN -->
      <main>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
          Tambah Data Mahasiswa
        </button>

        <!-- Modal Input -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Input Mahasiswa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form id="registrationForm" method="post" action="process.php" enctype="multipart/form-data">
                  <label for="nama" class="pb-2">Nama:</label>
                  <input type="text" id="nama" name="nama" class="form-control" required>

                  <label for="nim" class="mt-3 pb-2">NIM:</label>
                  <input type="text" id="nim" name="nim" class="form-control" required>

                  <label for="fakultas" class="mt-3 pb-2">Fakultas:</label>
                  <input type="text" id="fakultas" name="fakultas" class="form-control" required>

                  <label for="status" class="mt-3 pb-2">Status:</label>
                  <select id="status" name="status" class="form-control" required>
                    <option value="aktif">Aktif</option>
                    <option value="tidak aktif">Tidak Aktif</option>
                  </select>

                  <label for="profile" class="mt-3 pb-2">Profile:</label>
                  <input type="file" id="profile" name="profile" class="form-control-file" required>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="document.getElementById('registrationForm').submit();">Save changes</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal Edit -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="editModalLabel">Edit Mahasiswa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form id="editForm" method="post" action="update.php" enctype="multipart/form-data">
                  <input type="hidden" id="edit-id" name="id">

                  <label for="edit-nama" class="pb-2">Nama:</label>
                  <input type="text" id="edit-nama" name="nama" class="form-control" required>

                  <label for="edit-nim" class="mt-3 pb-2">NIM:</label>
                  <input type="text" id="edit-nim" name="nim" class="form-control" required>

                  <label for="edit-fakultas" class="mt-3 pb-2">Fakultas:</label>
                  <input type="text" id="edit-fakultas" name="fakultas" class="form-control" required>

                  <label for="edit-status" class="mt-3 pb-2">Status:</label>
                  <select id="edit-status" name="status" class="form-control" required>
                    <option value="aktif">Aktif</option>
                    <option value="tidak aktif">Tidak Aktif</option>
                  </select>

                  <label for="edit-profile" class="mt-3 pb-2">Profile:</label>
                  <input type="file" id="edit-profile" name="profile" class="form-control-file">
                  <img id="edit-profile-preview" src="" alt="Profile Preview" style="width:100px;height:100px;"/>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="document.getElementById('editForm').submit();">Save changes</button>
              </div>
            </div>
          </div>
        </div>

        <div class="table-data">
          <div class="order">
            <div class="head">
              <h3>Data Mahasiswa Terbaru</h3>
            </div>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Nama & Profile</th>
                  <th>NIM</th>
                  <th>Fakultas</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "university";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Check if search query is set
                $search = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';

                // SQL query with search condition
                $sql = "SELECT * FROM mahasiswa";
                if ($search) {
                    $sql .= " WHERE nama LIKE '%$search%'";
                }

                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td><div class='profile-container'><img src='" . htmlspecialchars($row["profile"]) . "' alt='Profile' /><p class='name'>" . htmlspecialchars($row["nama"]) . "</p></div></td>";
                        echo "<td>" . htmlspecialchars($row["nim"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["fakultas"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["status"]) . "</td>";
                        echo "<td>
                                <button type='button' class='btn btn-warning btn-sm' data-bs-toggle='modal' data-bs-target='#editModal' data-id='" . htmlspecialchars($row["id"]) . "'>Edit</button>
                                <a href='delete.php?id=" . htmlspecialchars($row["id"]) . "' class='btn btn-danger btn-sm'>Hapus</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No data available</td></tr>";
                }

                $conn->close();
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </main>
      <!-- MAIN -->
    </section>
    <!-- CONTENT -->
    <script src="../assets/js/script.js"> </script>
  </body>
</html>
