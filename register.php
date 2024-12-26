<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register Form</title>

  <!-- Importing Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

  <!-- Importing MDB CSS (Material Design for Bootstrap) -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.2.0/mdb.min.css" rel="stylesheet">

  <style>
    body {
      background-image: url('https://your-image-url-here.com/clinic-background.jpg'); /* Add the clinic background image URL here */
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
      font-family: 'Roboto', sans-serif;
      color: #333;
    }

    .h-custom {
      height: calc(100% - 73px);
    }

    .form-container {
      background: rgba(255, 255, 255, 0.8); /* semi-transparent white background */
      border-radius: 15px;
      padding: 40px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      max-width: 500px;
      margin: auto;
    }

    .form-container h3 {
      font-weight: 600;
      color: #333;
    }

    .form-label {
      color: #495057;
      font-weight: 500;
    }

    .form-control {
      border-radius: 8px;
      transition: all 0.3s ease;
    }

    .form-control:focus {
      box-shadow: 0 0 0 0.25rem rgba(38, 143, 255, 0.5);
    }

    .btn-primary {
      background-color: #007bff;
      border: none;
      border-radius: 8px;
      transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
      background-color: #0056b3;
    }

    footer {
      background-color: #003580;
    }

    footer a {
      text-decoration: none;
    }

    footer span {
      font-size: 0.9rem;
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

      .form-container {
        padding: 20px;
      }

      .form-container h3 {
        font-size: 1.5rem;
      }
    }

    /* Custom styles for social media icons */
    .footer-icons a {
      font-size: 1.5rem;
      color: white;
      margin: 0 10px;
    }

    .footer-icons a:hover {
      color: #ffbb33;
    }

    /* Adding some hover effects for input fields */
    .form-outline input:focus, .form-check-input:focus {
      box-shadow: 0 0 0 0.25rem rgba(38, 143, 255, 0.5);
    }

    /* Ensure the form doesn't stretch too wide */
    .form-container {
      width: 100%;
      max-width: 480px;
    }
  </style>
</head>
<body>
  <section class="vh-100 d-flex align-items-center">
    <div class="container">
      <div class="row justify-content-center">
        <!-- Register Form -->
        <div class="col-md-6 col-lg-5">
          <div class="form-container">
            <h3 class="text-center mb-4">Register</h3>
            <form action="register_process.php" method="POST">
              <!-- Full Name input -->
              <div class="form-outline mb-4">
                <input type="text" id="fullName" name="fullName" class="form-control form-control-lg" placeholder="Enter your full name" required />
                <label class="form-label" for="fullName">Full Name</label>
              </div>

              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="email" id="email" name="email" class="form-control form-control-lg" placeholder="Enter a valid email address" required />
                <label class="form-label" for="email">Email Address</label>
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4">
                <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Enter your password" required />
                <label class="form-label" for="password">Password</label>
              </div>

              <!-- Confirm Password input -->
              <div class="form-outline mb-4">
                <input type="password" id="confirmPassword" name="confirmPassword" class="form-control form-control-lg" placeholder="Confirm your password" required />
                <label class="form-label" for="confirmPassword">Confirm Password</label>
              </div>

              <!-- Terms and Conditions checkbox -->
              <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="terms" name="terms" required />
                  <label class="form-check-label" for="terms">
                    I agree to the <a href="#" class="text-primary">Terms and Conditions</a>
                  </label>
                </div>
              </div>

              <!-- Register Button -->
              <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-lg">Register</button>
              </div>

              <!-- Login Link -->
              <p class="text-center small mt-3 mb-0">Already have an account? <a href="index.php" class="link-danger">Login</a></p>
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
      <div class="footer-icons mt-2">
        <a href="#" class="text-white me-3"><i class="fab fa-facebook-f"></i></a>
        <a href="#" class="text-white me-3"><i class="fab fa-twitter"></i></a>
        <a href="#" class="text-white me-3"><i class="fab fa-google"></i></a>
        <a href="#" class="text-white"><i class="fab fa-linkedin-in"></i></a>
      </div>
    </div>
  </footer>

  <!-- Importing MDB and Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.2.0/mdb.min.js"></script>
</body>
</html>
