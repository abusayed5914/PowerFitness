<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PowerFitness</title>
    
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
  
    <link rel="stylesheet" href="/css/style.default.css" id="theme-stylesheet">
 </head>
  <body>

    <div class="page login-page">
      <div class="container d-flex">
        <div class="form-holder has-shadow"  style="margin-top: 80px">
          <div class="row">
            <!-- Logo & Information Panel-->
            <div class="col-lg-6">
              <div class="info d-flex ">
                <div class="content"style="margin-top:-8%">
                  <div class="logo">
                    <h1>PowerFitness</h1>
                  </div>
                


                </div>
              </div>
            </div>
            <!-- Form Panel    -->
            <div class="col-lg-6" style="background-color: #F0F0F0F0;" >
              <div class="form d-flex align-items-center"  >
                <div class="content">
                    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                    <form class="form-horizontal" method="POST" id="login-for" style="margin-top: 30px; margin-left: -24px;" action="{{ route('login') }}">
                        {{ csrf_field() }}
                    <div class="form-group">
                      <input id="login-username" type="text" name="email" required="" class="input-material" required="true">
                      <label for="login-username" class="label-material" style="margin-left: 3px;">User Name</label>
                    </div>
                    <div class="form-group">
                      <input id="login-password" type="password" name="password" required="" class="input-material" required="true">
                      <label for="login-password" class="label-material" style="margin-left: 3px;">Password</label>
                    </div>

                    <button id="login" class="btn btn-primary" style="margin-left: -14px;">Login</button>
                    <!-- This should be submit button but I replaced it with <a> for demo purposes-->
                  </form> 
                  <a class="btn btn-link" style="margin-left: -50px;" href="{{ route('password.request') }}">
                            Forgot Your Password?
                        </a>
                       <br>
                       <a href="/register" class="signup"  style="margin-left: -37px ">Signup Here</a>
               </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="copyrights text-center">
        <p>Design by Abu Sayed</p>
        <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
      </div>
    </div>
    <!-- Javascript files-->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="/js/popper.min.js"> </script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/jquery.cookie.js"> </script>
    <script src="/js/jquery.validate.min.js"></script>
    <script src="js/front.js"></script>
  </body>
</html>