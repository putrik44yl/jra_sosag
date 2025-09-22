<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Register</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
          rel="stylesheet" 
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
          crossorigin="anonymous">

    <style>
      body {
        background: linear-gradient();
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
      }
      .card {
        border-radius: 1rem;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
          <div class="card shadow">
            <div class="card-header text-center fw-bold bg-primary text-white">
              {{ __('Register') }}
            </div>

            <div class="card-body">
              <form method="POST" action="{{ route('register') }}">
                @csrf

                {{-- Name --}}
                <div class="mb-3">
                  <label for="name" class="form-label">{{ __('Name') }}</label>
                  <input id="name" type="text" 
                         class="form-control @error('name') is-invalid @enderror" 
                         name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                  @error('name')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                {{-- Email --}}
                <div class="mb-3">
                  <label for="email" class="form-label">{{ __('Email Address') }}</label>
                  <input id="email" type="email" 
                         class="form-control @error('email') is-invalid @enderror" 
                         name="email" value="{{ old('email') }}" required autocomplete="email">
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
                         name="password" required autocomplete="new-password">
                  @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                {{-- Confirm Password --}}
                <div class="mb-3">
                  <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                  <input id="password-confirm" type="password" 
                         class="form-control" 
                         name="password_confirmation" required autocomplete="new-password">
                </div>

                {{-- Buttons --}}
                <div class="d-grid gap-2 mb-2">
                  <button type="submit" class="btn btn-primary">
                    {{ __('Register') }}
                  </button>
                  <a href="{{ route('login') }}" class="btn btn-secondary">
                    {{ __('Login') }}
                  </a>
                </div>

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