<aside class="main-sidebar sidebar-dark-primary elevation-4">
    
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name ?? '' }}</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Starter Pages
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                {{-- <a href="{{ route('categories.index') }}" class="nav-link {{ (request->is('categories.index') ? 'active' : '') }}"> --}}
                <a href="{{ route('categories.index') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Category</p>
                </a>
                <a href="{{ route('brands.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Brand</p>
                </a>
                <a href="{{ route('sizes.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Size</p>
                </a>
                <a href="{{ route('products.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product</p>
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