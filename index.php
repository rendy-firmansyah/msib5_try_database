<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tugas 2 - html css js</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="style.css" />
    <!-- Font -->
    <link
      href="https://fonts.googleapis.com/css2?family=Lobster&family=Lobster+Two:ital,wght@0,700;1,400;1,700&family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
      rel="stylesheet"
    />
    <!-- CDN Bootstrap -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
      integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
  </head>
  <body>
    <!-- Navbar -->
    <nav
      class="navbar navbar-expand-lg bg-body-tertiary fixed-top border-bottom"
    >
      <div class="container-lg">
        <div class="navbar-brand ms-5 text-dark" href="#">
          Pendataan Nilai Mahasiswa
        </div>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <div class="pos d-flex align-items-center me-5">
                <a
                  class="nav-link active text-dark"
                  aria-current="page"
                  href="#home"
                  >Home</a
                >
              </div>
            </li>
            <li class="nav-item">
              <div class="pos d-flex align-items-center">
                <a class="nav-link text-dark" href="#tabelNilai">Total Nilai</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Section Home-->
    <section class="hero d-flex align-items-center" id="home">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path
          fill="#0099ff"
          fill-opacity="1"
          d="M0,64L80,64C160,64,320,64,480,80C640,96,800,128,960,122.7C1120,117,1280,75,1360,53.3L1440,32L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"
        ></path>
      </svg>
      <div class="container">
        <div class="row">
          <div class="col-6 align-self-center hero-text">
            <h1>Website penginputan nilai</h1>
            <h2>Cuy University</h2>
            <p>
              Ini merupakan salah satu contoh website penginputan nilai
              mahasiswa cuy university (Tugas MSIB week 2 - HTML CSS JavaScript)
              GITS.id - #your partner to scale impact with technology
            </p>
          </div>
          <div class="col-6 d-flex justify-content-center align-items-center">
            <div class="border-first shadow">
              <form action="index.php" method="POST" name="addNilai">
                <label for="nama" class="form-label">Nama Mahasiswa</label>
                <input
                  type="text"
                  class="form-control nama"
                  name="name"
                  placeholder="Masukkan nama mahasiswa"
                required />
                <label for="course" class="form-label">Mata Kuliah</label>
                <input
                  type="text"
                  class="form-control course"
                  name="course"
                  placeholder="Masukkan mata kuliah"
                required />
                <div class="form-group mb-2">
                  <label for="gradeSelect">Grade</label>
                  <select class="form-control" id="gradeSelect" name="gradeSelect">
                    <option value="">Pilih Grade</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="E">E</option>
                  </select>
                </div>
                <input
                  class="btn btn-primary mt-3"
                  type="submit"
                  name="Submit"
                  value="Hitung"
                  onclick="meanCalculate()"
                >
                </input>
              </form>
              <?php

                if(isset($_POST['Submit'])) {
                  $nama = $_POST['name'];
                  $course = $_POST['course'];
                  $gradeSelect = $_POST['gradeSelect'];
                  $nilai_rata = 0;

                  if ($gradeSelect === 'A') {
                    $nilai_rata = 4;
                  } else if ($gradeSelect === 'B') {
                    $nilai_rata = 3;
                  } else if ($gradeSelect === 'C') {
                    $nilai_rata = 2;
                  } else if ($gradeSelect === 'D') {
                    $nilai_rata = 1;
                  } else if ($gradeSelect === 'E') {
                    $nilai_rata = 0;
                  }

                  include_once("connection.php");

                  $result = mysqli_query($mysqli, 
                  "INSERT INTO mahasiswas (name,course,grade,nilai_rata) VALUES ('$nama','$course','$gradeSelect','$nilai_rata')");
                }

              ?>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Section Total Nilai -->
    <section class="table-nilai" id="tabelNilai">
    <?php

      include_once("connection.php");
      $alldata = mysqli_query($mysqli, 'SELECT * FROM mahasiswas');

    ?>
      <h3 class="judul-text text-center">Total Nilai Inputan</h3>
      <div class="tab-bord d-flex justify-content-center">
        <table id="resultTable" class="table text-center" border="0">
          <tr class="text-light text-center">
            <th scope="col">Nama Mahasiswa</th>
            <th scope="col">Mata Kuliah</th>
            <th scope="col">Grade</th>
            <th scope="col">Nilai Rata-rata</th>
            <th scope="col">Aksi</th>
          </tr>
          <?php

                while($data_mahasiswas = mysqli_fetch_array($alldata)) {

          ?>
          <tr class="text-dark text-center">
                  <td><?php echo $data_mahasiswas['name']; ?></td>
                  <td><?php echo $data_mahasiswas['course']; ?></td>
                  <td><?php echo $data_mahasiswas['grade']; ?></td>
                  <td><?php echo $data_mahasiswas['nilai_rata']; ?></td>
                  <td>
                    <a href="update.php?id=<?php echo $data_mahasiswas['id']; ?>"><button class="btn btn-warning" id="updateData">Edit</button></a>
                    <a href="delete.php?id=<?php echo $data_mahasiswas['id']; ?>"><button class="btn btn-danger">Delete</button></a>
                  </td>
          </tr>
          <?php

                }
          ?>
        </table>
    </section>

    <!-- Script JS -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
  </body>
</html>