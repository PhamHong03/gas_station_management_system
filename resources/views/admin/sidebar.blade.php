<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="/admin" class="brand-link">
      <span class="brand-text font-weight-light">GAS STATION</span>
    </a>
    <div class="sidebar">      
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">       
        <div class="image">
          {{-- <img src="" class="img-circle elevation-2 " alt="User Image"> --}}
        </div>        
        <div class="info d-flex">
          @if (Auth::check())
              <a href="#" class="d-block">{{ Auth::user()->name }}</a>    
              {{-- <a href="{{ route('sign-out') }}" class="d-block " style="margin-left: 10px">
                <i class="right fas fa-angle-left"></i>
              </a> --}}
          @else
        
          @endif          
        </div>
      </div>
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Tìm kiếm" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
           <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fa-solid fa-gauge"></i>
              <p>
                 Quản lý chi nhánh
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm chi nhánh</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách chi nhánh</p>
                </a>
              </li>
            </ul>
          </li>        
        </ul>
      </nav>
    </div>
  </aside>