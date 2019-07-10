
<div class="col-md-3">
   <div class="list-group">
    <a href="/dashboard" class="list-group-item active main-color-bg">
     <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard : Edit & Delete
      </a>
      @if(Auth::check() && (Auth::user()->is_admin == 1))
     <a href="/messages" class="list-group-item">
       <span class="" aria-hidden="true"></span>Message 
      </a>
       <a href="/allworkout" class="list-group-item">
        <span class="" aria-hidden="true"></span>Workout 
       </a>
     <a href="/allprogram" class="list-group-item">
      <span class="" aria-hidden="true"></span>Program 
        </a>
         <a href="/allnutration" class="list-group-item">
      <span class="" aria-hidden="true"></span>Nutrition 
        </a>
         <a href="/allvideo" class="list-group-item">
      <span class="" aria-hidden="true"></span>Videos 
        </a>
        <a href="/allworkoutcategory" class="list-group-item">
        <span class="" aria-hidden="true"></span>Workout Category
       </a>
     <a href="/allprogramcategory" class="list-group-item">
      <span class="" aria-hidden="true"></span>Program Category
        </a>
         <a href="/allnutrationcategory" class="list-group-item">
      <span class="" aria-hidden="true"></span>Nutrition Category
        </a>
         <a href="/allvideocategory" class="list-group-item">
      <span class="" aria-hidden="true"></span>Videos Category
        </a>
         <a href="/users" class="list-group-item">
      <span class="" aria-hidden="true"></span>All User
        </a>
@endif
  </div>
</div>
