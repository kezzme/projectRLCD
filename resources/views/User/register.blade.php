<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <!-- CSS Files -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
    <!-- Customized Bootstrap Stylesheet -->
    
     <!-- Libraries Stylesheet -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link href="assets/css/style.css" rel="stylesheet">
   
</head>
<body>
    
<main >
<section class="d-flex vh-100">
  <div class="container  ">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-8">
        <div class="card card-shadow" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="img/register_img.png"
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="py-4 card-body justify-content-center col-md-6 col-lg-7 d-flex">
              <!-- <div class="card-body p-4 p-lg-5 text-black"> -->

                <form action="/store" method="POST">
                   @csrf
                  <div class="d-flex align-items-center pb-1 col-12">
                  <img src="img/logo.png" class="login_logo d-flex">
                    <span class="h1 fw-bold">RL Car Dealer</span>
                  </div>
                  <h3>Create Account</h3>
                  <h5 class="fw-normal pb-3" style="letter-spacing: 1px;">Enter your personal details</h5>


                  <div class="input-group mb-3">
                    <label for="first_name" class="input-group-text bg-danger text-white justify-content-center col-md-3">First Name</label>
                    <input type="text" name="first_name" style="text-transform: capitalize;" class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}" required autocomplete="name" >
                  </div>

                  <div class="input-group mb-3">
                    <label for="last_name" class="input-group-text bg-danger text-white justify-content-center col-md-3">Last Name</label>
                    <input type="text" name="last_name" style="text-transform: capitalize;" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}" required autocomplete="name" >
                  </div>

                  <div class="input-group mb-3">
                    <label for="email" class="input-group-text bg-danger text-white col-md-3 d-flex justify-content-center">Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" >
                  </div>

                  <div class="input-group mb-3">
                    <label for="phone" class="input-group-text bg-danger text-white col-md-3">Phone No.</label>
                    <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" required>
                  </div>

                  <div class="input-group mb-3">
                    <label for="password" class="input-group-text bg-danger text-white col-md-3">Password</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                  </div>

                  <div class="input-group mb-3">
                    <label for="password_confirm" class="input-group-text bg-danger text-white col-md-3">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" required>
                  </div>
      

                  <p class="pb-lg-2">Already have an account? <a href="/login" class="text-primary text-bold">Login</a></p>

                  <div class="col-md-12 py-3">
                    <button class="btn btn-dark col-12" type="submit">Create Account</button>
                  </div>
                </form>

              <!-- </div> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


  </main>
  <!-- End #main -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.3.2/tinymce.min.js" integrity="sha512-0hADhKU8eEFSmp3+f9Yh8QmWpr6nTYLpN9Br7k2GTUQOT6reI2kdEOwkOORcaRZ+xW5ZL8W24OpBlsCOCqNaNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- JavaScript Libraries -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script> -->

    <!-- Template Javascript -->
    <!-- <script src="js/main.js"></script> -->

</body>
</html>