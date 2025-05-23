@extends('admin.layouts.main')
@section('title', 'Sửa User')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title"> Thêm tài khoản </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.users.list') }}">Tài khoản</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Sửa tài khoản</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Sửa tài khoản</h4>
                            <form class="forms-sample" action="{{ route('admin.users.edit', ['id' => $user->id]) }}"
                                method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputName1">Họ Và Tên</label>
                                    <input type="text" class="form-control" id="exampleInputName1" name="name"
                                        placeholder="Họ Và Tên" value="{{ $user->name }}">
                                    @error('name')
                                        <div class="ms-5 text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Email</label>
                                    <input type="email" class="form-control" name="email" id="exampleInputEmail3"
                                        placeholder="Email" value="{{ $user->email }}">
                                    @error('email')
                                        <div class="ms-5 text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword4">Password</label>
                                    <input type="password" class="form-control" name="password"
                                        value="{{ $user->password }}" id="exampleInputPassword4" placeholder="Password">
                                    @error('password')
                                        <div class="ms-5 text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleSelectGender">Vai trò</label>
                                    <select class="form-select" name="role" id="exampleSelectGender">
                                        <option value="0" {{ $user->role == 0 ? 'selected' : '' }}>User</option>
                                        <option value="1" {{ $user->role == 1 ? 'selected' : '' }}>Admin</option>
                                        <option value="2" {{ $user->role == 1 ? 'selected' : '' }}>Company</option>
                                    </select>
                                    @error('role')
                                        <div class="ms-5 text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleSelectGender">Kích hoạt</label>
                                    <select class="form-select" name="active" id="exampleSelectGender">
                                        <option value="0" {{ $user->active == 0 ? 'selected' : '' }}>Không</option>
                                        <option value="1" {{ $user->active == 1 ? 'selected' : '' }}>Có</option>
                                    </select>
                                    @error('active')
                                        <div class="ms-5 text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputCity1">CCCD</label>
                                    <input type="text" class="form-control" name="CCCD" id="exampleInputCity1"
                                        placeholder="CCCD" value="{{ $user->CCCD }}">
                                    @error('CCCD')
                                        <div class="ms-5 text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-gradient-primary me-2">Tạo</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
