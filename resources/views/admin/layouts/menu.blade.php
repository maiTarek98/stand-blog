
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="{{Auth::guard('admin')->user()->name}}">
        </div>
        <div class="info">
          <a href="{{url('/admin/admins/'.Auth::guard('admin')->user()->id)}}" class="d-block">{{Auth::guard('admin')->user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{url('/admin/dashboard')}}" class="nav-link {{ (request()->is('admin/dashboard')) ? 'active' : '' }}">
              <i class="nav-icon fa fa-home"></i>
              <p>
                @lang('main.dashboard')
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('/admin/settings')}}" class="nav-link {{ (request()->is('admin/settings')) ? 'active' : '' }}">
              <i class="nav-icon fa fa-cog"></i>
              <p>
                @lang('main.setting')
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                @lang('main.all roles')
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/admin/roles/create')}}" class="nav-link {{ (request()->is('admin/roles/create')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>@lang('main.add')</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/admin/roles')}}" class="nav-link {{ (request()->is('admin/admin')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>@lang('main.show')</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                @lang('main.admins')
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/admin/admins/create')}}" class="nav-link {{ (request()->is('admin/admins/create')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>@lang('main.add')</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/admin/admins')}}" class="nav-link {{ (request()->is('admin/admin')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>@lang('main.show')</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                @lang('main.categorys')
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/admin/categorys/create')}}" class="nav-link {{ (request()->is('admin/categorys/create')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>@lang('main.add')</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/admin/categorys')}}" class="nav-link {{ (request()->is('admin/admin')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>@lang('main.show')</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                @lang('main.tags')
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/admin/tags/create')}}" class="nav-link {{ (request()->is('admin/tags/create')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>@lang('main.add')</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/admin/tags')}}" class="nav-link {{ (request()->is('admin/admin')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>@lang('main.show')</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                @lang('main.blogs')
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/admin/blogs/create')}}" class="nav-link {{ (request()->is('admin/blogs/create')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>@lang('main.add')</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/admin/blogs')}}" class="nav-link {{ (request()->is('admin/admin')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>@lang('main.show')</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                @lang('main.contacts')
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/admin/contacts')}}" class="nav-link {{ (request()->is('admin/admin')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>@lang('main.show')</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
