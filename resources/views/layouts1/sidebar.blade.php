<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <span class="brand-text font-weight-light">د مخابره عمومی سیستم</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-2 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('dist/img/user2-160x160.jpg') }}" style="width:50px;height:50px"  class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info" style="width:50px;height:50px;">
          <a href="#" class="d-block">{{ auth()->user()->name }}</a>
        </div>
      </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            د موسساتو او شرکتونو ثبت
                            {{-- <i class="right fas fa-angle-left"></i> --}}
                        </p>
                    </a>
                    <ul class="nav nav-treeview">


                        <li class="nav-item">
                            <a href="{{ route('list.company') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>د موسسو/ شرکتونو لیست</p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="{{ route('list.transmission') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>د غوښتنو/آرډرونو لیست</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>

            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            راپورونه
                            {{-- <i class="right fas fa-angle-left"></i> --}}
                        </p>
                    </a>
                    <ul class="nav nav-treeview">


                        <li class="nav-item">
                            <a href="{{ route('list.company') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>د پروګرام شوو مخابرو راپور</p>
                            </a>
                        </li>
            </ul>
          </li>
        </ul>

        @can('Display User')

        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            د یوزرونو مدیریت
                            {{-- <i class="right fas fa-angle-left"></i> --}}
                        </p>
                    </a>
                    <ul class="nav nav-treeview">


                        <li class="nav-item">
                            <a href="{{ route('list.user') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>د یوزرونو لیست </p>
                            </a>
                        </li>



                        <li class="nav-item">
                            <a href="{{ route('list.user') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>د یوزرونو مالی حساب </p>
                            </a>
                        </li>



            </ul>
            @endcan
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
