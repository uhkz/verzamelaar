<!doctype html>
<html lang="en">

<head>
  <title>COLCAR</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="/style/main.css">
  <script src="https://kit.fontawesome.com/b2f72f1c34.js" crossorigin="anonymous"></script>
</head>

<body>
  <!--NAVBAR-->
  <nav class="navbar navbar-expand-lg sticky-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">LOGO</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Shop</a>
          </li>
        </ul>
        <div class="btn-group me-3 d-lg-none">
          <button type="button" class="btn dropdown-toggle w-100" data-bs-toggle="dropdown" aria-expanded="false"
            data-bs-auto-close="outside">
            <i class="fa-solid fa-user"></i>
          </button>
          <!--Login-->
          <form action="includes/login.inc.php" method="post" class="dropdown-menu p-3">
            <div class="mb-3">
              <label for="" class="form-label">Username</label>
              <input type="text" class="form-control" name="uid" placeholder="username">
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Password</label>
              <input type="password" class="form-control" name="pwd" placeholder="Password">
            </div>
            <button type="submit" class="btn w-100">Sign in</button>
          </form>
          <!---->
        </div>
        <a class="btn me-3 signup d-lg-none" href="/pages/registration.php" role="button"><i class="fa-solid fa-user-pen"></i></a>
      </div>
      <div class="btn-group dropstart  me-3 d-none d-lg-block">
        <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"
          data-bs-auto-close="outside">
          <i class="fa-solid fa-user"></i>
        </button>
        <!--Login-->
        <form action="includes/login.inc.php" method="post" class="dropdown-menu p-3">
          <div class="mb-3">
            <label for="" class="form-label">Username</label>
            <input type="text" class="form-control" name="uid" placeholder="Username">
          </div>
          <div class="mb-3">
            <label for="" class="form-label">Password</label>
            <input type="password" class="form-control" name="pwd" placeholder="Password">
          </div>
          <button type="submit" class="btn w-100">Sign in</button>
        </form>
        <!---->
      </div>
      <a class="btn me-3 signup d-none d-lg-block" href="pages/registration.php" role="button"><i class="fa-solid fa-user-pen"></i></a>
    </div>
  </nav>
  <!--EINDE NAVBAR-->

  <div class="container">
    <div class="banner-container">
      <img src="/media/photobanner.jpeg" class="img-fluid banner" alt="...">
      <div class="text-center centered">
        <h1>TITEL WELKOM</h1>
        <p>Hier komt mooie text in een passend font.</p>
        <p>(moet nog responsive)</p>
      </div>
    </div>
    <div class="row mt-5">
      <div class="col fs-4">Uitgelichte items</div>
    </div>
    <!--row 3-->
    <div class="items-grid row mt-4">
      <div class="col-sm lh-3 me-5">
        <img src="/media/car-example1.avif" alt="">
        <p class="fs-4 mb-0">Naam</p>
        <p class="fs-6 mb-0">Beschrijving</p>
        <p class="fs-6">Prijs</p>
      </div>
      <div class="col-sm me-5">
        <img src="/media/car-example2.avif" alt="">
        <p class="fs-4 mb-0">Naam</p>
        <p class="fs-6 mb-0">Beschrijving</p>
        <p class="fs-6">Prijs</p>
      </div>
      <div class="col-sm">
        <img src="/media/car-example3.avif" alt="">
        <p class="fs-4 mb-0">Naam</p>
        <p class="fs-6 mb-0">Beschrijving</p>
        <p class="fs-6">Prijs</p>
      </div>
      <!--row 2-->
      <div class="items-grid row mt-4">
        <div class="col-sm lh-3 me-5">
          <img src="/media/car-example4.avif" alt="">
          <p class="fs-4 mb-0">Naam</p>
          <p class="fs-6 mb-0">Beschrijving</p>
          <p class="fs-6">Prijs</p>
        </div>
        <div class="col-sm me-5">
          <img src="/media/car-example5.avif" alt="">
          <p class="fs-4 mb-0">Naam</p>
          <p class="fs-6 mb-0">Beschrijving</p>
          <p class="fs-6">Prijs</p>
        </div>
        <div class="col-sm">
          <img src="/media/car-example6.avif" alt="">
          <p class="fs-4 mb-0">Naam</p>
          <p class="fs-6 mb-0">Beschrijving</p>
          <p class="fs-6">Prijs</p>
        </div>
        <!--row 3-->
        <div class="items-grid row mt-4">
          <div class="col-sm lh-3 me-5">
            <img src="/media/car-example7.avif" alt="">
            <p class="fs-4 mb-0">Naam</p>
            <p class="fs-6 mb-0">Beschrijving</p>
            <p class="fs-6">Prijs</p>
          </div>
          <div class="col-sm me-5">
            <img src="/media/car-example8.avif" alt="">
            <p class="fs-4 mb-0">Naam</p>
            <p class="fs-6 mb-0">Beschrijving</p>
            <p class="fs-6">Prijs</p>
          </div>
          <div class="col-sm">
            <img src="/media/car-example9.avif" alt="">
            <p class="fs-4 mb-0">Naam</p>
            <p class="fs-6 mb-0">Beschrijving</p>
            <p class="fs-6">Prijs</p>
          </div>
        </div>
      </div>


      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>