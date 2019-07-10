
  <!-- Navbar -->

  <nav class="navbar navbar-default navbar-custom navbar-fixed-top" style="font-family: roboto"  >
    <div class="my_row row" >
    <div class="container">
        
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">         
        <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>                       
      </button>
      
      </div>
        
   <div class="collapse navbar-collapse navbar-right" id="myNavbar" style="margin-right:70px">
               <a href="/"><img src="/img/logo.jpg" alt="" style="height:70px;width:180px;float:left; margin-right:40px" ></a>      
                 
            <ul class="nav navbar-nav">
                <li><a href="/" class="{{ Request::is('/') ? "active" : ""}}">Home</a></li>          
                <li class="dropdown"> 
                <a href="#" class="dropdown-toggle {{ Request::is('workout') ? "active" : ""}}" data-toggle="dropdown" >Workout<span class="caret"></span></a>

                  <ul class="dropdown-menu">
                   @foreach($categories as $category)
                      <li><a href="{{ URL::route('workout', [$category->id]) }}">{{$category->category}}</a></li>
                  @endforeach
                  </ul>
                </li>
        
           <li class="dropdown"> 
             <a href="#" class="dropdown-toggle" data-toggle="dropdown" >Program<span class="caret"></span></a>
                <ul class="dropdown-menu">
                @foreach($programCategories as $category)
                      <li><a href="{{ URL::route('program', [$category->id]) }}">{{$category->program_category_name }}</a></li>
                  @endforeach
           </ul>
          </li>
        
         <li class="dropdown"> 
         
           <a href="#" class="dropdown-toggle" data-toggle="dropdown">Nutrition <span class="caret"></span></a>
            <ul class="dropdown-menu">
                @foreach($nutrationCategories as $nutrationCategory)
                      <li><a href="{{ URL::route('nutration', [$nutrationCategory->id]) }}">{{$nutrationCategory->nutration_category_name }}</a></li>
                @endforeach
           </ul>
        
        </li>
        
        <li class="dropdown"> 
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" >Video <span class="caret"></span></a>
            <ul class="dropdown-menu">
        
                @foreach($categoryCategories as $videoCategory)
                      <li><a href="{{ URL::route('video', [$videoCategory->id]) }}">{{$videoCategory->video_category_name}}</a></li>
                @endforeach
            </ul>
         </li>

                <li><a href="{{ URL::route('contactpage') }}"  class="{{ Request::is('contactpage') ? "active" : ""}}">Contact</a></li>
                @if(Auth::check())
                   <li class="dropdown"> 
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown" >{{Auth::user()->name}}<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            @if(Auth::user()->is_admin == 1)
                              <li><a href="/dashboard">Dashboard</a></li>
                            @endif
                              <li><a href="/profile">Profile</a></li>
                              <li><a href="/mynutrationplan">My Nutration Plan</a></li>
                              <li>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                  </ul>
              </li>
                @else
                  <li><a href="/login">Login</a></li>
                  <li><a href="/register">Register</a></li>
                @endif
            </ul>
            </div>
         </div>
        </div>
      </nav>