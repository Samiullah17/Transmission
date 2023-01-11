<aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Sidebar -->
                <div class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-rtl os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-transition">
                    <!-- Sidebar Menu -->
                    <div class="user-panel mt-3 pb-2 mb-3 d-flex">
                      <div class="image">
                        <img src="{{ asset('dist/img/user2-160x160.jpg') }}" style="width:50px;height:50px"  class="img-circle elevation-2" alt="User Image">
                      </div>
                      <div class="info" style="width:50px;height:50px;">
                        <a href="#" class="d-block">{{ auth()->user()->name }}</a>
                      </div>
                    </div>
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                            data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
                                            with font-awesome or any other icon font library -->
                            {{-- مدیریت  مخابره عمومی سیستم شروع --}}
                            <li class="nav-item has-treeview {{ strpos(Route::currentRouteName(), 'list') !== false && strpos(Route::currentRouteName(), 'lists') === false ? 'menu-open ' :''}} " > 
                                <a href="" class="nav-link {{ strpos(Route::currentRouteName(), 'list') !== false && strpos(Route::currentRouteName(), 'lists') === false ? 'active':''}}">
                                    <i class="nav-icon fas fa-tools"></i>
                                    <p>
                                    د مخابره عمومی سیستم
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        {{--  --}}
                                        <a href=" {{ route('list.company') }}"
                                            class="nav-link {{ Route::currentRouteName() == 'list.company' ? 'active' : '' }}">
                                            <i class="fas fa-clipboard-list fas fa-hummer nav-icon"></i>
                                            <p>د موسسو/ شرکتونو لیست</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        {{--  --}}
                                        <a href="{{ route('list.transmission') }}"
                                            class="nav-link {{ Route::currentRouteName() == 'list.transmission' ? 'active' : '' }}">
                                            <i class="fas fa-clipboard-list fas fa-hummer nav-icon"></i>
                                            <p> د غوښتنو/آرډرونو لیست </p>
                                        </a>
                                    </li>
                                    

                                </ul>
                            </li>
                            {{-- ختم مدیریت وسایط --}}


                            {{-- شروع مدیریت ورکشاب ها --}}
                            <li
                                class="nav-item has-treeview {{ strpos(Route::currentRouteName(), 'goodsDistribution') !== false || strpos(Route::currentRouteName(), 'order') !== false ? 'menu-open ' : '' }}">
                                <a href="#" class="nav-link  {{ strpos(Route::currentRouteName(), 'goodsDistribution') !== false ? 'active' : (strpos(Route::currentRouteName(), 'order') !== false ? 'active' : '') }}">
                                    <i class="nav-icon fad fa-gopuram "></i>
                                    <p>
                                        د راپورونو مدیریت
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        {{-- {{ route('workshop.create') }} --}}
                                        <a href="#"
                                            class="nav-link {{ Route::currentRouteName() == '
                                              #' ? 'active' : '' }}">
                                            <i class="fas fa-cart-plus"></i>
                                            <p>ٔراپور جووول</p>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                            {{-- ختم مدیریت ورکشاپ ها --}}

                            @can('Display User')  

                            {{-- شروع مدیریت راپور ها --}}
                            <li
                                class="nav-item has-treeview {{ strpos(Route::currentRouteName(), 'list.user') !== false  ? 'menu-open ' : '' }}">
                                <a href="#" class="nav-link  {{ strpos(Route::currentRouteName(), 'list.user') !== false ? 'active' :'' }}">
                                    <i class="nav-icon fad fa-gopuram "></i>
                                    <p>
                                        د یوزرونو مدیریت
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        {{-- {{ route('workshop.create') }} --}}
                                        <a href="{{route('list.user')}}"
                                            class="nav-link {{ Route::currentRouteName() == '
                                              list.user' ? 'active' : '' }}">
                                            <i class="fas fa-cart-plus"></i>
                                            <p>د یوزرونو لیست </p>
                                        </a>
                                    </li>

                                </ul>
                                @endcan
                            </li>
                            {{-- ختم مدیریت راپور ها --}}
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                    <div class="os-padding">
                    </div>
                </div>
                <!-- /.sidebar -->
            </aside>












<!-- <aside class="main-sidebar sidebar-dark-primary elevation-4"> -->
    <!-- Brand Logo -->
    <!-- <a href="index3.html" class="brand-link">
      <span class="brand-text font-weight-light">د مخابره عمومی سیستم</span>
    </a> -->

    <!-- Sidebar -->
    <!-- <div class="sidebar"> -->
      <!-- Sidebar user panel (optional) -->
      <!-- <div class="user-panel mt-3 pb-2 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('dist/img/user2-160x160.jpg') }}" style="width:50px;height:50px"  class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info" style="width:50px;height:50px;">
          <a href="#" class="d-block">{{ auth()->user()->name }}</a>
        </div>
      </div> -->

      <!-- Sidebar Menu -->
      <!-- <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false"> -->
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <!-- <li class="nav-item has-treeview">
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
        </ul> -->

        <!-- <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false"> -->
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <!-- <li class="nav-item has-treeview">
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
       
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false"> -->
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <!-- <li class="nav-item has-treeview">
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
                  <p>د  یوزرونو لیست  </p>
                </a>
              </li> -->



            <!-- </ul>
          </li>
        </ul>
        @endcan
      </nav> -->
      <!-- /.sidebar-menu -->
    <!-- </div> -->
    <!-- /.sidebar -->
  <!-- </aside> -->
