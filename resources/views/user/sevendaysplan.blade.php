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
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.12.4.js"></script>
  <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

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

   body{


}

</style>

  </head>
 <body>

  <!-- Navbar -->

   @include('user.include.menubar')
      @include('user.include.nutration-modal')
    
      <!-- Footer --> 
    
    <footer class="footer_content " style="margin-top: 80px;background-color: white;">
      <div class="container-fluid">
        @if(count($sevendaysplan) > 0) 
        <div class="row">
          <div class="text-center">
            <h2 style="color: black">{{$sevendaysplan->title}}</h2>
          </div>
           <!--  <div class="text-center" style="width: 30%;float: left;margin:10px">
             <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 thumbnail">
             
             </div>
             
           </div> -->
          </div>
          @if(Auth::check() && (empty($isStarted)))
          <div class="row">
            <div class="text-center">
              @include('include.error')
              <form action="/storeStartNutration" method="POST">
                <input type="hidden" name="nutrationId" value="{{$sevendaysplan->nutration_id}}">
                  <input type="hidden" name="userId" value="{{Auth::user()->id}}">
                <button class="btn btn-success">Start this plan</button>
              </form>
            </div>
          </div>
          @endif
          @if(!empty($isStarted))




          <div class="text-center">
             @if($isStarted->completedday <= 0)
<form action="/addDay" method="POST">
<input type="hidden" name="nutrationId" value="{{$sevendaysplan->nutration_id}}">
  <input type="hidden" name="userId" value="{{Auth::user()->id}}">
  <input type="hidden" name="day" value="1">
<button class="btn btn-success">Complete day one</button>
</form>
@endif



             @if($isStarted->completedday == 1)
<form action="/addDay" method="POST">
<input type="hidden" name="nutrationId" value="{{$sevendaysplan->nutration_id}}">
  <input type="hidden" name="userId" value="{{Auth::user()->id}}">
  <input type="hidden" name="day" value="2">
<button class="btn btn-success">Complete day two</button>
</form>

@endif

             @if($isStarted->completedday == 2)

<form action="/addDay" method="POST">
<input type="hidden" name="nutrationId" value="{{$sevendaysplan->nutration_id}}">
  <input type="hidden" name="userId" value="{{Auth::user()->id}}">
  <input type="hidden" name="day" value="3">
<button class="btn btn-success">Complete day three</button>
</form>
@endif

             @if($isStarted->completedday == 3)


<form action="/addDay" method="POST">
<input type="hidden" name="nutrationId" value="{{$sevendaysplan->nutration_id}}">
  <input type="hidden" name="userId" value="{{Auth::user()->id}}">
  <input type="hidden" name="day" value="4">
<button class="btn btn-success">Complete day four</button>
</form>
@endif


             @if($isStarted->completedday == 4)

<form action="/addDay" method="POST">
<input type="hidden" name="nutrationId" value="{{$sevendaysplan->nutration_id}}">
  <input type="hidden" name="userId" value="{{Auth::user()->id}}">
  <input type="hidden" name="day" value="5">
<button class="btn btn-success">Complete day five</button>
</form>
@endif


             @if($isStarted->completedday == 5)

<form action="/addDay" method="POST">
<input type="hidden" name="nutrationId" value="{{$sevendaysplan->nutration_id}}">
  <input type="hidden" name="userId" value="{{Auth::user()->id}}">
  <input type="hidden" name="day" value="6">
<button class="btn btn-success">Complete day six</button>
</form>
@endif



             @if($isStarted->completedday == 6)
<form action="/addDay" method="POST">
<input type="hidden" name="nutrationId" value="{{$sevendaysplan->nutration_id}}">
  <input type="hidden" name="userId" value="{{Auth::user()->id}}">
  <input type="hidden" name="day" value="7">
<button class="btn btn-success">Complete day seven</button>
</form>
@endif
</div>




          <div class="row">
            <div class="text-center">
              <a href="{{'/cancelNutration/'.$sevendaysplan->nutration_id}}">Cancel</a>
              @if($isStarted->completedday <= 0)

             <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">0%</div>
             </div>

                {{-- <div class="w3-grey" style="height:24px;width:5%;background-color: red"></div> --}}

              @elseif($isStarted->completedday >= 0 && ($isStarted->completedday <= 1))
                <div class="progress">
                  <div class="progress-bar" role="progressbar" style="width: 14.28%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">14.28%</div>
                </div>

              @elseif($isStarted->completedday >= 1 && ($isStarted->completedday <= 2))
                <div class="progress">
                  <div class="progress-bar" role="progressbar" style="width: 28.56%;" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">28.56%</div>
                </div>

              @elseif($isStarted->completedday >= 2 && ($isStarted->completedday <= 3))

                <div class="progress">
                  <div class="progress-bar" role="progressbar" style="width: 42.84%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">42.84%</div>
                </div>

              @elseif($isStarted->completedday >= 3 && ($isStarted->completedday <= 4))
                <div class="progress">
                  <div class="progress-bar" role="progressbar" style="width: 57.12%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">57.12%</div>
                </div>

              @elseif($isStarted->completedday >= 4 && ($isStarted->completedday <= 5))
                <div class="progress">
                  <div class="progress-bar" role="progressbar" style="width: 71.4%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">71.4%</div>
                </div>

              @elseif($isStarted->completedday >= 4 && ($isStarted->completedday <= 6))

                <div class="progress">
                  <div class="progress-bar" role="progressbar" style="width: 85.680%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">85.68%</div>
                </div>

              @else
              <div class="progress">
                  <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
                </div>





              @endif
            </div>
          </div>
          @endif
          @if(Auth::check())
          <div class="row">
            <div class="sevendays-content" style="margin-top: 30px;">
              <div id="tabs">
                <ul>
                  <li><a href="#day-1"><span>Day One</span></a></li>
                  @if((!empty($isStarted)) && ($isStarted->completedday > 0))
                  <li><a href="#day-2"><span>Day Two</span></a></li>
                  @else
                  <li>
                    <a style="pointer-events: none; cursor: none;" href="#day-2">Day Two</a>
                  </li>
                  @endif


                  @if((!empty($isStarted)) && ($isStarted->completedday > 1))
                  <li><a href="#day-3"><span>Day Three</span></a></li>
                  @else
                  <li>
                    <a style="pointer-events: none; cursor: default;" href="#day-3">Day Three</a>
                  </li>
                  @endif

                  @if((!empty($isStarted)) && ($isStarted->completedday > 2))
                  <li><a href="#day-4"><span>Day Four</span></a></li>
                  @else
                  <li>
                    <a style="pointer-events: none; cursor: default;" href="#day-4">Day Four</a>
                  </li>
                  @endif

                  @if((!empty($isStarted)) && ($isStarted->completedday > 3))
                  <li><a href="#day-5"><span>Day Five</span></a></li>
                  @else
                  <li>
                    <a style="pointer-events: none; cursor: default;" href="#day-5">Day Five</a>
                  </li>
                  @endif

                  @if((!empty($isStarted)) && ($isStarted->completedday > 4))
                  <li><a href="#day-6"><span>Day Six</span></a></li>
                  @else
                  <li>
                    <a style="pointer-events: none; cursor: default;" href="#day-6">Day Six</a>
                  </li>
                  @endif

                  @if((!empty($isStarted)) && ($isStarted->completedday > 5))
                  <li><a href="#day-7"><span>Day Seven</span></a></li>
                  @else 
                  <li>
                    <a style="pointer-events: none; cursor: default;" href="#day-7">Day Seven</a>
                  </li>
                  @endif
                </ul>
                <div id="day-1">
                  <p class="<?php if((!empty($isStarted)) && ($isStarted->completedday > 0)){echo "grey-text";}?>">
                    @if((!empty($isStarted)) && ($isStarted->completedday > 0))
                    {!!$sevendaysplan->first!!}
                    @else
                    {!!$sevendaysplan->first!!}
                    @endif
                  </p>                
                </div>
                <div id="day-2">
                  <p class="<?php if((!empty($isStarted)) && ($isStarted->completedday > 1)){echo "grey-text";}?>">
                    @if(!empty($isStarted))
                      @if($isStarted->completedday > 0)
                      {!!$sevendaysplan->second!!}
                      @else

                      @endif
                    @else
                    {!!$sevendaysplan->second!!}
                    @endif
                    </p>
                </div>
                <div id="day-3">
                  <p class="<?php if((!empty($isStarted)) && ($isStarted->completedday > 2)){echo "grey-text";}?>">
                    @if(!empty($isStarted))
                      @if($isStarted->completedday > 1)
                      {!!$sevendaysplan->third!!}
                      @else

                      @endif
                    @else
                    {!!$sevendaysplan->third!!}
                    @endif
                  </p>                
                </div>
                <div id="day-4">
                  <p class="<?php if((!empty($isStarted)) && ($isStarted->completedday > 3)){echo "grey-text";}?>">
                    @if(!empty($isStarted))
                      @if($isStarted->completedday > 2)
                      {!!$sevendaysplan->fourth!!}
                      @else

                      @endif
                    @else
                    {!!$sevendaysplan->fourth!!}
                    @endif
                    </p>
                </div>
                <div id="day-5">
                  <p class="<?php if((!empty($isStarted)) && ($isStarted->completedday > 4)){echo "grey-text";}?>">
                    @if(!empty($isStarted))
                      @if($isStarted->completedday > 3)
                      {!!$sevendaysplan->fifth!!}
                      @else

                      @endif
                    @else
                    {!!$sevendaysplan->fifth!!}
                    @endif
                  </p>                
                </div>
                <div id="day-6">
                  <p class="<?php if((!empty($isStarted)) && ($isStarted->completedday > 5)){echo "grey-text";}?>">
                    @if(!empty($isStarted))
                      @if($isStarted->completedday > 4)
                      {!!$sevendaysplan->sixth!!}
                      @else

                      @endif
                    @else
                    {!!$sevendaysplan->sixth!!}
                    @endif
                  </p>                
                </div>
                <div id="day-7">
                  <p class="<?php if((!empty($isStarted)) && ($isStarted->completedday > 6)){echo "grey-text";}?>">
                    @if(!empty($isStarted))
                      @if($isStarted->completedday > 5)
                      {!!$sevendaysplan->seventh!!}
                      @else

                      @endif
                    @else
                    {!!$sevendaysplan->seventh!!}
                    @endif
                  </p>
                </div>
              </div>
               
              <script>
                @if((empty($isStarted)) || ($isStarted->completedday == 0))
                  $( "#tabs" ).tabs($( "#tabs" ).tabs({ active: 0 }));
                  @elseif((!empty($isStarted)) && ($isStarted->completedday == 1))
                  $( "#tabs" ).tabs($( "#tabs" ).tabs({ active: 1 }));
                  @elseif((!empty($isStarted)) && ($isStarted->completedday == 2))
                  $( "#tabs" ).tabs($( "#tabs" ).tabs({ active: 2 }));
                  @elseif((!empty($isStarted)) && ($isStarted->completedday == 3))
                  $( "#tabs" ).tabs($( "#tabs" ).tabs({ active: 3 }));
                  @elseif((!empty($isStarted)) && ($isStarted->completedday == 4))
                  $( "#tabs" ).tabs($( "#tabs" ).tabs({ active: 4 }));
                  @elseif((!empty($isStarted)) && ($isStarted->completedday == 5))
                  $( "#tabs" ).tabs($( "#tabs" ).tabs({ active: 5 }));
                  @else
                  $( "#tabs" ).tabs($( "#tabs" ).tabs({ active: 6 }));
                  @endif
              </script>
            </div>
          </div>
          @else
            <h3 class="text-center text-danger" style="margin-bottom: 100px;margin-top: 50px;">Only for registered user.</h3>
          @endif
        @else
        <h2 class="text-center text-danger" >No nutration found for this category</h2>
        @endif
    </div>
    
  </footer>
      
 
       
  </section>
      

  
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
    <script src="/js/nutration-modal.js"></script>
    
</body>
  
</html>     