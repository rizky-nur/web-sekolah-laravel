<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>SMK N 1 BANTUL</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light d-none d-lg-block">
      <div class="container-fluid">
        <h6><img src="/img/logosmk-removebg-preview.png" width="30" height="30" alt="" /> <b>SMK N 1 BANTUL</b></h6>
        <form action="/pencarian/hasil" class="d-flex justify-content-center">
            <input class="form-control me-2" type="search" name="search" placeholder="Search"
                aria-label="Search" value="{{ request('search') }}">
            <button class="btn btn-info" type="submit"><i class="bi bi-search"></i></button>
        </form>
      </div>
    </nav>
    <nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-primary">
      <h6 class="d-lg-none d-sm-block ms-3"><img src="img/logosmk-removebg-preview.png" width="30" height="30" alt="" /> <b>SMK N 1 BANTUL</b></h6>
      <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-around" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item mx-5">
            <a class="nav-link active" aria-current="page" href="/"><i class="bi bi-house-door-fill"></i></a>
          </li>
          <li class="nav-item mx-5">
            <a class="nav-link" href="/profile">Profil</a>
          </li>
          <li class="nav-item mx-5">
            <a class="nav-link" href="/guru">Guru</a>
          </li>
          <li class="nav-item mx-5">
            <a class="nav-link" href="/siswa">Siswa</a>
          </li>
          <li class="nav-item mx-5">
            <a class="nav-link" href="/perpustakaan">Perpustakaan</a>
          </li>
          <li class="nav-item mx-5">
            <a class="nav-link" href="/bkk">BKK</a>
            
          </li>
          <li class="nav-item mx-5">
            <a class="nav-link" href="/sis">SIS</a>
          </li>
          <li class="nav-item mx-5">
            <a class="nav-link" href="/ppdb">PPDB</a>
          </li>
          <li class="nav-item mx-5">
            <a class="nav-link" href="/galery">Galery</a>
            <div class="border border-2"></div>
          </li>
        </ul>
      </div>
    </nav>

    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="card bg-dark text-white">
            <img src="/img/jumbotron.jpg" class="card-img" alt="..." />
            <div class="card-img-overlay">
              <h1 class="text-center pt-5">Welcome To</h1>
              <h1 class="text-center pb-5">SMK N 1 BANTUL</h1>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="card bg-dark text-white">
            <img src="/img/jumbotron.jpg" class="card-img" alt="..." />
            <div class="card-img-overlay">
              <h1 class="text-center pt-5">Welcome To</h1>
              <h1 class="text-center">SMK N 1 BANTUL</h1>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="card bg-dark text-white">
            <img src="/img/jumbotron.jpg" class="card-img" alt="..." />
            <div class="card-img-overlay">
              <h1 class="text-center pt-5">Welcome To</h1>
              <h1 class="text-center">SMK N 1 BANTUL</h1>
            </div>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

    <div class="container mt-5">
      <div class="row row-cols-1 row-cols-md-2 g-4">
        <div class="col">
          <div class="row row-cols-1 row-cols-md-2 g-4">
            @foreach ($galerys as $galery)
            <div class="col">
                  <img src="{{ asset('storage/' . $galery->image) }}" class:"w-100" alt="" srcset=""></div>
                  @endforeach
          </div>   
          </div>
        
        <div class="col">
          <div data-aos="fade-up"data-aos-duration="3000">

          <div class="shadow">
            @foreach ($contacts as $contact)
              <h5 class="mt-3 ps-3">{{$contact->title}}</h5>
              <div class="border border-2 border-success"></div>
              <p class="pt-3 ps-3">{!!$contact->description!!}</p>
              @endforeach
          </div>

          <div class="shadow">
            <h5 class="ps-3">Sosial Media</h5>
            <div class="border border-2 border-success"></div>
            <div class="d-flex mt-3">
              <a href="https://www.instagram.com/smkn1bantul/"><h2><i class="bi bi-instagram ms-3 me-3 link-dark"></i></h2></a>
              <a href="https://www.facebook.com/smknegeri1bantul/"><h2><i class="bi bi-facebook me-3 link-dark"></i></h2></a>
              <a href="https://www.youtube.com/c/officialsmkn1bantul"><h2><i class="bi bi-youtube me-3 link-dark"></i></h2></a>
              <a href="https://twitter.com/bantul_smkn1"><h2><i class="bi bi-twitter me-3 link-dark"></i></h2></a>
            </div>
          </div>

          <div class="shadow">
            <h5 class="ps-3">Tautan</h5>
            <div class="border border-2 border-success"></div>
            <div class="d-flex mt-3 ms-3">
              <img src="img/logosmktautan.png" width="60" height="60" alt="" />
              <a href="https://www.smkn1bantul.sch.id/" class="text-decoration-none text-black"><p class="ms-3">SMK N 1 BANTUL</p></a>
            </div>
            <div class="d-flex mt-3 ms-3 mb-3">
              <img src="img/e-learning.png" width="60" alt="" />
              <a href="https://skansaba.id/login/index.php" class="text-decoration-none text-black"><p class="ms-3">E-LEARNING</p></a>
            </div>
          </div>

          <div class="shadow">
            <h5 class="ps-3">Kategori Tulisan</h5>
            <div class="border border-2 border-info"></div>
            <button class="btn btn-success mt-3 ms-3">#Rekayasa Perangkat Lunak</button>
            <button class="btn btn-success mt-3 ms-3">#Download</button>
            <button class="btn btn-success mt-3 ms-3">#PPDB</button>
            <button class="btn btn-success mt-3 ms-3 mb-3">#Struktur Organisasi</button>
          </div>
        </div>
        </div>
      </div>
    </div>
</div>

<div class="bg-primary text-white mt-5">
  <div class="container">
    <div class="row row-cols-2 row-cols-md-2 g-4 justify-content-center">
      <div class="col">
        <div class="d-flex mb-3">
          <img src="/img/logosmk-removebg-preview.png" width="70" height="70" alt="logo" srcset="" />
          <p class="ps-3">
            Copyright ©2022 <br />
            SMK NEGERI 1 BANTUL All rights reserved <br />
            Dikelola oleh TIM ICT SMKN 1 Bantul
          </p>
        </div>
      </div>
      <div class="col d-flex ms-auto my-3">
        <iframe width="100%"
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.053148138141!2d110.35343721477886!3d-7.889508794316216!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7b00889ad8f84d%3A0x2e0009ca7815eaf0!2sSMK%20Negeri%201%20Bantul!5e0!3m2!1sid!2sid!4v1657523252185!5m2!1sid!2sid"
          style="border: 0"
          allowfullscreen=""
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"
        ></iframe>
      </div>
    </div>
  </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
  </body>
</html>
