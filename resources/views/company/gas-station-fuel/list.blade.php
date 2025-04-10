@extends('company.layouts.main')
@section('title', 'Danh sách Nhiên Liệu của Cây Xăng {{ $gasStation->name }}')
@section('content')

    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title"> Nhiên Liệu của Cây Xăng {{ $gasStation->name }} </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a
                                href="{{ route('company.gas-station-fuel.list', ['id' => $gasStation->id]) }}">Danh
                                sách Nhiên Liệu
                                của Cây Xăng {{ $gasStation->name }}</a></li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Danh sách Nhiên Liệu của Cây Xăng {{ $gasStation->name }}</h4>
                            <div class="card-title">
                                <a href="{{ route('company.gas-station-fuel.create', ['id' => $gasStation->id]) }}"
                                    class="btn btn-primary">Thêm Nhiên Liệu cho cây xăng</a>
                                <br>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered wrap-text">
                                    <thead>
                                        <tr>
                                            <th> Tên Nhiên Liệu của Cây Xăng {{ $gasStation->name }} </th>
                                            <th> Hành động </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($gasStationFuels as $gasStationFuel)
                                            <tr>
                                                <td class="wrap-text"> {{ $gasStationFuel->fuelType->name }} </td>
                                                <td>
                                                    <a href="{{ route('company.gas-station-fuel.edit', ['id' => $gasStation->id, 'id2' => $gasStationFuel->id]) }}"
                                                        class="btn btn-primary">Sửa</a>
                                                    <a href="{{ route('company.gas-station-fuel.delete', ['id' => $gasStationFuel->id]) }}"
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
