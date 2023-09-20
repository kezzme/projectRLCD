
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Admin-RL Car Dealer</title>

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  
  <!-- Vendor CSS Files -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"  />
  
  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">


</head>

<body>
<section>
    <div class="container mt-5">
      <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
          <div class="login-wrap p-4 p-md-5">
            <div class="icon d-flex align-items-center justify-content-center">
              <span class="fa-solid fa-user-tie"></span>
            </div>
            <h3 class="text-center mb-4">Welcome, Admin!</h3>
            <form action="{{route('system.check')}}" class="login-form" method="POST">
              @csrf
              <div class="form-group">
                <input name="username" id="username" type="text" class="form-control rounded-left" placeholder="Username" required>
              </div>
              <div class="form-group d-flex position-relative">
                <input name="password" id="password" type="password" class="form-control rounded-left pr-5" placeholder="Password" required>
                <i class="fas fa-eye position-absolute" style="right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;" onclick="togglePasswordVisibility()" id="togglePasswordIcon"></i>
            </div>
            
              <div class="form-group d-md-flex">
                <div class="w-50">
                  <label class="checkbox-wrap checkbox-primary">Remember Me <input type="checkbox" checked>
                    <span class="checkmark"></span>
                  </label>
                </div>
                <div class="w-50 text-md-right">
                  <a href="#">Forgot Password</a>
                </div>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary rounded submit p-3 px-5">Get Started</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script>
    function togglePasswordVisibility() {
        const passwordInput = document.getElementById('password');
        const togglePasswordIcon = document.getElementById('togglePasswordIcon');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            togglePasswordIcon.classList.remove('fa-eye');
            togglePasswordIcon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            togglePasswordIcon.classList.remove('fa-eye-slash');
            togglePasswordIcon.classList.add('fa-eye');
        }
    }
</script>


</body>

</html>