@extends('admin.layouts.main')
@section('title', 'Danh sách Công Ty')
@section('content')

    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title"> Giá nhiên liệu </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.fuel-prices.list') }}">Danh sách Giá nhiên
                                liệu</a></li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Danh sách Công Ty</h4>
                            <div class="table-responsive">
                                <table class="table table-bordered wrap-text">
                                    <thead>
                                        <tr>
                                            <th> Tên công ty </th>
                                            <th> Loại Nhiên Liệu </th>
                                            <th> Giá </th>
                                            <th> Ngày Cập Nhật </th>
                                            <th> Hành Động </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($prices as $price)
                                            <tr>
                                                <td class="wrap-text"> {{ $price->company->name }} </td>
                                                <td class="wrap-text"> {{ $price->fuelType->name }} </td>
                                                <td class="wrap-text"> {{ $price->price }} </td>
                                                <td class="wrap-text"> {{ $price->start_date }} </td>
                                                <td>
                                                    <a href="{{ route('admin.fuel-prices.edit', ['id' => $price->id]) }}"
                                                        class="btn btn-primary">Sửa</a>
                                                    <a href="{{ route('admin.fuel-prices.delete', ['id' => $price->id]) }}"
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
