<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- CSS Files -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
    <!-- Customized Bootstrap Stylesheet -->
    
     <!-- Libraries Stylesheet -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link href="assets/css/style.css" rel="stylesheet">
   
</head>
<body>


<main>
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="check-circle-fill" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
  </symbol>
  <symbol id="info-fill" viewBox="0 0 16 16">
    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
  </symbol>
  <symbol id="exclamation-triangle-fill" viewBox="0 0 16 16">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </symbol>
</svg>

                   



<section class="d-flex vh-100">
  <div class="container py-5 ">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-8">
      @error('email')
        <div class="alert alert-danger d-flex align-items-center" role="alert" style="height: 40px;">
        <i class="fa-solid fa-triangle-exclamation" style="color: #ff0000;"></i>&nbsp;{{$message}}
        </div>
        @enderror
        <div class="card card-shadow" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="img/login_img.png"
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex">
              <div class="card-body p-4 p-lg-5 text-black">

              <form action="/login/process" method="POST">
                @csrf
                  <div class="d-flex align-items-center mb-5 pb-1 col-12">
                  <img src="img/logo.png" class="login_logo d-flex">
                    <span class="h1 fw-bold mb-0">RL Car Dealer</span>
                  </div>

                  <h5 class="fw-normal pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                  <div class="form-outline mb-2 col-12">
                    <input type="email" id="email" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    <label class="form-label" for="email">{{ __('Email Address') }}</label>
                  </div>

                  <div class="form-outline mb-2">
                    <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    <label class="form-label" for="password">{{ __('Password') }}</label>
                  </div>

                  <a class="small text-muted" href="#!">Forgot password?</a>
                  <p class=" pb-lg-2">Don't have an account? <a href="/register" class="text-primary text-bold">Register here</a></p>

                  <div class=" col-md-12">
                    <button type="submit" class="btn btn-dark col-12 ">Login</button>
                  </div>
                  </form>
                 <hr>

                <div class=" mb-2 col-md-12">
                 <button class="btn btn-block btn-primary col-12" type="submit"><i class="fab fa-facebook-f"></i> Sign in with Facebook</button>
                </div>
                  
                <div class=" mb-2 col-md-12">
                  <button class="btn btn-block btn-danger col-12" type="submit"><i class="fa-brands fa-google-plus-g"></i> Sign in with Google</button>
                </div>
              
                  
                 
                

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


  </main>
  <!-- End #main -->

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.3.2/tinymce.min.js" integrity="sha512-0hADhKU8eEFSmp3+f9Yh8QmWpr6nTYLpN9Br7k2GTUQOT6reI2kdEOwkOORcaRZ+xW5ZL8W24OpBlsCOCqNaNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
  <!-- JavaScript Libraries -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>-->

    <!-- Template Javascript -->
    <!-- <script src="js/main.js"></script> -->

</body>
</html>