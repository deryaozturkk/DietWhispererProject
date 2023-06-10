<?php
    // Session başlatır
    include("connectDb.php");
    session_start();
    header('Content-Type: text/html; charset=UTF-8');
    
    //$mysqli->set_charset("utf8");

?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="style.css" />
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>

  <style>
    .card {
        width: 300px;
        height: 300px;
        padding: 20px;
        background-color: #FFCCCC;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        text-align: center;
        margin-left: auto;
        margin-right: auto;
    }

    body {
      background-image: url('img/diet whisperer.jpg');
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center center;
      width: 100vw;
      height: 100vh;
      margin: 0;
      padding: 0;
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand"><img  width="80px" src="img/WhatsApp Image 2023-04-30 at 22.47.50.jpeg" alt="logo"><span style="font-family:'Courier New', Courier, monospace;" class="fs-2">DİET WHİSPERER</span></a>
      <div class="collapse navbar-collapse">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item"></li>
            <li class="nav-item ms-5"><a class="nav-link" href="index.php">ANASAYFA</a></li>
            <li class="nav-item"><a class="nav-link active" href="aboutUs.php">HAKKIMIZDA</a></li>
          </ul>
          <div class="float-end">
              
              
             
    
    
    
              <?php
     if (isset($_SESSION['id'])) {
         echo"<div class='dropdown navbar-nav ms-auto'>
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
    </div>
  </nav>
  

  <br><br><br><br>

  <?php
    // Form gönderildiyse VKİ hesapla ve sonucu görüntüle
    if (isset($_POST['calculate'])) {
        $weight = $_POST['weight'];
        $height = $_POST['height'];
        // Gelen verileri doğrula
        if (!empty($weight) && !empty($height)) {
            // VKİ hesaplama formülü: VKİ = Ağırlık (kg) / (Boy (m) * Boy (m))
            $heightInMeters = $height / 100; // Boyu metreye çevir
            $bmi = $weight / ($heightInMeters * $heightInMeters);

            $uyari="Ağırlık: $weight kg\n";
            $uyari .= "Boy: $height cm\n";
            $uyari .= "Vücut Kitle İndeksi (VKİ): " . number_format($bmi, 2);
        } else {
            echo "<p>Lütfen ağırlık ve boy değerlerini girin.</p>";
        }
    }
  ?>

  <form method="post" action="">
    <div class="card">
      <label for="weight">Ağırlık (kg):</label>
      <input type="text" name="weight" id="weight" required>
      <br>
      <label for="height">Boy (cm):</label>
      <input type="text" name="height" id="height" required>
      <br>
      <button type="submit" name="calculate" class="btn btn-primary">HESAPLA</button>
    </div>
  </form>

  <?php
    if(isset($uyari)) {
      echo "
      <div style='width: 300px; margin:auto;' class='alert alert-warning alert-dismissible fade show mt-5 mb-5' role='alert'>
        <strong>Uyarı</strong>$uyari
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    }
  ?>

  <br><br><br><br><br><br><br><br><br><br>
  <br><br><br><br><br><br><br><br><br><br>

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
</body>
</html>
