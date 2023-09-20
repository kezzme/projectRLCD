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
                alt="registration form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
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
                  <h6 class="fw-normal pb-3" style="letter-spacing: 1px;">Enter your personal details</h6>


                  <div class=" mb-2">
                    <input type="text" name="first_name" style="text-transform: capitalize;" class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}" placeholder="First Name" required autocomplete="name">
                  </div>

                  <div class=" mb-2">
                    <input type="text" name="last_name" style="text-transform: capitalize;" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}" placeholder="Last Name" required autocomplete="name">
                  </div>

                  <div class=" mb-2">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Email" required autocomplete="email">
                  </div>

                  <div class=" mb-2">
                    <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" placeholder="Phone No." required autocomplete="phone">
                  </div>

                  <div class=" mb-2">
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required>
                  </div>

                  <div class=" mb-3 ">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
                  </div>
      

                  <p>Already have an account? <a href="/login" class="text-primary text-bold">Login</a></p>

                  <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="termsAndConditions" name="termsAndConditions" required>
                    <label class="form-check-label" for="termsAndConditions">I agree to the <a href="{{route('termsAndconditions')}}" class=" text-bold">Terms and Conditions</a></label>
                  </div>

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