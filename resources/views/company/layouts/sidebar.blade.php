<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('company.index') }}">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
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
                        <a class="nav-link" href="{{ route('company.fuel-prices.create') }}">Thêm
                            Giá Nhiên Liệu ở
                            Công ty</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('company.fuel-prices.list') }}">Danh
                            sách Giá
                            Nhiên
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
                        <a class="nav-link" href="{{ route('company.gas-stations.create') }}">Thêm
                            Cây
                            xăng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('company.gas-stations.list') }}">Danh
                            sách
                            Cây
                            xăng</a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</nav>
<!-- partial -->
