<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login &mdash; Stisla</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('modules/fontawesome/css/all.min.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components.css') }}">

  <body>
    <div id="app">
      <section class="section">
        <div class="container mt-5">
          <div class="row">
            <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
              <div class="login-brand">
                <img src="{{ asset('img/stisla-fill.svg') }}" alt="logo" width="100" class="shadow-light rounded-circle">
              </div>

              <div class="card card-primary">
                <div class="card-header"><h4>Login</h4></div>

                <div class="card-body">
                  <form class="needs-validation" novalidate="" id="login">
                    @csrf
                    <div class="form-group">
                      <label for="username">Username</label>
                      <input id="username" type="text" class="form-control" name="username" tabindex="1" required autofocus>
                      <div class="invalid-feedback">
                        Please fill in your username
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="d-block">
                        <label for="password" class="control-label">Password</label>
                      </div>
                      <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                      <div class="invalid-feedback" id="invalid-password">
                        
                      </div>
                    </div>

                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4" id="cekk">
                        Login
                      </button>
                    </div>
                  </form>
                  
                </div>
              </div>
              <div class="mt-5 text-muted text-center">
                Don't have an account? <a href="dist/auth_register">Create One</a>
              </div>
              <div class="simple-footer">
                Copyright &copy; Stisla 2018
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('modules/jquery.min.js') }}"></script>
    <script src="{{ asset('modules/popper.js') }}"></script>
    <script src="{{ asset('modules/tooltip.js') }}"></script>
    <script src="{{ asset('modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('js/stisla.js') }}"></script>

    <!-- Template JS File -->
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script>
      $(document).ready(function(){
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        })

        $('#login').submit(function(event){
          event.preventDefault();
          $('#cekk').attr('disabled',true);
          $.ajax({
            type: 'POST',
            url: 'http://localhost:8000/login',
            data: $('#login').serialize(),
            dataType: 'JSON',
            success: function(data){
              console.log(data)
              $('#invalid-password').append('asdas').show()
              $('#cekk').attr('disabled',false);
            },
            error: function(request){
              $('#cekk').attr('disabled',false);
              console.log(request)
            }
          })
        })
      })
    </script>
  </body>
</html>