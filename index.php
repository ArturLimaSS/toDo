<?php
session_start();
if (isset($_SESSION['username'])) {
  header("Location: /cards/cards.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="index.js"></script>
  <link rel="stylesheet" href="index.css">
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
  <!-- MDB -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.css" rel="stylesheet" />

  <title>toDO</title>
</head>

<body>

  <section class="vh-100">
    <div class="container-fluid h-custom">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-9 col-lg-6 col-xl-5">
          <img src="./assets/img/loginVector.jpg" class="img-fluid" alt="Sample image">
        </div>
        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
          
          <form action="autentica.php" method="POST">
          <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
          <img class="img-fluid" alt="Sample image" src="./assets/img/logo.svg" style="width: 50%;" alt="" srcset=""></div>
            <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
            </div>

            <!-- Email input -->
            <div class="form-outline mb-4">
              <input type="email" id="email" name="email" class="form-control form-control-lg" placeholder="Email" />
              <label class="form-label" for="form3Example3">Email</label>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-3">
              <input type="password" id="senha" name="senha" class="form-control form-control-lg" placeholder="Senha" />
              <label class="form-label" for="senha">Senha</label>
            </div>

            <div class="d-flex justify-content-between align-items-center">
              <a href="#!" class="text-body">Esqueceu a senha?</a>
            </div>

            <div class="text-center text-lg-start mt-4 pt-2">
              <button type="submit" id="entrarButton" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
              <p class="small fw-bold mt-2 pt-1 mb-0">Não tem uma conta? <a href="#!" class="link-danger">Entre em contato com o nosso time comercial</a></p>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
      <!-- Copyright -->
      <div class="text-white mb-3 mb-md-0">
        Copyright © 2023 DOTEK. Todos os direitos reservados.
      </div>
      <!-- Copyright -->

      <!-- Right -->
      <div>
        <a href="#!" class="text-white me-4">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="#!" class="text-white me-4">
          <i class="fab fa-twitter"></i>
        </a>
        <a href="#!" class="text-white me-4">
          <i class="fab fa-google"></i>
        </a>
        <a href="#!" class="text-white">
          <i class="fab fa-linkedin-in"></i>
        </a>
      </div>
      <!-- Right -->
    </div>
  </section>



  <!-- Section: Design Block -->
  <!-- 
<section class="vh-100 gradient-custom" id="login">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card text-white" id="card">
          <div class="card-body p-5 text-center">
            <form action="autentica.php" method="POST">
              <div class="mb-md-5 mt-md-4 pb-5">
                <h2 class="fw-bold mb-2">DO</h2>
                <p class="text-white-50 mb-5">Insira seu email e senha</p>
                <div class="form-outline mb-4">
                  <input type="email" id="email" name="email" placeholder="Email" class="form-control" />
                  <label class="form-label" for="email">Email</label>
                </div>
                <div class="form-outline mb-4">
                  <input type="password" id="senha" name="senha" placeholder="Senha" class="form-control" />
                  <label class="form-label" for="senha">Senha</label>
                </div>
                <button class="btn btn-primary btn-block mb-4" id="submitButton" type="submit" onclick="verifica()">Login</button>
                <div class="d-flex justify-content-center text-center mt-4 pt-1">
                  <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                  <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                  <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                </div>
              </div>
            </form>
            <div>
              <p class="mb-0">Esqueceu a senha? <a href="#!" class="text-white-50 fw-bold">Clique aqui!</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> -->
</body>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.js"></script>

</html>