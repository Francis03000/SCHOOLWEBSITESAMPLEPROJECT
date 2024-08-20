<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top" style="background-color: maroon;">
  <div class="container-fluid">
    <div class="navbar-wrapper" style="color: maroon; text-decoration: underline; font-weight: 900;">
      <!-- <a class="navbar-brand" href="javascript:void(0)"
        style="color: maroon; text-decoration: underline; font-weight: 900;"> </a> -->
      ADMIN
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index"
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="sr-only">Toggle navigation</span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
    </button>

    <div class="offset-md-4 top-nav-search" style="color: black;">
      <a href=" javascript:void(0);" class="responsive-search">
        <!-- <i class="fa fa-search"></i> -->
      </a>
      <form action="search.html">
        <input class="form-control" id="filesearch" type="text" placeholder="Search here"
          style="border: 2px solid black; border-radius: 10px; width: 15rem;">
        <span class="btn btn-warning"><i class="fa fa-search"></i></span>
      </form>
    </div>


    <div class="collapse navbar-collapse justify-content-end">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link" href="javscript:void(0)" id="navbarDropdownMenuLink" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="material-icons" style="font-size: 36px; color: maroon;">manage_accounts</i>
          </a>

          <!-- <ul class="nav float-left">
            <li>
                <div class="top-nav-search">
                    <a href="javascript:void(0);" class="responsive-search">
                        <i class="fa fa-search"></i>
                    </a>
                    <form action="search.html">
                        <input class="form-control" id="filesearch" type="text" placeholder="Search here">
                        <span class="btn"><i class="fa fa-search"></i></span>
                    </form>
                </div>
            </li>
            
        </ul> -->
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="./profile.php">Profile</a>
            <a class="dropdown-item" href="logout.php">Logout</a>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>