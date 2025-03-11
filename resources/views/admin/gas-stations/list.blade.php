@extends('admin.layouts.main')
@section('title', 'Danh sách Cây xăng')
@section('content')

    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title"> Cây xăng </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.gas-stations.list') }}">Danh sách Cây xăng</a>
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Danh sách Cây xăng</h4>
                            <div class="table-responsive">
                                <table class="table table-bordered wrap-text">
                                    <thead>
                                        <tr>
                                            <th> Tên Cây xăng </th>
                                            <th> Địa chỉ </th>
                                            <th> Số điện thoại </th>
                                            <th> Kinh độ </th>
                                            <th> Vĩ độ </th>
                                            <th> Địa chỉ </th>
                                            <th> Công ty Đầu mối </th>
                                            <th> Giờ hoạt động </th>
                                            <th> Ảnh </th>
                                            <th> Hành động </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($gasStations as $gasStation)
                                            <tr>
                                                <td class="wrap-text"> {{ $gasStation->name }} </td>
                                                <td class="wrap-text"> {{ $gasStation->address }} </td>
                                                <td class="wrap-text"> {{ $gasStation->phone }} </td>
                                                <td class="wrap-text"> {{ $gasStation->longitude }} </td>
                                                <td class="wrap-text"> {{ $gasStation->latitude }} </td>
                                                <td class="wrap-text"> {{ $gasStation->address }} </td>
                                                <td class="wrap-text"> {{ $gasStation->company->name }} </td>
                                                <td class="wrap-text"> {{ $gasStation->operation_time }} </td>
                                                <td class="wrap-text">
                                                    <img src="{{ asset('storage/' . $gasStation->image) }}"
                                                        alt="Hình ảnh trạm xăng" class="img-fluid rounded"
                                                        style="max-width: 200px; height: auto;">
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.gas-stations.edit', ['id' => $gasStation->id]) }}"
                                                        class="btn btn-primary">Sửa</a>
                                                    <a href="{{ route('admin.gas-stations.delete', ['id' => $gasStation->id]) }}"
                                                        class="btn btn-danger">Xóa</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .wrap-text {
            word-wrap: break-word;
            word-break: break-all;
        }

        .table-responsive {
            overflow-x: auto;
        }
    </style>
@endsection
