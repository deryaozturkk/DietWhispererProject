<!doctype html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Anasayfa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  
  <style>
  #navbardrop ul ul ul.li {
        left:-100%;
top:0;
margin:0;
padding:0;
display:block;
right:100%;
}
</style>
  <body style="background-image: url('img/diet whisperer.jpg'); background-size: cover; background-repeat: no-repeat; background-position: center center;width: 100%;
  height: 100%;">
      <div class="container-fluid">
          <div class="row">
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
            <li class="nav-item ms-5"><a class="nav-link active" href="index.php">ANASAYFA</a></li>
            <li class="nav-item"><a class="nav-link" href="aboutUs.php">HAKKIMIZDA</a></li>
          </ul>
        
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
      <div class="dropdown nowrap ms-4 me-5" id="navbardrop">
        <button class="btn btn-primary dropdown-toggle nowrap" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
          Kayıt Ol
        </button>
        <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton2">
          <li><a class="dropdown-item nowrap sub_drop4 " href="register.php">Kullanıcı</a></li>
          <li><a class="dropdown-item nowrap sub_drop4 " href="registerDietician.php">Diyetisyen</a></li>
        </ul>
      </div>
      <div class="me-3"></div>
      
      </div>
    </nav>
    </div>
    </div>
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
  </body>
</html>
