<?php
//kayıt olma işlemi yapar
include("connectDb.php");
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  $user_statu = $_POST["new_status"];
  $user_name=$_POST["new_name"];
  $user_lastname=$_POST["new_lastname"];
  $user_email=$_POST["new_email"];
  $user_password=$_POST["new_password"];
    if(empty($user_name))
        $uyari=" İsim alanı boş bırakılamaz";
    else if(empty($user_lastname))
        $uyari=" Soyisim alanı boş bırakılamaz";
    else if(empty($user_email))
        $uyari=" Email alanı boş bırakılamaz";
    else if(empty($user_password))
        $uyari=" Password alanı boş bırakılamaz";
    else
    {

  $sql="INSERT INTO users (name,surname,email,gender,password) VALUES ('".$user_name."','".$user_lastname."','".$user_email."','".$user_statu."','".$user_password."')";
  $cevap=mysqli_query($connection,$sql);
  if(!$cevap){
     /* $uyari='! Bu emaile ait hesap zaten var'; 
$uyari= mysqli_connect_error()*/
      $uyari = mysqli_error($connection);
  }
  else{
      header("Refresh:1;url=index.php");
      exit();
  }
}
  mysqli_close($connection);


}



?>

<!doctype html>
<html>
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>

  </head>
  <body style="background-image: url('img/diet whisperer.jpg'); background-size: cover; background-repeat: no-repeat; background-position: center center;width: 100%;
  height: 100%;">
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
            <li class="nav-item ms-5"><a class="nav-link " href="index.php">ANASAYFA</a></li>
            <li class="nav-item"><a class="nav-link" href="aboutUs.php">HAKKIMIZDA</a></li>
          </ul>
        </div>
      </div>
      <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
          Giriş Yap
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
          <li><a class="dropdown-item" href="user.php">Kullanıcı</a></li>
          <li><a class="dropdown-item" href="dietician.php">Diyetisyen</a></li>
        </ul>
      </div>
      <div class="dropdown ms-4 me-5">
        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
          Kayıt Ol
        </button>
        <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton2">
          <li><a class="dropdown-item" href="register.php">Kullanıcı</a></li>
          <li><a class="dropdown-item" href="registerDietician.php">Diyetisyen</a></li>
        </ul>
      </div>
    </nav>
      


      
            <div class="card border-0 mt-2" style="width: 20rem;margin:0 auto;">
                <form class="text-center" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                    <label class="form-label">İSİM</label> <br>
                    <input type="text" name="new_name" placeholder="Adınız"> <br>
                    <label class="form-label mt-3">SOYİSİM</label> <br>
                    <input type="text" name="new_lastname" placeholder="Soyadınız"><br>
                    <label class="form-label mt-3">E-MAİL</label> <br>
                    <input type="email" name="new_email" placeholder="example@mail.com"><br>
                    <label class="form-label mt-3">PASSWORD</label> <br>
                    <input type="password" name="new_password" minlength="4"><br>
                    <label class="form-label mt-3">Cinsiyet</label> <br>
                    <select name="new_status">
                        <option value="female">Kadın</option> 
                        <option value="male">Erkek</option>
                        <option value="null">Belirtmek İstemiyorum</option>
                    </select><br>
                    <button type="submit" class="btn btn-outline-primary mt-3">KAYDOL</button>
                </form>
            </div>
<?php
if(isset($uyari))
{
  echo"
  <div style='width: 300px; margin:auto;' class='alert alert-warning alert-dismissible fade show mt-5 mb-5' role='alert'>
  <strong>Uyarı</strong>$uyari
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";

}

?>
  <footer class="relative">
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