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


             <h3 class="panel-title text-center">Update Workout Category</h3>
              </div>
              <div class="panel-body">
                <form action="/updateworkoutcategory" method="POST" enctype="multipart/form-data">
                <div class="col-md-12">
                  <div class="W_name">
                    <label for="FormControl">Title</label>
                    <input type="hidden" name="id" class="form-control" placeholder="Workout Name" value="{{ $workout->id }}">

                    <input type="text" name="name" class="form-control" placeholder="Workout Name" value="{{ old('name', $workout->category) }}">
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