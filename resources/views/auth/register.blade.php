<!doctype html>
<html lang="en" class="layout-wide customizer-hide" data-assets-path="../assets/" data-template="vertical-menu-template-free">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
  <title>Register - Sneat Bootstrap Dashboard</title>

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans&display=swap" rel="stylesheet" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="../assets/vendor/css/core.css" />
  <link rel="stylesheet" href="../assets/css/demo.css" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

  <!-- Page CSS -->
  <link rel="stylesheet" href="../assets/vendor/css/pages/page-auth.css" />

  <!-- Helpers -->
  <script src="../assets/vendor/js/helpers.js"></script>
  <script src="../assets/js/config.js"></script>
</head>

<body>
  <div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner">
        <div class="card px-sm-6 px-0">
          <div class="card-body">
            <!-- Logo -->
            <div class="app-brand justify-content-center mb-6">
              <a href="{{ url('/') }}" class="app-brand-link gap-2">
                <!-- Aqui pode colocar seu SVG ou logo -->
                <span class="app-brand-text demo text-heading fw-bold">SeuApp</span>
              </a>
            </div>
            <!-- /Logo -->

            <h4 class="mb-1">Create your account 🚀</h4>
            <p class="mb-6">Please fill in the form to register.</p>

            <!-- Exibir erros do Laravel (simulação, ajustar no backend) -->
            @if ($errors->any())
              <div class="alert alert-danger mb-4">
                <ul class="mb-0">
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
              @csrf
              <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input
                  id="name"
                  type="text"
                  class="form-control"
                  name="name"
                  value="{{ old('name') }}"
                  required
                  autofocus
                  autocomplete="name"
                  placeholder="Enter your name"
                />
              </div>

              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input
                  id="email"
                  type="email"
                  class="form-control"
                  name="email"
                  value="{{ old('email') }}"
                  required
                  autocomplete="username"
                  placeholder="Enter your email"
                />
              </div>

              <div class="mb-3 form-password-toggle">
                <label for="password" class="form-label">Password</label>
                <div class="input-group input-group-merge">
                  <input
                    id="password"
                    type="password"
                    class="form-control"
                    name="password"
                    required
                    autocomplete="new-password"
                    placeholder="••••••••••••"
                    aria-describedby="password"
                  />
                  <span class="input-group-text cursor-pointer"><i class="icon-base bx bx-hide"></i></span>
                </div>
              </div>

              <div class="mb-3 form-password-toggle">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <div class="input-group input-group-merge">
                  <input
                    id="password_confirmation"
                    type="password"
                    class="form-control"
                    name="password_confirmation"
                    required
                    autocomplete="new-password"
                    placeholder="••••••••••••"
                  />
                  <span class="input-group-text cursor-pointer"><i class="icon-base bx bx-hide"></i></span>
                </div>
              </div>

              @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mb-3 form-check">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    name="terms"
                    id="terms"
                    required
                  />
                  <label class="form-check-label" for="terms">
                    I agree to the
                    <a target="_blank" href="{{ route('terms.show') }}">Terms of Service</a> and
                    <a target="_blank" href="{{ route('policy.show') }}">Privacy Policy</a>
                  </label>
                </div>
              @endif

              <button type="submit" class="btn btn-primary d-grid w-100">
                Register
              </button>
            </form>

            <p class="text-center mt-4">
              <span>Already have an account?</span>
              <a href="{{ route('login') }}"><span>Sign in instead</span></a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Core JS -->
  <script src="../assets/vendor/libs/jquery/jquery.js"></script>
  <script src="../assets/vendor/libs/popper/popper.js"></script>
  <script src="../assets/vendor/js/bootstrap.js"></script>
  <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="../assets/vendor/js/menu.js"></script>
  <script src="../assets/js/main.js"></script>

  <!-- Password toggle script -->
  <script>
    document.querySelectorAll('.form-password-toggle .input-group-text').forEach(el => {
      el.addEventListener('click', function () {
        const input = this.previousElementSibling;
        if (input.type === 'password') {
          input.type = 'text';
          this.querySelector('i').classList.remove('bx-hide');
          this.querySelector('i').classList.add('bx-show');
        } else {
          input.type = 'password';
          this.querySelector('i').classList.remove('bx-show');
          this.querySelector('i').classList.add('bx-hide');
        }
      });
    });
  </script>
</body>
</html>
