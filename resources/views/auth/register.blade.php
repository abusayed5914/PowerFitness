<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PowerFitness</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.default.css" id="theme-stylesheet">
    </head>
    
<body>

   <div class="page login-page">

     <div class="container d-flex align-items-center">
       @if(Session::has('success'))
  <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    {{ Session::get('success') }}
  </div>
@endif
@if(Session::has('danger'))
  <div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    {{ Session::get('danger') }}
  </div>
@endif
@if(count($errors))
  <div class="alert alert-danger validation-error-message">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Error:</strong>
    <ul>
      @foreach($errors->all() as $error)
        <li>
          {{ $error }}
        </li>
      @endforeach
    </ul> 
  </div>
@endif
       <div class="form-holder has-shadow"  style="margin-top: 80px">
         <div class="row">
        <!-- Logo & Information Panel-->
         <div class="col-lg-6">
         <div class="info d-flex align-items-center">
         <div class="content"style="margin-top:-8%">
         <div class="logo">
           <h1>Power Fitness</h1>
         </div>
         
         </div>
       </div>
    </div>
        
       <!-- Form Panel    -->
         
       <div class="col-lg-6 "  style="background-color: #F0F0F0F0;">
         <div class="form d-flex align-items-center">
         <div class="content" style="margin-left: -22px;margin-top: -10px;">
            <form class="form-horizontal" id="register-form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

         <div class="form-group">
            <input id="register-username" type="text" name="name"  class="input-material" required="true" value="{{old('name')}}">
            <label for="register-username" class="label-material" >User Name</label>
         </div>
         
         <div class="form-group">
            <input id="register-email" type="email" name="email"  class="input-material" required="true"  value="{{old('email')}}">
            <label for="register-email" class="label-material">Email Address </label>
         </div>
         
         <div class="form-group">
            <input id="register-passowrd" type="password" name="password" class="input-material" required="true">
            <label for="register-passowrd" class="label-material">password </label>
         </div>
         
         <div class="form-group">
            <input id="register-passowrd" type="password" name="password_confirmation" class="input-material" required="true">
            <label for="register-passowrd" class="label-material">Re-password </label>
         </div>
        
             <input id="register" type="submit" value="Register"  class="btn btn-primary "style="margin-left: -15px;">
             </form><br>
             <a href="/login" style="margin-left: -15px; class="signup" >Login</a>
           </div>

         </div>
       </div>
     </div>
   </div>
</div>
   
    <div class="copyrights text-center">
        <p>Design Abu Sayed </p>
       </div>
    </div>
    <!-- Javascript files-->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/front.js"></script>
  </body>
</html>