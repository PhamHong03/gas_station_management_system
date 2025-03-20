@extends('admin.layouts.main')
@section('title',
    'Thêm Nhiên Liệu Kinh Doanh cho
    {{ $gasStation->name }}')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title"> Thêm Nhiên Liệu Kinh Doanh cho {{ $gasStation->name }}</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a
                                href="{{ route('admin.gas-station-fuel.list', ['id' => $gasStation->id]) }}">{{ $gasStation->name }}</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Thêm Nhiên Liệu Kinh Doanh cho
                            {{ $gasStation->name }}</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Thêm Nhiên Liệu Kinh Doanh cho
                                {{ $gasStation->name }}</h4>
                            <form class="forms-sample" action="" method="post">
                                @csrf
                                <input type="hidden" name="GasStationId" value="{{ $gasStation->id }}">
                                <div class="form-group">
                                    <label for="citySelect">Chọn nhiên liệu cho cây xăng</label>
                                    <select class="form-select" name="FuelTypeId">
                                        <option value="">Chọn nhiên liệu cho cây xăng</option>
                                        @foreach ($fuelTypes as $fuelType)
                                            <option value="{{ $fuelType->id }}">{{ $fuelType->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('FuelTypeId')
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
