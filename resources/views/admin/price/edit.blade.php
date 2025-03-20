@extends('admin.layouts.main')
@section('title', 'Sửa Giá nhiên liệu')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title"> Sửa Giá nhiên liệu</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.fuel-prices.list') }}">Giá nhiên liệu</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Sửa Giá nhiên liệu</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Sửa Giá nhiên liệu</h4>
                            <form class="forms-sample" action="" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="citySelect">Loại nhiên liệu</label>
                                    <select class="form-select" id="citySelect" name="FuelTypeId">
                                        <option value="{{ $price->FuelTypeId }}">$price->fuelType->name</option>
                                        @foreach ($fuelTypes as $fuelType)
                                            <option value="{{ $fuelType->id }}">{{ $fuelType->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('FuelTypeId')
                                    <div class="ms-5 text-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="districtSelect">Công Ty Đầu mối</label>
                                    <select class="form-select" id="districtSelect" name="CompanyId">
                                        <option value="{{ $price->CompanyId }}">{{ $price->company->name }}</option>
                                        @foreach ($companies as $company)
                                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('CompanyId')
                                    <div class="ms-5 text-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="exampleInputName1">Giá</label>
                                    <input type="text" class="form-control" name="price" id="exampleInputName1"
                                        placeholder="Giắ nhiên liệu" value="{{ $price->price }}">
                                    @error('price')
                                        <div class="ms-5 text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Ngày cập nhật</label>
                                    <input type="date" class="form-control" name="start_date" id="exampleInputName1"
                                        placeholder="Ngày cập nhật" value="{{ $price->start_date }}">
                                    @error('start_date')
                                        <div class="ms-5 text-danger">{{ $message }}</div>
                                    @enderror
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
