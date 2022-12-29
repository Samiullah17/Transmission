<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="index3.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li>
    </ul>

    <!-- SEARCH FORM -->
    {{-- <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form> --}}

    <!-- Right navbar links -->

    <ul class="navbar-nav mr-auto-navbav">
        <!-- Messages Dropdown Menu -->
        <!-- Notifications Dropdown Menu -->

        {{-- <li class="nav-item">
        <form method="POST" action="{{ route('logout') }}">
            @csrf

             <x-dropdown-link :href="route('logout')"
                    onclick="event.preventDefault();
                                this.closest('form').submit();">
                <button class="btn btn-sm btn-danger">خارج شدن</button>
            </x-dropdown-link>
        </form>
      </li> --}}
        {{-- <li class="nav-item">

        <form method="POST" action="{{ route('logout') }}">
          @csrf

          <x-dropdown-link :href="route('logout')"
                  onclick="event.preventDefault();
                              this.closest('form').submit();">
          <i class="bi bi-door-closed"></i>
          </x-dropdown-link>
      </form>

      </li> --}}


      <li class="nav-item dropdown user user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
          {{-- <img src="dist/img/user2-160x160.jpg" class="user-image img-circle elevation-2" alt="User Image"> --}}
          <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="user-image img-circle elevation-2" alt="User Image">

          <span class="hidden-xs">{{ Auth::user()->name }}</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <!-- User image -->
          <li class="user-header bg-primary">
          <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">

            <p>
                {{ auth::user()->name }}
               <small>Member since Nov. 2012</small>
            </p>
          </li>
          <!-- Menu Body -->
          <li class="user-body">
            <div class="row">
              <div class="col-4 text-center">
                <a href="#">Followers</a>
              </div>
              <div class="col-4 text-center">
                <a href="#">Sales</a>
              </div>
              <div class="col-4 text-center">
                <a href="#">Friends</a>
              </div>
            </div>
            <!-- /.row -->
          </li>
          <!-- Menu Footer-->
          <li class="user-footer">
            <div class="pull-left" style="float: left">
              <a href="{{ route('user.profile',Auth::user()->id) }}" class="btn btn-default btn-outline btn-flat">پروفایل</a>
            </div>
            <div class="pull-right" style="float: right">
              {{-- <a href="#" class="btn btn-default btn-outline btn-flat">وتل/خارج شدن</a> --}}
              <form method="POST" action="{{ route('logout') }}">
                @csrf

                 <x-dropdown-link :href="route('logout')"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    <button class="btn btn-sm btn-outline btn-default">وتل</button>
                </x-dropdown-link>
            </form>
            </div>
          </li>
        </ul>
      </li>

    </ul>
</nav>
