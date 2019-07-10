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
                <h3 class="panel-title">Website Overview</h3>

              </div>
              <div class="panel-body">
                <div class="col-md-4">
                  <div class="well dash-box">
                    <h2><span class="glyphicon glyphicon-user" aria-hidden="true"></span> {{$totaluser}} </h2>
                    <h4>Users</h4>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="well dash-box">
                    <h2><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> {{$totalcontact}} </h2>
                    <h4>Message</h4>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="well dash-box">
                    <h2><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> {{$totaladmin}}</h2>
                    <h4>Admin</h4>
                  </div>
                </div>
              </div>
<div class="row">
    <div class="col-md-12">
<?php
 
$dataPoints = array(
    array("label"=> "Users", "y"=> $totaluser),
    array("label"=> "Messages", "y"=> $totalcontact),
    array("label"=> "Admin", "y"=> $totaladmin)
);
    
?>
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
    animationEnabled: true,
    exportEnabled: true,
    title:{
        text: "Statistics"
    },
   
    data: [{
        type: "pie",
        showInLegend: "true",
        legendText: "{label}",
        indexLabelFontSize: 16,
        indexLabel: "{label} - #percent%",
        yValueFormatString: "total: #,##0",
        dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
    }]
});
chart.render();
 
}
</script>
<div id="chartContainer" style="height: 370px; width: 100%;margin-bottom: 40px; margin-top: 40px;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    </div>
</div>              </div>

              
          </div>
        </div>
      </div>
    </section>

    <footer id="footer">
      <p>&copy; Power Fitness,2019 By Abu Sayed</p>
    </footer>



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
