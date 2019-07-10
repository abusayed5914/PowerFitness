<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header" style="background: transparent;">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/" style="background-color: #E74C3C;margin-top: 8px;">PowerFitness</a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <!-- <ul class="nav navbar-nav">
        <li class="active"><a href="index.html">Dashboard</a></li>
        <li><a href="pages.html">Pages</a></li>
        <li><a href="posts.html">Posts</a></li>
        <li><a href="users.html">Users</a></li>
      </ul> -->
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Welcome to Online Fitness</a></li>
        <li>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>