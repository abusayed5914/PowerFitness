@include('include.header')

<style type="text/css">
  

.panel-body label{
  margin-top: 8px;

}
.W_img{margin-top: 10px;}




</style>


  <body>

    
    @include('admin.include.navbar')

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


             <h3 class="panel-title text-center">Add Videos</h3>
              </div>
              <div class="panel-body">
                <form action="/storevideo" method="POST" enctype="multipart/form-data">
                <div class="col-md-12">
                  <div class="W_name">
                    <label for="FormControl">Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Video Title">
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="W_cat" >
                    <label for="FormControl">Select Catagory</label>
                    <select name="video_category_id" id="" class="form-control" placeholder="Select Catagory" >  
                      @foreach($videoCategory as $category)
                        <option value="{{$category->id}}">{{$category->video_category_name}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="W_img">
               <label for="">Video Upload</label>
                    <input type="file" name="video" >
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

@include('include.footer')