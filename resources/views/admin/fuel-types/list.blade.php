@extends('admin.layouts.main')
@section('title', 'Danh sách Nhiên Liệu')
@section('content')

    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title"> Nhiên liệu </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.fuel-types.list') }}">Danh sách Nhiên Liệu</a>
                        </li>
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
                                            <th> Tên Nhiên Liệu </th>
                                            <th> Hành Động </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($fuelTypes as $fuelType)
                                            <tr>
                                                <td class="wrap-text"> {{ $fuelType->name }} </td>
                                                <td>
                                                    <a href="{{ route('admin.fuel-types.edit', ['id' => $fuelType->id]) }}"
                                                        class="btn btn-primary">Sửa</a>
                                                    <a href="{{ route('admin.fuel-types.delete', ['id' => $fuelType->id]) }}"
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
