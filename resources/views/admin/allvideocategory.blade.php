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
                <h3 class="panel-title text-center">Video Category</h3>

              </div>

              
          </div>

          <div class="panel panel-default">
                <div class="panel-heading">
                </div>
                <div class="table-responsive panel-body">
                  <table class="table table-striped table-hover">
                      <tr>
                        <th>Title</th>
                        <th>Action</th>
                      </tr>
                      @foreach($allworkout as $workout)
                      <tr>
                        <td>{{$workout->video_category_name}}</td>
                        <td>
                          
                        <a href="editvideocategory/{{$workout->id}}" class="btn btn-success" style="margin-bottom:5px"><i class="fa fa-pen" style="color: ;font-size: 18px;"></i></a>
                        <form action="/deletevideocategory" method="POST">
                          <input type="hidden" name="workoutid" value="{{$workout->id}}">
                          <button class="btn btn-danger" onclick="if (!confirm('Are you sure wanted to delete this Video cateory?')) { return false }"><i class="fa fa-trash" style="color: ;font-size: 18px;"></i></button>
                        </form>

                        </td>
                        </tr>
                      @endforeach
                    </table>
                </div>
              </div>
              {{$allworkout->links()}}
        </div>
      </div>
    </section>

    <footer id="footer">
      <p>&copy; Power Fitness,2019 By Abu Sayed</p>
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
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
