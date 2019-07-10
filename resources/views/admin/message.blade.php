@include('include.header')
<style>
.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    padding: 3px;</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
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
                <div class="table-responsive panel-body">
                  <table class="table table-striped table-hover">
                      <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Action</th>
                      </tr>
                      @foreach($messages as $message)
                      <tr>
                        <td>{{$message->name}}</td>
                        <td>{{$message->email}}</td>
                        <td>{{$message->subject}}</td>
                        <td>
                          {{$message->message}}
                          <div id="{!!$message->id!!}" class="black" style="display: none;">
                  <?php echo htmlentities($message->message, ENT_QUOTES)?>
                </div>
                        </td>
                        <td style="text-align: center;">
                          <button class="btn btn-success" data-toggle="modal" data-target="#myModal" id="view-message" onclick="sendMessageData('{!!$message->id!!}','{!!$message->subject!!}')" style="margin-bottom: 5px;"><i class="fa fa-eye" style="font-size: 18px;"></i></button>
                          <form action="deletemessage" method="POST">
                            <input name="messageId" type="hidden" value="{{$message->id}}">
                            <button class="btn btn-danger" onclick="if (!confirm('Are you sure wanted to delete this message?')) { return false }"><i class="fa fa-trash" style="font-size: 18px;"></i></button>
                          </form>

                        </td>
                        </tr>
                      @endforeach
                    </table>
                </div>
              </div>
        </div>
      </div>
      <div>
    </section>

    <footer id="footer">
      <p>&copy; Power Fitness,2019 By Abu Sayed</p>
    </footer>

    

    <!-- Modals -->


<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center" title="" id="subject"></h4>
      </div>
      <div class="modal-body">
        <p id="message"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
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
    <script>
      function sendMessageData(id, subject) {
        console.log(id);
        var descriptionId = id;
        var description = $('#'+descriptionId+'').text();
          $('#subject').html('Subject : ' +subject);
          $('#message').html(description);
      }
    </script>
  </body>
</html>
