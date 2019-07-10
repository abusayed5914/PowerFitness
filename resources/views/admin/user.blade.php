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
                <h3 class="panel-title text-center">Users</h3>

              </div>

              
          </div>

          <div class="panel panel-default">
                <div class="panel-heading">
                </div>
                <div class="table-responsive panel-body">
                  <table class="table table-striped table-hover">
                      <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                      </tr>
                      @foreach($users as $user)
                      <tr>
                        <td>{{$user->name}}</td>
                        <td>
                          {{$user->email}}
                        </td>
                        <td>
                          @if(Auth::user()->id != $user->id)
                          <form action="/deleteuser/" method="POST">
                            <input type="hidden" name="userId" value="{{$user->id}}">
                            <button class="btn btn-danger" onclick="if (!confirm('Are you sure wanted to delete this user?')) { return false }"><i class="fa fa-trash" style="color: ;font-size: 18px;"></i></button>
                          </form>
                          @endif

                        </td>
                        </tr>
                      @endforeach
                    </table>
                </div>
              </div>
        </div>
      </div>
    </section>

    <footer id="footer">
      <p>&copy; Power Fitness,2019 By Abu Sayed</p>
    </footer>

    <!-- Modals -->

   

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
