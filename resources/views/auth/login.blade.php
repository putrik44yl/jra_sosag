<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login - Laravel</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
          rel="stylesheet" 
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
          crossorigin="anonymous">

    
  </head>
  <body>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
          <div class="card shadow">
            <div class="card-header text-center fw-bold bg-primary text-white">
              {{ __('Login') }}
            </div>

            <div class="card-body">
              <form method="POST" action="{{ route('login') }}">
                @csrf

                {{-- Email --}}
                <div class="mb-3">
                  <label for="email" class="form-label">{{ __('Email Address') }}</label>
                  <input id="email" type="email" 
                         class="form-control @error('email') is-invalid @enderror" 
                         name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                  @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                {{-- Password --}}
                <div class="mb-3">
                  <label for="password" class="form-label">{{ __('Password') }}</label>
                  <input id="password" type="password" 
                         class="form-control @error('password') is-invalid @enderror" 
                         name="password" required autocomplete="current-password">
                  @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                {{-- Remember Me --}}
                <div class="mb-3 form-check">
                  <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                  <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                  </label>
                </div>

                {{-- Buttons --}}
                <div class="d-grid gap-2 mb-2">
                  <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                  </button>
                  <a href="{{ route('register') }}" class="btn btn-secondary">
                    {{ __('Register') }}
                  </a>
                </div>

                {{-- Forgot Password --}}
                @if (Route::has('password.request'))
                  <div class="text-center">
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                      {{ __('Forgot Your Password?') }}
                    </a>
                  </div>
                @endif

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
            crossorigin="anonymous"></script>
  </body>
</html>