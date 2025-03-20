@extends('admin.layouts.main')
@section('title', 'Danh sách User')
@section('content')

    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title"> User </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.users.list') }}">Danh sách User</a></li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Danh sách User</h4>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th> Họ và tên </th>
                                        <th> Email </th>
                                        <th> CCCD </th>
                                        <th> Mật khẩu </th>
                                        <th> Quyền </th>
                                        <th> Trạng thái </th>
                                        <th> Hành động </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td> {{ $user->name }} </td>
                                            <td> {{ $user->email }} </td>
                                            <td> {{ $user->cccd }} </td>
                                            <td> {{ $user->password }} </td>
                                            <td>
                                                @if ($user->role == 0)
                                                    User
                                                @elseif ($user->role == 1)
                                                    Admin
                                                @else
                                                    Company
                                                @endif
                                            </td>
                                            <td>
                                                @if ($user->status == 1)
                                                    Đang hoạt động
                                                @else
                                                    Đã khóa
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.users.edit', ['id' => $user->id]) }}"
                                                    class="btn btn-primary">Sửa</a>
                                                <a href="{{ route('admin.users.delete', ['id' => $user->id]) }}"
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

@endsection
