<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/fonts/icomoon/style.css') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}">
    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('assets/css/login_style.css') }}">

    <title>Login</title>
  </head>
  <body>
    {{-- pt-md-5 pt-lg-5 pt-xl-5 pt-sm-5 mt-md-5 mt-lg-5 mt-xl-5 mt-sm-5 --}}
  <div class="">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="{{ asset('assets/images/undraw_remotely_2j6y.svg') }}" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6">
          <div class="row d-flex justify-content-center align-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <h3>Log In</h3>
            </div>
            <form action="#" method="post">
              <div class="form-group first field--not-empty">
                <label for="username">Username</label>
                <input type="text" class="form-control input-field" id="username">
              </div>

              <div class="form-group last mb-4 field--not-empty">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password">
              </div>

              <div class="d-flex mb-5 align-items-center">
                <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                  <input type="checkbox" checked="checked"/>
                  <div class="control__indicator"></div>
                </label>
              </div>

              <input type="submit" value="Log In" class="btn btn-block btn-primary">
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


    <script src="{{ asset('assets/plugins/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/login_main.js') }}"></script>
  </body>
</html>
