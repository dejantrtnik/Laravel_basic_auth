<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{ asset('node_modules/bootstrap/dist/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('resources/css/home.css') }}">
  <title>{{ config('app.name', 'no_name') }}</title>
</head>
<body class="antialiased">
  <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
    @if (Route::has('login'))
      <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
        @auth
          <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
        @else
          <div class="wrapper fadeInDown">
            <div id="formContent">
              <div class="fadeIn first formHeader">
                <h3>{{ $title }}</h3>
              </div>
              <!-- Login Form -->
              <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="inputFormLogin">
                  <div class="inputDes">
                    <input type="email" class="form-control fadeIn second" name="email" value="" placeholder="email" required autocomplete="email" autofocus>
                  </div>
                  <div class="inputDes">
                    <input type="password" class="form-control fadeIn third" name="password" placeholder="password" required autocomplete="current-password">
                  </div>
                </div>
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <input type="submit" class="btn btn-primary fadeIn fourth" value="Login"/>
                @if (Route::has('password.request'))
                  <div id="formFooter">
                    <a class="underlineHover" href="{{ route('password.request') }}">Forgot Password?</a>
                  </div>
                @endif
              </form>
              @if (Route::has('register'))
                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
              @endif
            </div>
          </div>

        @endauth
      </div>
    @endif
  </div>
</body>
</html>
