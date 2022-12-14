<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">د مخابره عمومی سیستم</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Samiullah Jahani</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
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
              @role('admin')
              <li class="nav-item">
                <a href="{{ route('add.company') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>د موسسی /شرکت ثبت</p>
                </a>
              </li>
              @endrole

              <li class="nav-item">
                <a href="{{ route('list.company') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>د موسسو/ شرکتونو لیست</p>
                </a>
              </li>
            </ul>
          </li>








          <li class="nav-item has-treeview">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                د مخابرو برخه
                 {{-- <i class="right fas fa-angle-left"></i> --}}
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('add.transmittion') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>د نوو مخابرو ثبت </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('list.transmission') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>د موجوده مخابرو لیست</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('programe.transmission') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>د مخابرو د پروګرام برخه</p>
                </a>
              </li>
            </ul>
          </li>







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
               
                <a href=" {{ route('role.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>د نوو رول ثبت </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('permission.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>د موجوده  صلاحیتونو کتل</p>
                </a>
              </li>
            </ul>
          </li>




          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Simple Link
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
