@include('include.header')
<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=eoaur4z4jahdvhrmrh06lo6zrrod4iwrdy0acw7ddy6egdki"></script>
  <script>tinymce.init({ 
  selector:'textarea', 
});</script>
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


             <h3 class="panel-title text-center">Add Workout</h3>
              </div>
              <div class="panel-body">
                <form action="/storeworkout" method="POST" enctype="multipart/form-data">
                <div class="col-md-12">
                  <div class="W_name">
                    <label for="FormControl">Title</label>
                    <input type="text" name="name" class="form-control" placeholder="Workout Title">
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="W_desc">
                <label for="FormControlTextarea1">Description</label>
               
            <textarea class="form-control"  name="details" id="FormControl" rows="3" placeholder="Description"></textarea>
                  </div>
                </div>



                <div class="col-md-12">
                  <div class="W_cat" >
                    <label for="FormControl">Select Catagory</label>
                    <select name="category" id="" class="form-control" placeholder="Select Catagory" >  
                      @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->category}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="W_img">
                    <label for="">Image Upload</label>
                    <input type="file" name="image">
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="W_set">
                    <label for="FormControl">Set-1</label>
                    <input type="text" name="set1" class="form-control" placeholder="Set-1">
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="W_set">
                    <label for="FormControl">Set-2</label>
                    <input type="text" name="set2" class="form-control" placeholder="Set-2">
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="W_set">
                    <label for="FormControl">Set-3</label>
                    <input type="text" name="set3" class="form-control" placeholder="Set-3">
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