@extends('admin.layouts.main')
@section('title', 'Sửa Công Ty quản lý')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title"> Sửa Công Ty quản lý</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.companies.list') }}">Công Ty quản lý</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Sửa Công Ty quản lý</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Sửa Công Ty quản lý</h4>
                            <form class="forms-sample" action="" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputName1">Họ Và Tên</label>
                                    <input type="text" class="form-control" id="exampleInputName1" name="name"
                                        placeholder="Họ Và Tên" value="{{ $company->name }}">
                                    @error('name')
                                        <div class="ms-5 text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Số điện thoại</label>
                                    <input type="text" class="form-control" name="phone" id="exampleInputName1"
                                        placeholder="phone" value="{{ $company->phone }}">
                                    @error('phone')
                                        <div class="ms-5 text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputName1">Kinh độ</label>
                                    <input type="text" class="form-control" name="longitude" id="exampleInputName1"
                                        placeholder="Kinh độ" value="{{ $company->longitude }}">
                                    @error('longitude')
                                        <div class="ms-5 text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Vỹ độ</label>
                                    <input type="text" class="form-control" name="latitude" id="exampleInputName1"
                                        placeholder="latitude" value="{{ $company->latitude }}">
                                    @error('latitude')
                                        <div class="ms-5 text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="citySelect">Tỉnh/Thành Phố</label>
                                    <select class="form-select" id="citySelect">
                                        <option value="">{{ $citi->name }}</option>
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="districtSelect">Quận/Huyện</label>
                                    <select class="form-select" id="districtSelect">
                                        <option value="">{{ $districts->name }}</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="wardSelect">Xã/Phường</label>
                                    <select name="WardId" class="form-select" id="wardSelect">
                                        <option value="{{ $ward->id }}">{{ $ward->name }}</option>
                                    </select>
                                    @error('ward')
                                        <div class="ms-5 text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Địa chỉ chi tiết</label>
                                    <input type="text" class="form-control" name="address" id="exampleInputName1"
                                        placeholder="address" value="{{ $company->address }}">
                                    @error('address')
                                        <div class="ms-5 text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Tài khoản</label>
                                    <select name="UserId" class="form-select" id="exampleSelectGender">
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('UserId')
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

    <script>
        document.getElementById('citySelect').addEventListener('change', function() {
            var cityId = this.value;
            fetch('/get-districts/' + cityId)
                .then(response => response.json())
                .then(data => {
                    var districtSelect = document.getElementById('districtSelect');
                    districtSelect.innerHTML = '<option value="">Chọn Quận/Huyện</option>';
                    data.forEach(district => {
                        districtSelect.innerHTML +=
                            `<option value="${district.id}">${district.name}</option>`;
                    });
                });
        });

        document.getElementById('districtSelect').addEventListener('change', function() {
            var districtId = this.value;
            fetch('/get-wards/' + districtId)
                .then(response => response.json())
                .then(data => {
                    var wardSelect = document.getElementById('wardSelect');
                    wardSelect.innerHTML = '<option value="">Chọn Xã/Phường</option>';
                    data.forEach(ward => {
                        wardSelect.innerHTML += `<option value="${ward.id}">${ward.name}</option>`;
                    });
                });
        });
    </script>
@endsection
