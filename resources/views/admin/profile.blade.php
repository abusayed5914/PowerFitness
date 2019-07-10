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


             <h3 class="panel-title text-center">Profle</h3>
              </div>
              <div class="panel-body">
                <form action="/storeprogram" method="POST" enctype="multipart/form-data">
                <div class="col-md-12">
                  <div class="W_name">
                    <label for="FormControl">Name</label>
                    <input type="text" name="name" class="form-control" value="{{Auth::user()->name}}" readonly="">
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="W_desc">
                <label for="FormControlTextarea1">Email</label>
             
                    <input type="email" name="email" class="form-control" value="{{Auth::user()->email}}" readonly="">
                  </div>
                </div>
              </div>
              </div>

          </div>
          </form>
        </div>
      </div>
    </section>

@include('include.footer')