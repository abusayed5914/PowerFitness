<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Area | Dashboard</title>
    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>

.fa {
  padding: 15px;
  font-size: 20px;
 
  margin: 5px 2px;
}

.fa:hover {
    opacity: 0.7;
}

.fa-facebook {
  background: #3B5998;
  color: white;
}

.fa-twitter {
  background: #55ACEE;
  color: white;
}

.fa-google {
  background: #dd4b39;
  color: white;
}

.fa-linkedin {
  background: #007bb5;
  color: white;
}

.fa-youtube {
  background: #bb0000;
  color: white;
}

.fa-instagram {
  background: #125688;
  color: white;
}

 <!-- Social Media Link end -->


</style>

  </head>
 <body>

  <!-- Navbar -->

   @include('user.include.menubar')
    
      
      
    <div class="section" style="margin-top: 3%">
     
      <div class="container">
        <div class="row">  
   @include('include.error')

      <div class="con" style="background: #F0F0F0;">
      
        <div class="container-fluid"  >
          <h2>Contact Us</h2> 
          <form action="/sendMessage" method="POST" enctype="multipart/form-data">
          <div class="row">      
            <div class="col-md-12" style="margin-top: 20px">
              <input type="text" name="name" class="form-control" placeholder="name">
            </div> 
      </div>

      <div class="row">      
            <div class="col-md-12">
              <input type="text" name="email" class="form-control" placeholder="email">
            </div>   
      </div>

      <div class="row">     
            <div class="col-md-12">
              <input type="text" name="subject" class="form-control" placeholder="subject">
            </div>  
            <br>    
      </div>

      <div class="row">    
        <br>
            <div class="col-md-12">
              <textarea name="message" id="" class="form-control" cols="150" rows="10"></textarea>
            </div>
            <br>
      </div>

      <div class="row">    
        <br>
            <div class="col-md-12">
              <button class="btn btn-success text-center" style="margin-bottom:20px;">Send Message</button>
            </div>
            <br>
      </div>
    </form>
      </div>
    </div>
      
     </div>
       </div>    
      </div>    

  
    <!-- Footer --> 
  
    <footer class="footer_contents" style="font-family: roboto">
      <div class="container">
        <div class="row">
          <div class="my_foot col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
            <h2>PowerFitness</h2>
            </div>
        
      <div class="footer_area text-center">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
        
          <h3>About Us</h3>
          <p style="font-size: 16px">
            The state of Utah in the United States is home to lots of beautiful National Parks & Bryce Canyon National Park.
          </p>
        </div>
        
          
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
        
        <h3>Contact Us</h3>
          <p style="font-size: 16px">
            56/8, rockybeach road, santa monica, Los angeles, California - 59620.
          </p>
          <p class="number" style="font-size: 16px">
            01715379241 <br>
            01738353759
          </p>
      </div>
            
      <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-4">
      
      <h3>Social Media Link</h3>
      
        <a href="https://www.facebook.com/" class="fa fa-facebook"></a>
        <a href="https://twitter.com/login" class="fa fa-twitter"></a>
        <a href="https://www.linkedin.com/" class="fa fa-linkedin"></a>
        <a href="https://www.instagram.com/" class="fa fa-instagram"></a>

      </div>
      
      </div>
    </div>
  </div>
      <div class="footer-bottom "style="margin-top: 10px; padding:10px; font-size: 16px"  >
        
      Copyright &copy;<script>document.write(new Date().getFullYear());</script> By Abu Sayed
          
    </div>
    
  </footer>
  
          

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/js/library.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/js/bootstrap.min.js"></script>
    
</body>
  
</html>     