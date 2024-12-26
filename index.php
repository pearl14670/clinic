<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>

  <!-- Importing Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Importing MDB CSS (Material Design for Bootstrap) -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.2.0/mdb.min.css" rel="stylesheet">

  <style>
    body {
      background-color: #f4f7fc;
      font-family: 'Roboto', sans-serif;
    }

    .h-custom {
      height: calc(100% - 73px);
    }

    .form-container {
      background: #fff;
      border-radius: 15px;
      padding: 40px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      max-width: 500px;
      margin: auto;
      transition: transform 0.3s ease;
    }

    .form-container:hover {
      transform: scale(1.02);
    }

    .form-label {
      color: #6c757d;
      font-weight: 500;
    }

    .btn-primary {
      background-color: #007bff;
      border: none;
      transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
      background-color: #0056b3;
    }

    .btn-lg {
      font-size: 1.1rem;
      padding: 15px 20px;
    }

    .form-outline input {
      border-radius: 10px;
      border: 1px solid #ced4da;
      transition: border-color 0.3s ease;
    }

    .form-outline input:focus {
      border-color: #007bff;
      box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }

    .form-check-input:checked {
      background-color: #007bff;
      border-color: #007bff;
    }

    footer {
      background-color: #003580;
    }

    footer a {
      text-decoration: none;
      color: #fff;
      font-size: 1.2rem;
    }

    footer span {
      font-size: 0.9rem;
      color: #f8f9fa;
    }

    footer .social-icons i {
      font-size: 1.5rem;
      margin: 0 10px;
      color: #fff;
    }

    footer .social-icons i:hover {
      color: #007bff;
    }

    @media (max-width: 768px) {
      .form-container {
        padding: 30px;
      }
    }

    @media (max-width: 450px) {
      .h-custom {
        height: 100%;
      }
    }
  </style>
</head>

<body>
  <section class="vh-100 d-flex align-items-center">
    <div class="container">
      <div class="row justify-content-center">
        <!-- Login Form -->
        <div class="col-md-6 col-lg-5">
          <div class="form-container">
            <h3 class="text-center mb-4 font-weight-bold text-primary">Login</h3>
            <form action="login_process.php" method="POST">
              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="email" id="form3Example3" class="form-control form-control-lg" name="email" placeholder="Enter your email" required />
                <label class="form-label" for="form3Example3">Email Address</label>
              </div>

              <!-- Password input -->
              <div class="form-outline mb-3">
                <input type="password" id="form3Example4" class="form-control form-control-lg" name="password" placeholder="Enter your password" required />
                <label class="form-label" for="form3Example4">Password</label>
              </div>

              <!-- Checkbox and Forgot Password -->
              <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="rememberMe" />
                  <label class="form-check-label" for="rememberMe">Remember me</label>
                </div>
                <a href="#" class="text-primary">Forgot password?</a>
              </div>

              <!-- Login Button -->
              <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-lg">Login</button>
              </div>

              <!-- Register Link -->
              <p class="text-center small mt-3 mb-0">Don't have an account? <a href="register.php" class="link-danger">Register</a></p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="text-center text-white py-3">
    <div class="container">
      <span>&copy; 2024. All rights reserved.</span>
      <div class="mt-2 social-icons">
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-google"></i></a>
        <a href="#"><i class="fab fa-linkedin-in"></i></a>
      </div>
    </div>
  </footer>

  <!-- Importing MDB and Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.2.0/mdb.min.js"></script>
</body>

</html>
