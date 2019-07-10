 <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-10">  

            <ul class="nav navbar-nav navbar-right">
          </ul>

          </div>
          <div class="col-md-2"> 
          @if(Auth::check() && (Auth::user()->is_admin == 1))
            <div class="dropdown create">
              <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Upload Content
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <!-- <li><a type="button" data-toggle="modal" data-target="#addPage">Add Page</a></li> -->
                <li><a href="/addworkout">Add Workout</a></li>
                <li><a href="/addvideo">Add Video</a></li>
                <li><a href="/addnutration">Add Nutrition</a></li>
                <li><a href="/addprogram">Add Program</a></li>
                <li><a href="/addnutrationcategory">Add Nutrition Category</a></li>
                <li><a href="/addprogramcategory">Add Program Category</a></li>
                <li><a href="/addworkoutcategory">Add Workout Category</a></li>
                <li><a href="/addVideocategory">Add Video Category</a></li>
              </ul>
            </div>
            @endif
          </div>
        </div>
      </div>
    </header>