<?php
    // Session başlatır
    include("connectDb.php");
    session_start();
    header('Content-Type: text/html; charset=UTF-8');
    
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>

  </head>
<body >
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <img width="80px" src="img/WhatsApp Image 2023-04-30 at 22.47.50.jpeg" alt="logo">
          <span style="font-family: 'Courier New', Courier, monospace;" class="fs-2">DİET WHİSPERER</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item ms-5"><a class="nav-link active" href="homeuser.php">ANASAYFA</a></li>
            <li class="nav-item"><a class="nav-link" href="useraboutUs.php">HAKKIMIZDA</a></li>
          </ul>
        </div>
      </div>
                  <?php
     if (isset($_SESSION['id'])) {
         echo"<div class='dropdown navbar-nav ms-auto'>
  <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
    <img src='img/person.svg' width='35'>
  </a>
  <ul class='dropdown-menu' aria-labelledby='navbarDropdown'>";
  
  $id = $_SESSION['id'];

$sql = "SELECT * FROM dieticians WHERE id = $id";
$result=mysqli_query($connection,$sql);
$row=mysqli_fetch_array($result);
if ($row !== 0) {
    echo"<li><a class='dropdown-item' href='dieticianHome.php'>Anasayfa</a></li>";
    
} else {
    echo"<li><a class='dropdown-item' href='userHome.php'>Anasayfa</a></li>";
    
}

    echo"<li><hr class='dropdown-divider'></li>
    <li><a class='dropdown-item' href='exit.php'>Çıkış Yap</a></li>
  </ul>
</div>";
    
     }
     
  ?>
    </nav>


<div class="container-fluid">
  <div class="row">
    <div class=" col-sm-6">
    
                
                </form>
            </div>
            </div>
</div>


<hr/>

        <?php
        
        echo "<p class='text-left ms-3' style='font-size:20px;'>Düzenleyebileceğiniz Diet Listeleriniz</p> <hr/>"; 
        include( "connectDb.php");
                $sql="SELECT * FROM dietplanslist WHERE dietician_id=$_SESSION[id]";
                 $result = mysqli_query($connection,$sql);
                 $number=0;
                 echo "<div class='row'>";
                 while ($data=mysqli_fetch_array($result)){
                     $noteid=$data['id'];
                     $meals = $data['meals'];
                     $notes = $data['notes'];
                     $start_date = $data['start_date'];
                     $foods = $data['foods'];
                     $foods_quantities = $data['foods_quantities'];
                     $calori_values = $data['calori_values'];
                     //$tarih=date_format($tarih, 'd.m.Y');
                          $noteid=$data['id'];
                            echo "
                            <div class='card border-0 mt-5 ms-3' >
                                <div class='col-sm-10 mt-3 border border-2 border-warning rounded ms-5'>
                                <h3>ÖĞÜNLER</h3><pre><p class='fs-5'>$meals</p></pre>
                                <h3>FOODS</h3><pre><p class='fs-5'>$foods</p></pre>
                                <h3>FOOD QUANTITIES</h3><pre><p class='fs-5'>$foods_quantities</p></pre>
                                <h3>CALORI VALUES</h3><pre><p class='fs-5'>$calori_values</p></pre>
                                <form method='post' action=''>
                                    <h3>NOTES</h3>
                                    <textarea name='notes' rows='3' cols='30'>$notes</textarea>
                                    <br>
                                    <input type='submit' name='save' value='Kaydet'>
                                </form></div></div>";
                    
                        $number=$number+1;
                        
                        }
                    if (isset($_POST['save'])) {
        $newNotes = $_POST['notes'];
        $updateSql = "UPDATE dietplanslist SET notes = '$newNotes' WHERE id = $noteid";
        mysqli_query($connection, $updateSql);
    }

            
                     echo "</div>";
                  
    ?>  
    <br><br><br><br><br><br>
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