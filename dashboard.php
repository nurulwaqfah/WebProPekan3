<?php
session_start();

if(!isset($_SESSION['user'])){
    header("Location: index.php");
    exit();
}

if(!isset($_SESSION['laporan'])){
    $_SESSION['laporan'] = [];
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];

    $data = [
        "judul"=>$judul,
        "deskripsi"=>$deskripsi
    ];

    $_SESSION['laporan'][] = $data;
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard Smart PPSU</title>

<style>

*{
  box-sizing:border-box;
  font-family:'Segoe UI', sans-serif;
}

body{
  margin:0;
  background:#f9f9f9;
}

/* Container utama */
.container{
  max-width:800px;
  margin:50px auto;
  background:white;
  padding:35px;
  border-radius:20px;
  box-shadow:0 15px 35px rgba(0,0,0,0.1);
}

/* Judul */
h2{
  margin-top:0;
  color:#ff7a00;
  letter-spacing:1px;
}

/* Text welcome */
p{
  font-size:14px;
  color:#555;
}

/* Logout */
a{
  text-decoration:none;
  color:#ff7a00;
  font-weight:bold;
}

/* Form */
form{
  margin-top:20px;
}

/* Input */
input,textarea{
  width:100%;
  padding:12px;
  border:none;
  border-bottom:2px solid #ddd;
  margin-bottom:15px;
  font-size:14px;
  outline:none;
  transition:0.3s;
}

textarea{
  border:2px solid #ddd;
  border-radius:8px;
  resize:none;
}

/* Focus input */
input:focus,
textarea:focus{
  border-color:#ff7a00;
}

/* Button */
button{
  width:100%;
  padding:12px;
  border:none;
  border-radius:25px;
  background:linear-gradient(135deg,#ff7a00,#ff9f1c);
  color:white;
  font-size:15px;
  font-weight:bold;
  cursor:pointer;
  transition:0.3s;
}

button:hover{
  transform:scale(1.03);
  box-shadow:0 8px 20px rgba(255,122,0,0.4);
}

/* Table */
table{
  width:100%;
  margin-top:25px;
  border-collapse:collapse;
  overflow:hidden;
  border-radius:10px;
}

/* Table header */
table th{
  background:#ff7a00;
  color:white;
  padding:10px;
  font-size:14px;
}

/* Table data */
table td{
  padding:10px;
  border-bottom:1px solid #eee;
  font-size:14px;
  text-align:center;
}

/* Hover table */
table tr:hover{
  background:#fff4ec;
}

/* Section title */
h3{
  margin-top:30px;
  color:#333;
}

</style>

</head>

<body>

<div class="container">

<h2>Dashboard Smart PPSU</h2>

<p>Selamat datang <b><?php echo $_SESSION['user']; ?></b></p>

<a href="logout.php">Logout</a>

<h3>Tambah Laporan Kebersihan (Create)</h3>

<form method="POST">

<input type="text" name="judul" placeholder="Judul Laporan" required>

<textarea name="deskripsi" placeholder="Deskripsi laporan" required></textarea>

<button type="submit">Tambah Laporan</button>

</form>

<h3>Data Laporan (Read)</h3>

<table>

<tr>
<th>No</th>
<th>Judul</th>
<th>Deskripsi</th>
</tr>

<?php
$no=1;
foreach($_SESSION['laporan'] as $laporan){
echo "<tr>";
echo "<td>".$no++."</td>";
echo "<td>".$laporan['judul']."</td>";
echo "<td>".$laporan['deskripsi']."</td>";
echo "</tr>";
}
?>

</table>

</div>

</body>
</html>