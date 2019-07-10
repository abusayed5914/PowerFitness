@include('include.header')
<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=eoaur4z4jahdvhrmrh06lo6zrrod4iwrdy0acw7ddy6egdki"></script>
  <script>tinymce.init({ 
  selector:'textarea', 
});</script>
<style>
  .parsley-required{
    color: red;
  }
</style>
<style type="text/css">
  /* #protein-image{
    display: none;
  } */

.panel-body label{
  margin-top: 8px;

}
.W_img{margin-top: 10px;}
#show-day{
  display: block;
}
#hide-day{
  display: none;
}


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


             <h3 class="panel-title text-center">Add Nutration</h3>
              </div>
              <div class="panel-body">
                <form action="/storenutration" method="POST" enctype="multipart/form-data">
                <div class="col-md-12">
                  <div class="W_name">
                    <label for="FormControl">Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Nutration Title">
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="W_cat" >
                    <label for="FormControl">Select Catagory</label>
                    <select name="nutration_categorys_id" id="nutration-category" class="form-control" placeholder="Select Catagory">  
                      @foreach($NutrationCategory as $category)
                        <option value="{{$category->id}}" @if (old('nutration_categorys_id') == $category->id) selected="selected" @endif>{{$category->nutration_category_name}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                
                <div class="col-md-12" id="nutration-date" style="
                <?php 
                if(old('nutration_categorys_id') == '2')
                  {
                    echo "display: block";
                  }
                  else{
                    echo "display: none";
                  }
                  ?>">
                  <div class="W_cat" >
                    <label for="FormControl">Select Days</label>
                    <select name="foodplanDays" id="foodplan-days" class="form-control" placeholder="Select days"> 
                        <option value="regular"  @if (old('foodplanDays') == 'Regular') selected="selected" @endif>Regular</option>
                        <option value="7" @if (old('foodplanDays') == '7') selected="selected" @endif>7 Days</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-12" id="food-plan-content" style="
                <?php 
                if(old('foodplanDays') != '7')
                  {
                    echo "display: block";
                  }
                  else{
                    echo "display: none";
                  }
                  ?>">
                  <div class="W_cat" >
                    <label for="FormControl">Description</label>
                   <textarea name="nutration_description" id="" cols="30" rows="10">{{old('nutration_description')}}</textarea>
                  </div>
                </div>




              <!-- description section for 7 days workout -->
              <div id="seven-days-description"  style="
                <?php 
                if(old('foodplanDays') == '7')
                  {
                    echo "display: block";
                  }
                  else{
                    echo "display: none";
                  }
                  ?>">
                <div class="col-md-12">
                  <div class="W_cat" >
                    <label for="FormControl">Day 1</label>
                   <textarea name="nutration_description1" id="" cols="30" rows="10">
                     {{old('nutration_description1')}}
                   </textarea>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="W_cat" >
                    <label for="FormControl">Day 2</label>
                   <textarea name="nutration_description2" id="" cols="30" rows="10">
                     {{old('nutration_description2')}}
                   </textarea>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="W_cat" >
                    <label for="FormControl">Day 3</label>
                   <textarea name="nutration_description3" id="" cols="30" rows="10">
                     {{old('nutration_description3')}}
                   </textarea>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="W_cat" >
                    <label for="FormControl">Day 4</label>
                   <textarea name="nutration_description4" id="" cols="30" rows="10">
                     {{old('nutration_description4')}}
                   </textarea>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="W_cat" >
                    <label for="FormControl">Day 5</label>
                   <textarea name="nutration_description5" id="" cols="30" rows="10">
                     {{old('nutration_description5')}}
                   </textarea>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="W_cat" >
                    <label for="FormControl">Day 6</label>
                   <textarea name="nutration_description6" id="" cols="30" rows="10">
                     {{old('nutration_description6')}}
                   </textarea>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="W_cat" >
                    <label for="FormControl">Day 7</label>
                   <textarea name="nutration_description7" id="" cols="30" rows="10">
                     {{old('nutration_description7')}}
                   </textarea>
                  </div>
                </div>
              </div>


                <!-- image field for protein -->
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

@include('include.footer')
<script>
  
  $('#nutration-category').on('change', function() {
    var NutrationCategory = ( $(this).find(":selected").text() );
    if(NutrationCategory == 'Diet Plan'){
      $('#nutration-date').show();
    }
    else{
      $('#nutration-date').hide();
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
<!-- <script>
  $(document).ready(function(){
    $('#nutration-category').change(function(){
      var selectedNutration = $('#nutration-category').val();
      if(selectedNutration == 2){
        $('#protein-image').show();
      }
      else{
        $('#protein-image').hide();
      }

    });
  });
</script> -->