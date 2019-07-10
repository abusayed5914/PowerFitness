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


             <h3 class="panel-title text-center">Add Nutration Category</h3>
              </div>
              <div class="panel-body">
                <form action="/storenutrationcategory" method="POST" enctype="multipart/form-data">
                <div class="col-md-12">
                  <div class="W_name">
                    <label for="FormControl">Title</label>
                    <input type="text" name="nutrationCategoryName" class="form-control" placeholder="Nutration Category Title">
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