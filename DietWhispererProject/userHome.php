<?php
    // Session başlatır
    include("connectDb.php");
    session_start();
    
    if (isset($_SESSION['id'])) {
  // Oturum açılmış durumda
  header('Content-Type: text/html; charset=UTF-8');
} else {

  header("Location: index.php");
  exit;
}

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
    <body style="background-image: url('img/WhatsApp Image 2023-06-09 at 20.40.31.jpeg'); background-size: cover; background-repeat: no-repeat; background-position: center center;width:100%;
  height: 100%;">
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
          <a class="nav-link" href="homeuser.php">ANASAYFA</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="useraboutUs.php">HAKKIMIZDA</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="bodyLanguage.php">Vücut Kitle İndeksi Hesapla</a>
        </li>
      </ul>
 <div class="dropdown navbar-nav me-5">
  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <img src="img/person.svg" width="35">
  </a>
  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
    <li><a class="dropdown-item" href="index.php">Anasayfa</a></li>
    <li><hr class="dropdown-divider"></li>
    <li><a class="dropdown-item" href="exit.php">Çıkış Yap</a></li>
  </ul>
</div>


    </div>
  </div>
</nav>



    <div class="container-fluid">
      <div class="row">
        

        <hr/>
        <div class='col-9'><p class='text-left ms-3' style='font-size:20px;'>Diet Listeleriniz</p> <hr/>
        <?php
        include("connectDb.php");
        $sql = "SELECT * FROM dietplanslist WHERE user_id = $_SESSION[id]";
        $result = mysqli_query($connection, $sql);
        $hasDietPlan = mysqli_num_rows($result) > 0;
        if ($hasDietPlan) {
          while ($data = mysqli_fetch_array($result)) {
            $noteid = $data['id'];
          }

          $sql2 = "SELECT CONCAT(name, ' ', surname) AS ad_soyad, id FROM dieticians";
          $result2 = mysqli_query($connection, $sql2);

          echo '<div class="col-3"><form method="POST" action=""><select name="kullanici">';
          echo '<option value="">Diyetisyen Seçin</option>'; // Varsayılan boş seçenek

          if ($result2->num_rows > 0) {
            while ($row = $result2->fetch_assoc()) {
              $ad_soyad = $row["ad_soyad"];
              $id = $row["id"];
              echo '<option value="' . $id . '">' . $ad_soyad . '</option>';
            }
          } else {
            echo '<option value="">Diyetisyen Bulunamadı</option>';
          }

          echo '</select><button type="submit" name="submit">Değiştir</button></form></div></div>';

          if (isset($_POST['submit'])) {
            $secilenKullanici = $_POST['kullanici'];
            $updateSql = "UPDATE dietplanslist SET dietician_id = '$secilenKullanici' WHERE id = $noteid";
            mysqli_query($connection, $updateSql);
          }
        } else {
        }
        ?>

        <?php
        include("connectDb.php");
        $sql = "SELECT * FROM dietplanslist WHERE user_id=$_SESSION[id]";
        $result = mysqli_query($connection, $sql);
        $number = 0;
        echo "<div class='row'>";
        $hasDietPlan = mysqli_num_rows($result) > 0;
        if ($hasDietPlan) {
         
          while ($data = mysqli_fetch_array($result)) {
            $noteid = $data['id'];
            $meals = $data['meals'];
            $notes = $data['notes'];
            $start_date = $data['start_date'];
            $foods = $data['foods'];
            $foods_quantities = $data['foods_quantities'];
            $calori_values = $data['calori_values'];
            $dietician_id = $data['dietician_id'];
            //$tarih=date_format($tarih, 'd.m.Y');
            $noteid = $data['id'];
            echo "
                                <div class='col-sm-10 mt-3 border border-2 border-warning rounded ms-5'>
                                <h3>Diyetisyen: </h3>";
            $dieticianSql = "SELECT CONCAT(name, ' ', surname) AS dietician_name FROM dieticians WHERE id = $dietician_id";
            $dieticianResult = mysqli_query($connection, $dieticianSql);
            if ($dieticianResult) {
              $dieticianData = mysqli_fetch_assoc($dieticianResult);
              $dieticianName = $dieticianData['dietician_name'];
              echo "<p class='fs-5'>$dieticianName</p>";
            }
            echo "<h3>ÖĞÜNLER</h3><pre><p class='fs-5'>$meals</p></pre>
                                <h3>FOODS</h3><pre><p class='fs-5'>$foods</p></pre>
                                <h3>FOOD QUANTITIES</h3><pre><p class='fs-5'>$foods_quantities</p></pre>
                                <h3>CALORI VALUES</h3><pre><p class='fs-5'>$calori_values</p></pre>
                                <h3>NOTES</h3><pre><p class='fs-5'>$notes</p></pre>
                                </div>";

            $number = $number + 1;
          }

          echo "</div></div>";
        } else {
          echo "<form method='POST' action='generate_diet_plan.php'><button type='submit' class='btn btn-primary'>Generate</button></form>";
        }

        ?>
  
      <br><br><br><br><br><br>
      <br><br><br><br><br><br>
      <br><br><br><br><br><br>
      <br><br><br><br><br><br>

    <footer class="relative" style="width:100%;">
      <div class="container-fluid mt-2" style="background-color: white;">
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

