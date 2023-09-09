<?php
include_once("connection.php");

if(isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $course = $_POST['course'];
    $gradeSelect = $_POST['gradeSelect'];

    $gradeToValue = [
        'A' => 4,
        'B' => 3,
        'C' => 2,
        'D' => 1,
        'E' => 0,
    ];

    if (array_key_exists($gradeSelect, $gradeToValue)) {
        $nilai_rata = $gradeToValue[$gradeSelect];
    } else {
        $nilai_rata = 0;
    }

    $query = mysqli_query($mysqli,
    "UPDATE mahasiswas SET name='$name', course='$course', grade='$gradeSelect', nilai_rata='$nilai_rata' WHERE id='$id' ");

    header('Location: index.php');
}

$id = $_GET['id'];
$query = mysqli_query($mysqli, "SELECT * FROM mahasiswas WHERE id='$id'");

if ($row = mysqli_fetch_assoc($query)) {
    $name = $row['name'];
    $course = $row['course'];
    $gradeSelect = $row['grade'];
    $nilai_rata = $row['nilai_rata'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Mahasiswa</title>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Lobster+Two:ital,wght@0,700;1,400;1,700&family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<style>
    .container {
        height: 100vh;
    }

    .border-first {
        border: 1px solid rgb(205, 205, 205);
        padding: 40px;
        border-radius: 10px;
        background-color: white;
        width: 460px;
        z-index: 999;
    }
</style>

<body>
    <div class="container d-flex justify-content-center align-items-center">
        <div class="border-first shadow">
            <form action="update.php?id=<?php echo $id; ?>" method="POST" name="updateMahasiswa">
                <label for="nama" class="form-label">Nama Mahasiswa</label>
                <input type="text" class="form-control nama" name="name" placeholder="Masukkan nama mahasiswa" value="<?= $name ?>" />
                <label for="course" class="form-label">Mata Kuliah</label>
                <input type="text" class="form-control course" name="course" placeholder="Masukkan mata kuliah" value="<?= $course ?>" />
                <div class="form-group mb-2">
                    <label for="gradeSelect">Grade</label>
                    <select class="form-control" id="gradeSelect" name="gradeSelect">
                        <option value="">Pilih Grade</option>
                        <option value="A" <?php if ($gradeSelect === 'A') echo 'selected'; ?>>A</option>
                        <option value="B" <?php if ($gradeSelect === 'B') echo 'selected'; ?>>B</option>
                        <option value="C" <?php if ($gradeSelect === 'C') echo 'selected'; ?>>C</option>
                        <option value="D" <?php if ($gradeSelect === 'D') echo 'selected'; ?>>D</option>
                        <option value="E" <?php if ($gradeSelect === 'E') echo 'selected'; ?>>E</option>
                    </select>
                </div>
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <button class="btn btn-primary mt-3" type="submit" name="update">Update</button>
                <button class="btn btn-primary mt-3"><a href="create.php" class="text-light" style="text-decoration:none">Kembali</a></button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
