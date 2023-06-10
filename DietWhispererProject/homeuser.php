<?php
    // Session başlatır
    include("connectDb.php");
    session_start();
    
//     if (isset($_SESSION['id'])) {
//   // Oturum açılmış durumda
//   header('Content-Type: text/html; charset=UTF-8');
//   // Diğer işlemler...
// } else {
//   // Oturum açılmamış durumda
//   // Giriş sayfasına yönlendirme yapabilirsiniz
//   header("Location: index.php");
//   exit;
// }
    
    //$mysqli->set_charset("utf8");

?>
<!doctype html>
<html >
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <style>
      .navbar,
      footer {
        background-color: white;
      }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
  </head>
    <body style="background-image: url('img/WhatsApp Image 2023-06-09 at 20.40.31.jpeg'); background-size: cover; background-repeat: no-repeat; background-position: center center;width: 100%;
  height: 140vh;">
        <div class="container-fluid">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img width="80px" src="img/WhatsApp Image 2023-04-30 at 22.47.50.jpeg" alt="logo">
      <span style="font-family:'Times New Roman','Courier New', Courier, monospace;" class="fs-2">DİET WHİSPERER</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php">ANASAYFA</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="aboutUs.php">HAKKIMIZDA</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="bodyLanguage.php">Vücut Kitle İndeksi Hesapla</a>
        </li>
      </ul>
       <?php
     if (isset($_SESSION['id'])) {
         echo"<div class='dropdown navbar-nav me-5'>
  <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
    <img src='img/person.svg' width='35'>
  </a>
  <ul class='dropdown-menu' aria-labelledby='navbarDropdown'>";
  
  $id = $_SESSION['id'];

$sql = "SELECT * FROM users WHERE id = $id";
$result=mysqli_query($connection,$sql);
$row=mysqli_fetch_array($result);
if ($row !== 0) {
    echo"<li><a class='dropdown-item' href='userHome.php'>Anasayfa</a></li>";
} else {
    echo"<li><a class='dropdown-item' href='dieticianHome.php'>Anasayfa</a></li>";
}

    echo"<li><hr class='dropdown-divider'></li>
    <li><a class='dropdown-item' href='exit.php'>Çıkış Yap</a></li>
  </ul>
</div>";
    
     }
     
  ?>
    </div>
  </div>
</nav>
</div>
<div class="container-fluid">
    <div class="container-fluid">
      <div id="carouselExampleIndicators" class="carousel slide mt-5 ms-2 me-2" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="img/WhatsApp Image 2023-06-09 at 19.03.41.jpeg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="img/WhatsApp Image 2023-06-09 at 17.56.42.jpeg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="img/WhatsApp Image 2023-06-09 at 17.45.42.jpeg" class="d-block w-100" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>

    <footer class="fixed-bottom">
      <div class="container-fluid mt-5" style="background-color: white;">
        <div class="row shadow-1-strong">
          <ul class="nav justify-content-center mx-auto border-bottom pb-2 mb-2">
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Anasayfa</a></li>
            <li class="nav-item"><a href="aboutUs.php" class="nav-link px-2 text-muted">Hakkımızda</a></li>
            <li class="nav-item"><a href="https://www.linkedin.com/in/mahire-z%C3%BChal-%C3%B6zdemir-2919002z9" class="nav-link px-2 text-muted">Mahire Zühal ÖZDEMİR LinkedIn</a></li>
            <li class="nav-item"><a href="https://www.linkedin.com/in/derya-öztürk-/" class="nav-link px-2 text-muted">Derya ÖZTÜRK LinkedIn</a></li>
            <li class="nav-item"><a href="https://github.com/definetelynotarobot/Diet-Whisperer" class="nav-link px-2 text-muted">GitHub</a></li>
          </ul>
          <p class="text-center text-muted justify-content-center">© 2023 Diet Whisperer</p>
        </div>
      </div>
    </footer>
</div>
  </body>
</html>
