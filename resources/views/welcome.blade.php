<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

@include('include.userheader')

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
<body>
@include('include.usernav')      
              
    <!-- Header -->
        
        <div class="conainer">
            <br>
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
    
    <!-- Indicators -->
    
            <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
        </ol>

    <!-- Wrapper for slides -->
    
        <div class="carousel-inner" role="listbox">

        <div class="item active">
            <img src="img/bg15.jpg" alt="" >
        <div class="carousel-caption">
            <h2 style= "color:white">Workout</h2>
            <h3 style= "color:white">The atmosphere in Chania has a touch of Florence and Venice.</h3>
        </div>
      </div>

        <div class="item">
            <img src="img/ban2.jpg" alt="" >
        <div class="carousel-caption">
            <h2 style= "color:white">Program</h2>
            <h3 style= "color:white">The atmosphere in Chania has a touch of Florence and Venice.</h3>
        </div>
      </div>

        <div class="item">
            <img src="img/ban11.jpg" alt="" >
        <div class="carousel-caption">
            <h2 style= "color:white">Videos</h2>
            <h3 style= "color:white">The atmosphere in Chania has a touch of Florence and Venice.</h3>
        </div>
      </div>
   
    </div>

    <!-- Left and right controls -->
    
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
    

            
                        
    <!-- Workout -->

          <section class="workout" style="font-family: roboto">  
        <div class="section col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="row">
            
            <div class="container" >
                <h2>Workout</h2>
                <h3 style="font-size: 20px;">See the workout instructions and follow them to grow your fitness</h3>
            <div class="container-fluid">

                @if(count($allworkout) > 0)
                @foreach($allworkout as $singleWorkout)
                <a href="workout/{{$singleWorkout->category}}">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 hover">
                        <div class="thumbnail" style="height: 370px;">
                            <img src="{{url('/file/'.$singleWorkout->image)}}" class="img-responsive " alt="" style="height:250px;">
                            <div class="caption" style="margin-top:5px;">
                                <h4>{{$singleWorkout->title}}</h4>      
                                <p> {{ substr(strip_tags($singleWorkout->description),0,60) }}
                                {{ strlen(strip_tags($singleWorkout->description)) > 60 ? "..." : "" }}
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
                @endif
       
            </div> 
            </div>
       
        </div>
    </div>
</section>
    



    <!-- Program -->
            
        <section class="workout_program " style="font-family: roboto; background: white">
    
            <div class="main_div col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center" style="margin-top: 40px;font-family: roboto;">
                 <div class="row ">
              <div class="container"style="font-family: roboto;">
              
                    <h2>Special Program</h2>
                    <h3 style="font-size: 20px;margin-bottom: 40px;">See the workout instructions and follow them to grow your fitness</h3>
               
            
        <div class="container-fluid">
            @if(count($allprogram) > 0)
            @foreach($allprogram as $singleProgram)
            <a href="program/{{$singleProgram->category}}">
                <div class="my_icon  col-xs-12 col-sm-12 col-md-12 col-lg-4 hover">
                    <div class="thumbnail" style="height: 370px">
                    <img src="{{url('/file/'.$singleProgram->image)}}" class="img-responsive" alt="" style="text-align:center;height: 250px;"> 
                     <div class="caption" style="margin-top:5px;">
                    <h4>{{$singleProgram->title}}</h4>
                    <p>
                        {{ substr(strip_tags($singleProgram->description),0,60) }}
                        {{ strlen(strip_tags($singleProgram->description)) > 60 ? "..." : "" }}
                    </p>
                </div>
                    </div>
                </div>
            </a>
            @endforeach
            @endif
            </div>
             </div>
                </div>      
            </div>
    </section>
        
    
        
    <!-- Nutrition -->

         <section class="nutrition" style="font-family: roboto">   
        <div class="section col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="row">           
            <div class="container">
                <h2>Nutrition</h2>
                <h3 style="font-size: 20px;">See the workout instructions and follow them to grow your fitness</h3>
            <div class="container-fluid">
            
            @if(count($allnutration) > 0)
            @foreach($allnutration as $singleNutration)
            @if($singleNutration->is_seven == '1')
            <a href="/nutration/{{$singleNutration->nutration_categorys_id}}">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 hover">
                    <div class="thumbnail"style="height: 370px" >
                        <img src="{{url('/file/'.$singleNutration->nutration_image)}}" class="img-responsive" alt="" style="height: 250px">

                      <div class="caption" style="margin-top: 0px;">
                        <h4>{{$singleNutration->title}}</h4>      
                        <p> 
                            {{ substr(strip_tags($singleNutration->nutration_description),0,60) }}
                            {{ strlen(strip_tags($singleNutration->nutration_description)) > 60 ? "..." : "" }}
                        </p>
                    </div>
                </div>
                </div>
            </a>
            @else
            <a href="/nutration/{{$singleNutration->nutration_categorys_id}}">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 hover">
                    <div class="thumbnail"style="height: 380px">
                        <img src="{{url('/file/'.$singleNutration->nutration_image)}}" class="img-responsive" alt="" style="height: 250px">
                    <div class="caption" style="margin-top: 0px;">
                        <h4>{{$singleNutration->title}}</h4>      
                        <p> 
                            {{ substr(strip_tags($singleNutration->nutration_description),0,60) }}
                            {{ strlen(strip_tags($singleNutration->nutration_description)) > 60 ? "..." : "" }}
                        </p>
                    </div>
                </div>
            </div>
            </a>
            @endif
            @endforeach
            @endif
            </div> 
            </div>
            </div>
        </div>

    </section>
    
    
                

    <!-- Videos -->

            <section class="video" style="font-family: roboto"> 
                <div class="section col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="row">
                    
                    <div class="container">
                        <h2>Workout Videos</h2>
                        <h3 style="font-size: 20px;">See the workout instructions and follow them to grow your fitness</h3>
                    <div class="container-fluid" >

                    @if(count($allvideo) > 0)
                    @foreach($allvideo as $singleVideo)

                    <a href="video/{{$singleVideo->video_category_id}}">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 hover">
                        <div class="thumbnail" style="height: 350px">

                    <div class="embed-responsive embed-responsive-16by9" style="height: 340px;margin-top: -20px;">
                       

                        <video src="{{url('/file/'.$singleVideo->video)}}" poster="/img/logo.jpg" autobuffer autoloop loop controls poster="{{url('/file/'.$singleVideo->video)}}"></video>
                        </div>  

                        <div class="caption" style="margin-top:-40px;">
                             <h4>{{$singleVideo->title}}</h4>      
                        </div>
                    </div>
                 </div>
             </a>
                 @endforeach
                 @endif
            
                   </div> 
                  </div>
                    
                </div>
            </div>

       </section> 
      

          
    <!-- Contact Us -->
    
        <section class="contact" style="background:white">
            <div class="container"  style="font-family: roboto">
                <div class="row">
            <div class="contact col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                    <h2>Contact Us</h2>
                    <h3 style="font-size: 20px;">See the workout instructions and follow them to grow your fitness</h3>
                    @include('include.error')
                </div>
            
        
        <div class="my_contant col-xs-12 col-sm-12 col-md-12 col-lg-12">

          <form action="/sendMessage" method="POST" enctype="multipart/form-data">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="form-group-lg">
                    <input type="text" name="name" class="form-control" placeholder="Your Name" required="true">
                                
                </div>
            <div class="form-group-lg">
                <input type="email" name="email"  class="form-control" placeholder="Your Email" required="true">
                        
            </div>
            
            <div class="form-group-lg">
                <input type="text" name="subject"  class="form-control" placeholder="Message Subject" required="true">
                        
            </div>
            </div>
            
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <div class="form-group-lg">
                <textarea class="form-control" name="message"  required="true" placeholder="Your Message" style="height: 167px;"></textarea>
                        
            </div>
            </div>
                                
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
            <div id="success"></div>
                <button type="submit" class="btn1 btn-success btn-lg">Send Message</button>
            </div>
        </form>
            </div>
            </div>
        </div>
    </section>
    


    
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
        <script src="js/library.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
        
</body>
  
</html>         