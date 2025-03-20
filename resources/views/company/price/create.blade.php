@extends('company.layouts.main')
@section('title', 'Thêm Giá nhiên liệu')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title"> Thêm Giá nhiên liệu</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('company.fuel-prices.list') }}">Giá nhiên liệu</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Thêm Giá nhiên liệu</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Thêm Giá nhiên liệu</h4>
                            <form class="forms-sample" action="" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="citySelect">Loại nhiên liệu</label>
                                    <select class="form-select" id="citySelect" name="FuelTypeId">
                                        <option value="">Chọn Nhiên Liệu</option>
                                        @foreach ($fuelTypes as $fuelType)
                                            <option value="{{ $fuelType->id }}">{{ $fuelType->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('FuelTypeId')
                                    <div class="ms-5 text-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <input type="text" class="form-control" id="exampleInputName1"
                                        value="Công Ty Đầu mối {{ $company->name }}" readonly>
                                    <input type="hidden" value="{{ $company->id }}" name="CompanyId">
                                </div>
                                @error('CompanyId')
                                    <div class="ms-5 text-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="exampleInputName1">Giá</label>
                                    <input type="text" class="form-control" name="price" id="exampleInputName1"
                                        placeholder="Giắ nhiên liệu">
                                    @error('price')
                                        <div class="ms-5 text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Ngày cập nhật</label>
                                    <input type="date" class="form-control" name="start_date" id="exampleInputName1"
                                        placeholder="Ngày cập nhật">
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
@endsection
