        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin') }}">
                        <span class="menu-title">Dashboard</span>
                        <i class="mdi mdi-home menu-icon"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                        aria-controls="ui-basic">
                        <span class="menu-title">User</span>
                        <i class="menu-arrow"></i>
                        <i class="fa fa-user-circle"></i>
                    </a>
                    <div class="collapse" id="ui-basic">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.users.create') }}">Thêm User</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.users.list') }}">Danh sách User</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#ui-company" aria-expanded="false"
                        aria-controls="ui-company">
                        <span class="menu-title">Công ty Đầu mối</span>
                        <i class="menu-arrow"></i>
                        <i class="fa fa-building-o"></i>
                    </a>
                    <div class="collapse" id="ui-company">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.companies.create') }}">Thêm Công ty</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.companies.list') }}">Danh sách Công Ty</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#ui-fuel" aria-expanded="false"
                        aria-controls="ui-fuel">
                        <span class="menu-title">Nhiên liệu</span>
                        <i class="menu-arrow"></i>
                        <i class="fa fa-fire"></i>
                    </a>
                    <div class="collapse" id="ui-fuel">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.fuel-types.create') }}">Thêm Nhiên liệu</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.fuel-types.list') }}">Danh sách Nhiên liệu</a>
                            </li>
                        </ul>
                    </div>
                </li>

            </ul>

        </nav>
        <!-- partial -->
