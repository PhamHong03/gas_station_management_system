@extends('admin.layouts.main')
@section('title', 'Danh sách Công Ty')
@section('content')

    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title"> Công Ty </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.companies.list') }}">Danh sách Công Ty</a></li>
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
                                            <th> Địa chỉ </th>
                                            <th> Số điện thoại </th>
                                            <th> Kinh độ </th>
                                            <th> Vĩ độ </th>
                                            <th> Địa chỉ </th>
                                            <th> Hành động </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($companies as $company)
                                            <tr>
                                                <td class="wrap-text"> {{ $company->name }} </td>
                                                <td class="wrap-text"> {{ $company->address }} </td>
                                                <td class="wrap-text"> {{ $company->phone }} </td>
                                                <td class="wrap-text"> {{ $company->longitude }} </td>
                                                <td class="wrap-text"> {{ $company->latitude }} </td>
                                                <td class="wrap-text"> {{ $company->address }} </td>

                                                <td>
                                                    <a href="{{ route('admin.companies.edit', ['id' => $company->id]) }}"
                                                        class="btn btn-primary">Sửa</a>
                                                    <a href="{{ route('admin.companies.delete', ['id' => $company->id]) }}"
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
