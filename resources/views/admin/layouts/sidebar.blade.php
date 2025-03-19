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
                                <a class="nav-link" href="{{ route('admin.users.create') }}">Thêm tài khoản</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.users.list') }}">Danh sách tài khoản</a>
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
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#ui-price" aria-expanded="false"
                        aria-controls="ui-price">
                        <span class="menu-title">Giá Nhiên Liệu ở Công ty</span>
                        <i class="menu-arrow"></i>
                        <i class="fa fa-fire"></i>
                    </a>
                    <div class="collapse" id="ui-price">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.fuel-prices.create') }}">Thêm Giá Nhiên Liệu ở
                                    Công ty</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.fuel-prices.list') }}">Danh sách Giá Nhiên
                                    Liệu
                                    ở Công ty</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#ui-gasStation" aria-expanded="false"
                        aria-controls="ui-gasStation">
                        <span class="menu-title">Cây xăng</span>
                        <i class="menu-arrow"></i>
                        <i class="fa fa-fire"></i>
                    </a>
                    <div class="collapse" id="ui-gasStation">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.gas-stations.create') }}">Thêm Cây xăng</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.gas-stations.list') }}">Danh sách Cây
                                    xăng</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- partial -->
