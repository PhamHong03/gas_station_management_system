@extends('admin.layouts.main')
@section('title', 'Thêm Cây xăng')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title"> Thêm Cây xăng</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.gas-stations.list') }}">Cây xăng</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Thêm Cây xăng</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Thêm Cây xăng</h4>
                            <form class="forms-sample" action="" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputName1">Tên cây xăng</label>
                                    <input type="text" class="form-control" id="exampleInputName1" name="name"
                                        placeholder="Tên cây xăng">
                                    @error('name')
                                        <div class="ms-5 text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Số điện thoại</label>
                                    <input type="text" class="form-control" name="phone" id="exampleInputName1"
                                        placeholder="phone">
                                    @error('phone')
                                        <div class="ms-5 text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputName1">Kinh độ</label>
                                    <input type="text" class="form-control" name="longitude" id="exampleInputName1"
                                        placeholder="Kinh độ">
                                    @error('longitude')
                                        <div class="ms-5 text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Vỹ độ</label>
                                    <input type="text" class="form-control" name="latitude" id="exampleInputName1"
                                        placeholder="latitude">
                                    @error('latitude')
                                        <div class="ms-5 text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="citySelect">Tỉnh/Thành Phố</label>
                                    <select class="form-select" id="citySelect">
                                        <option value="">Chọn Tỉnh/Thành Phố</option>
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="districtSelect">Quận/Huyện</label>
                                    <select class="form-select" id="districtSelect">
                                        <option value="">Chọn Quận/Huyện</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="wardSelect">Xã/Phường</label>
                                    <select name="WardId" class="form-select" id="wardSelect">
                                        <option value="">Chọn Xã/Phường</option>
                                    </select>
                                    @error('ward')
                                        <div class="ms-5 text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Địa chỉ chi tiết</label>
                                    <input type="text" class="form-control" name="address" id="exampleInputName1"
                                        placeholder="address">
                                    @error('address')
                                        <div class="ms-5 text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Giờ hoạt động</label>
                                    <input type="text" class="form-control" name="operation_time" id="exampleInputName1"
                                        placeholder="operation_time">
                                    @error('operation_time')
                                        <div class="ms-5 text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <labelfor="exampleInputName1">Công Ty Đầu mối</labelfor=>
                                    <select name="CompanyId" class="form-select" id="">
                                        <option value="">Chọn Công Ty</option>
                                        @foreach ($companies as $company)
                                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('CompanyId')
                                        <div class="ms-5 text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Hình ảnh</label>
                                    <input type="file" class="form-control" name="image" id="exampleInputNam"
                                        placeholder="Chọn ảnh">
                                    @error('image')
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
