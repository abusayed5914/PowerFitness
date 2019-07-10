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
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=eoaur4z4jahdvhrmrh06lo6zrrod4iwrdy0acw7ddy6egdki"></script>
  <script>tinymce.init({ 
  selector:'textarea', 
});</script>
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


             <h3 class="panel-title text-center">Update Workout</h3>
              </div>
              <div class="panel-body">
                <form action="/updateworkout" method="POST" enctype="multipart/form-data">
                <div class="col-md-12">
                  <div class="W_name">
                    <label for="FormControl">Title</label>
                    <input type="hidden" name="id" class="form-control" placeholder="Workout Name" value="{{ $workout->id}}">

                    <input type="text" name="name" class="form-control" placeholder="Workout Name" value="{{ old('name', $workout->title) }}">
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="W_desc">
                <label for="FormControlTextarea1">Description</label>
               
            <textarea class="form-control"  name="details" id="FormControl" rows="3" placeholder="Workout Description" style="height: 20%"> {{ old('details', $workout->description) }}</textarea>
                  </div>
                </div>



                <div class="col-md-12">
                  <div class="W_cat" >
                    <label for="FormControl">Select Catagory</label>
                    <select name="category" id="" class="form-control" placeholder="Select Catagory" >  
                      @foreach($categories as $category)
                        <option value="{{$category->id}}" {{ ( $workout->category == $category->id ) ? 'selected' : '' }}>{{$category->category}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="W_img">
                    <img src="{{url('/file/'.$workout->image)}}" class="img-responsive" alt="" style="height: 200px;width: 300px; display: block;margin-left: auto;margin-right: auto;">
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="W_img">
               <label for="">Update Image</label>
                    <input type="file" name="image"  >
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="W_set">
                    <label for="FormControl">Set-1</label>
                    <input type="text" value="{{ old('set1', $workout->set1) }}" name="set1" class="form-control" placeholder="Set-1">
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="W_set">
                    <label for="FormControl">Set-2</label>
                    <input type="text" value="{{ old('set2', $workout->set2) }}" name="set2" class="form-control" placeholder="Set-2">
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="W_set">
                    <label for="FormControl">Set-3</label>
                    <input type="text" value="{{ old('set3', $workout->set3) }}" name="set3" class="form-control" placeholder="Set-3">
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