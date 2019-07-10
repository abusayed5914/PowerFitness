@include('include.header')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
  <body>
 @include('admin.include.navbar')

   @include('admin.include.header')

 
    <section id="main">
      <div class="container">
        <div class="row">
          
        @include('admin.include.rightsidebar')
          <div class="col-md-9">
            @include('include.error')
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title text-center">All Messages</h3>

              </div>

              
          </div>

          <div class="panel panel-default">
                <div class="panel-heading">
                </div>
                <div class="panel-body">
                  <table class="table table-striped table-hover">
                      <tr>
                        <th>Title</th>
                        <th>Completed Day</th>
                        <th>Action</th>
                      </tr>
                      @if(count($startedPlan) > 0)
                      @foreach($startedPlan as $singlePlan)
                      <tr>
                        <td>{{$singlePlan->title}}</td>
                        <td>{{$singlePlan->completedday}}</video></td>
                        <td>
                          
                        <a href="sevenDays/{{$singlePlan->nutrationid}}">View</a>
                        </td>
                        </tr>
                      @endforeach
                      @endif
                    </table>
                </div>
              </div>
        </div>
      </div>
    </section>

    <footer id="footer">
      <p>&copy; Power Fitness,2019 By Abu Sayed</p>
    </footer>



  <script>
     CKEDITOR.replace( 'editor1' );
 </script>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
