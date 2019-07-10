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
    <link href="/css/admin.css" rel="stylesheet">
   <style>
     body{
        background:#f4f4f4;
    }
  </style>
  </head>
<style type="text/css">
  

.panel-body label{
  margin-top: 8px;

}
.W_img{margin-top: 10px;}




</style>

<style type="text/css">
  

.panel-body label{
  margin-top: 8px;

}
.W_img{margin-top: 10px;}




</style>
  <body>
      <nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header" style="background: transparent;">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/" style="background-color: #E74C3C;margin-top: 8px;">PowerFitness</a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <!-- <ul class="nav navbar-nav">
        <li class="active"><a href="index.html">Dashboard</a></li>
        <li><a href="pages.html">Pages</a></li>
        <li><a href="posts.html">Posts</a></li>
        <li><a href="users.html">Users</a></li>
      </ul> -->
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Welcome to Online Fitness</a></li>
        <li><a href="login.html">Logout</a></li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>  




    @include('admin.include.header')

  

  <section id="main">
    <div class="container">
     <div class="row">
       
        @include('admin.include.rightsidebar')
          <div class="col-md-9">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                
              @include('include.error')


             <h3 class="panel-title text-center">Update Videos</h3>
              </div>
              <div class="panel-body">
                <form action="/updatevideo" method="POST" enctype="multipart/form-data">
                <div class="col-md-12">
                  <div class="W_name">
                    <label for="FormControl">Title</label>
                    <input type="hidden" name="id" class="form-control" placeholder="Workout Name" value="{{ $workout->id }}">

                    <input type="text" name="title" class="form-control" placeholder="Workout Name" value="{{ old('name', $workout->title) }}">
                  </div>
                </div>




                <div class="col-md-12">
                  <div class="W_cat" >
                    <label for="FormControl">Select Catagory</label>
                    <select name="category" id="" class="form-control" placeholder="Select Catagory" > 
                      @foreach($videoCategories as $videoCategory)
                        <option value="{{$videoCategory->id}}" {{ ( $workout->video_category_id == $videoCategory->id ) ? 'selected' : '' }}>{{$videoCategory->video_category_name}}</option>
                      
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="W_img">
                    <video src="{{url('/file/'.$workout->video)}}" autobuffer autoloop loop controls poster="{{url('/file/'.$workout->video)}}" style="width: 100%;width: 300px; display: block;margin-left: auto;margin-right: auto;"></video>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="W_img">
               <label for="">Update Video</label>
                    <input type="file" name="video"  >
                  </div>
                </div>



              </div>
              </div>

              <!-- Latest Users -->
            
                <div class="Button">
                  <button class="btn btn-success" > Save </button>
                </div>
          </div>
          </form>
        </div>
      </div>
    </section>

    <footer id="footer">
      <p> &copy; Power Fitness,2019 By Abu Sayed</p>
    </footer>

    <!-- Modals -->

  <!-- Add Page -->
    <div class="modal fade" id="addPage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Page</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Page Title</label>
          <input type="text" class="form-control" placeholder="Page Title">
        </div>
        <div class="form-group">
          <label>Page Body</label>
          <textarea name="editor1" class="form-control" placeholder="Page Body"></textarea>
        </div>
        <div class="checkbox">
          <label>
            <input type="checkbox"> Published
          </label>
        </div>
        <div class="form-group">
          <label>Meta Tags</label>
          <input type="text" class="form-control" placeholder="Add Some Tags...">
        </div>
        <div class="form-group">
          <label>Meta Description</label>
          <input type="text" class="form-control" placeholder="Add Meta Description...">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </form>
    </div>
  </div>
</div>


  <script>
     CKEDITOR.replace( 'editor1' );
 </script>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
  </body>
</html>