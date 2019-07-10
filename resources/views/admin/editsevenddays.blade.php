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
  <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=eoaur4z4jahdvhrmrh06lo6zrrod4iwrdy0acw7ddy6egdki"></script>
  <script>tinymce.init({ 
  selector:'textarea', 
});</script>
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

#food-plan-content{
  display: none;
}


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

            
             <h3 class="panel-title text-center">Update 7 Day Diet Paln</h3>
              </div>
              <div class="panel-body">
                <form action="/updatenutration" method="POST" enctype="multipart/form-data">
                <div class="col-md-12">
                  <div class="W_name">
                    <label for="FormControl">Title</label>
                    <input type="hidden" name="id" class="form-control" placeholder="Workout Name" value="{{ $id }}">
                    <input type="text" name="title" class="form-control" placeholder="Workout Name" value="{{old('title',$nutration->title)}}">
                  </div>
                </div>
                @if($dietplan)
                <div class="col-md-12">
                  <div class="W_cat" >
                    <label for="FormControl">Select Catagory</label>
                    <select name="nuCategory" id="nutration-category" class="form-control" placeholder="Select Catagory">  
                      @foreach($NutrationCategory as $category)
                        <option value="{{$category->id}}" {{ ( $category->nutration_category_name == 'Diet Plan' ) ? 'selected' : '' }}>{{$category->nutration_category_name}}
                        </option>                      
                        @endforeach
                    </select>
                  </div>
                </div>  
                @else
                <div class="col-md-12">
                  <div class="W_cat" >
                    <label for="FormControl">Select Catagory</label>
                    <select name="nuCategory" id="nutration-category" class="form-control" placeholder="Select Catagory">  
                      @foreach($NutrationCategory as $category)
                        <option value="{{$category->id}}" {{ ( $nutration->nutration_categorys_id == $category->id ) ? 'selected' : '' }}>{{$category->nutration_category_name}}
                        </option>                      
                        @endforeach
                    </select>
                  </div>
                </div>
                @endif
                <div class="col-md-12" id="nutration-date" style="">
                  <div class="W_cat" >
                    <label for="FormControl">Select Days</label>
                    <select name="foodplanDays" id="foodplan-days" class="form-control" placeholder="Select days"> 
                        <option selected>Select</option>
                        <option value="regular">Regular</option>
                        <option value="7">7 Days</option>
                    </select>
                  </div>
                </div>
                
                <div class="col-md-12" id="food-plan-content" style="">
                  <div class="W_cat" >
                    <label for="FormControl">Description</label>
                   <textarea name="nutration_description" id="" cols="30" rows="10">{{old('nutration_description',$nutration->nutration_description)}}</textarea>
                  </div>
                </div>








              <!-- description section for 7 days workout -->
              <div id="seven-days-description">
                <div class="col-md-12">
                  <div class="W_cat" >
                    <label for="FormControl">1st day</label>
                   <textarea name="nutration_description1" id="" cols="30" rows="10">
                     {{old('nutration_description1',$nutration->first)}}
                   </textarea>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="W_cat" >
                    <label for="FormControl">2nd day</label>
                   <textarea name="nutration_description2" id="" cols="30" rows="10">
                     {{old('nutration_description2',$nutration->second)}}
                   </textarea>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="W_cat" >
                    <label for="FormControl">3rd day</label>
                   <textarea name="nutration_description3" id="" cols="30" rows="10">
                     {{old('nutration_description3',$nutration->third)}}
                   </textarea>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="W_cat" >
                    <label for="FormControl">4th day</label>
                   <textarea name="nutration_description4" id="" cols="30" rows="10">
                     {{old('nutration_description4',$nutration->fourth)}}
                   </textarea>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="W_cat" >
                    <label for="FormControl">5th day</label>
                   <textarea name="nutration_description5" id="" cols="30" rows="10">
                     {{old('nutration_description5',$nutration->fifth)}}
                   </textarea>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="W_cat" >
                    <label for="FormControl">6th day</label>
                   <textarea name="nutration_description6" id="" cols="30" rows="10">
                     {{old('nutration_description6',$nutration->sixth)}}
                   </textarea>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="W_cat" >
                    <label for="FormControl">7th day</label>
                   <textarea name="nutration_description7" id="" cols="30" rows="10">
                     {{old('nutration_description7',$nutration->seventh)}}
                   </textarea>
                  </div>
                </div>
              </div>
                <!-- image field for protein -->
                 <div class="col-md-12">
                  <div class="W_img">
                    <img src="{{url('/file/'.$nutration->image)}}" class="img-responsive" alt="" style="height: 200px;width: 300px; display: block;margin-left: auto;margin-right: auto;">
                  </div>
                </div>
                <div class="col-md-12 <?php echo (isset($proteinTrue) ? 'show-protein' : 'hide-protein')?>" id="protein-image">
                  <div class="W_img">
               <label for="">Image Upload</label>
                    <input type="file" name="proteinimage"  >
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


<!--   <script>
   CKEDITOR.replace( 'editor1' );
 </script> -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script>
  
  $('#nutration-category').on('change', function() {
    //var NutrationCategory = ( $(this).find(":selected").text() );
    var NutrationCategory = $('#nutration-category').val();
    
    console.log(NutrationCategory);
    //var t = 'Diet Plan'
    if(NutrationCategory == 2){
      //console.log('d');
      $('#nutration-date').show();
    }
    else{
      $('#nutration-date').hide();
      $('#seven-days-description').hide();
      $('#food-plan-content').show();
    }
  });


    $('#foodplan-days').on('change', function() {
    var NutrationDaysy = ( $(this).find(":selected").val() );
    if(NutrationDaysy == '7'){
      $('#seven-days-description').show();
      $('#food-plan-content').hide();
    }
    else{
      $('#seven-days-description').hide();
      $('#food-plan-content').show();
    }
  });


</script>
  </body>
</html>