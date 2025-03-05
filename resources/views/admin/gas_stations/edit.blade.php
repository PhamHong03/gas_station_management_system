@extends('admin.main')

@section('head')
<script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
        
<form action="" method="POST">
    @csrf
    

    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="branch_name">Tên chi nhánh</label>
                    <input type="text" name="branch_name" class="form-control" 
                           value="{{ $branch->branch_name }}" placeholder="Nhập tên chi nhánh">
                </div>
            </div>     
            <div class="col-md-6">
                <div class="form-group">
                    <label for="branch_position">Vị trí chi nhánh</label>
                    <div>
                        <select class="form-control mb-2" id="city" name="city_input">
                            <option value="{{ $city }}" selected>{{ $city ?: '-- Chọn tỉnh thành --' }}</option>
                        </select>

                        <select class="form-control mb-2" id="district" name="district_input">
                            <option value="{{ $district }}" selected>{{ $district ?: '-- Chọn quận huyện --' }}</option>
                        </select>

                        <select class="form-control" id="ward" name="ward_input">
                            <option value="{{ $ward }}" selected>{{ $ward ?: '-- Chọn phường xã --' }}</option>
                        </select>
                    </div>
                </div>
            </div>                  
        </div>          

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Kích hoạt</label>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" 
                               value="1" name="active" id="active" 
                               {{ $branch->active == 1 ? 'checked' : '' }}>
                        <label for="active" class="custom-control-label">Có</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" 
                               value="0" name="active" id="noactive" 
                               {{ $branch->active == 0 ? 'checked' : '' }}>
                        <label for="noactive" class="custom-control-label">Không</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Cập nhật chi nhánh    </button>
    </div>
</form>

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>

<script>
    var citis = document.getElementById("city");
    var districts = document.getElementById("district");
    var wards = document.getElementById("ward");

    axios.get("https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json")
        .then(function (response) {
            renderCity(response.data);
        });

    function renderCity(data) {
        for (const x of data) {
            citis.options[citis.options.length] = new Option(x.Name, x.Id);
        }

        citis.onchange = function () {
            districts.length = 1;
            wards.length = 1;
            if (this.value != "") {
                const result = data.filter(n => {
                    if (n.Id === this.value) {
                        document.querySelector('.address_tinh').value = n.Name;
                        return true;
                    }
                });

                for (const k of result[0].Districts) {
                    districts.options[districts.options.length] = new Option(k.Name, k.Id);
                }
            }
        };
        districts.onchange = function () {
            wards.length = 1;
            const dataCity = data.filter(n => n.Id === citis.value);
            if (this.value != "") {
                const dataWards = dataCity[0].Districts.filter(n => {
                    if (n.Id === this.value) {
                        document.querySelector('.address_huyen').value = n.Name;
                        return true;
                    }
                })[0].Wards;

                for (const w of dataWards) {
                    wards.options[wards.options.length] = new Option(w.Name, w.Id);
                }
            }
        };
        wards.onchange = function () {
            const address_xa = document.querySelector('.address_xa');
            const selectedIndex = wards.selectedIndex;
            address_xa.value = wards.options[selectedIndex].text;
        };
    }
</script>

<script> 
    
    CKEDITOR.replace( 'content' );
</script>
@endsection

@section('foot')

@endsection