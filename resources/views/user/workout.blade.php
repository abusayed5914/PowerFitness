<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Area | Dashboard</title>
    <!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    color: black;
    background: white;
}
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

.navbar-default .navbar-nav>li>a {
    color: orange;
}
 <!-- Social Media Link end -->


</style>

  </head>
 <body>
  
  @include('user.include.menubar')
  @include('user.include.modal')


    <!-- Footer --> 
    
    <footer class="footer_content" style="margin-top:8%; margin-left:50px;background-color: white;font-family: roboto">
       <div class="">
      <div class="container">
       
          <div class="text-center" >
            <h2 style="color: black">{{$workoutname->category}}</h2>
          </div>

          @if(count($workout ) > 0 ) 
          @foreach($workout as $singleWorkout) 
            <div class="text-center hover" style="width: 30%;float:left ;margin:10px;margin-top:4%" data-toggle="modal" data-target="#myModal"  onclick="sendData('{!!$singleWorkout->title!!}', '{!!$singleWorkout->image!!}','{!!$singleWorkout->id!!}','{{$singleWorkout->set1}}','{{$singleWorkout->set2}}','{{$singleWorkout->set3}}',)">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 thumbnail">
              
                <img src="{{url('/file/'.$singleWorkout->image)}}" class="img-responsive" alt="" style="height: 200px;width: 100%">


               {{--  @if(!empty($singleWorkout->image1))
                <img src="{{url('/file/'.$singleWorkout->image1)}}" class="img-responsive" alt="" style="height: 200px;width: 100%">
                @endif

                @if(!empty($singleWorkout->image2))
                <img src="{{url('/file/'.$singleWorkout->image2)}}" class="img-responsive" alt="" style="height: 200px;width: 100%">
                @endif --}}


                <h4 style="color: black">{{$singleWorkout->title}}</h4>
                <div id="{!!$singleWorkout->id!!}" class="black" style="display: none;">
                  <?php echo htmlentities($singleWorkout->description, ENT_QUOTES)?>
                </div>{{-- 
                 <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" onclick="sendData('{!!$singleWorkout->title!!}', '{!!$singleWorkout->image!!}','{!!$singleWorkout->id!!}','{{$singleWorkout->set1}}','{{$singleWorkout->set2}}','{{$singleWorkout->set3}}',)">View</button> --}}
              </div>
              
            
            
            </div>
          @endforeach
          @else
          <h2 class="text-center text-danger"> No workout found for this category</h2>
          @endif
      </div>
    </div>
    
  </footer>

       
      

  
    <!-- Footer --> 
    
    <footer class="footer_contents" style="margin-top:5% ;font-family: roboto">
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
    <script src="/js/modal.js"></script>

</body>
  
</html>     