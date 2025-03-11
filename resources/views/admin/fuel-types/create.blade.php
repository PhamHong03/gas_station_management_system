@extends('admin.layouts.main')
@section('title', 'Thêm Nhiên liệu')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title"> Thêm Nhiên liệu</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.fuel-types.list') }}">Nhiên liệu</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Thêm Nhiên liệu</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Thêm Nhiên liệu</h4>
                            <form class="forms-sample" action="" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputName1">Tên Nhiên liệu</label>
                                    <input type="text" class="form-control" id="exampleInputName1" name="name"
                                        placeholder="Họ Và Tên">
                                    @error('name')
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
