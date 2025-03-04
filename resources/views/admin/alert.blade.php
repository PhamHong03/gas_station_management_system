{{-- @if ($errors->any())
    <div class="alert alert-danger" >
        <ul>
            @foreach ($errors->all() as $error )
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


@if (Session::has('error'))
    <div class="alert alert-danger" >
        {{ Session::get('error')}}
    </div>
@endif

@if (Session::has('success'))
    <div class="alert alert-success text-center" >
        {{ Session::get('success')}}
    </div>
@endif --}}


@if ($errors->any())
    <script>
        Swal.fire({
            title: "Lỗi!",
            html: `{!! implode('<br>', $errors->all()) !!}`,
            icon: "error",
            confirmButtonText: "OK"
        });
    </script>
@endif

@if (Session::has('error'))
    <script>
        Swal.fire({
            title: "Lỗi!",
            text: "{{ Session::get('error') }}",
            icon: "error",
            confirmButtonText: "OK"
        });
    </script>
@endif

@if (Session::has('success'))
    <script>
        Swal.fire({
            title: "Thành công!",
            text: "{{ Session::get('success') }}",
            icon: "success",
            confirmButtonText: "OK"
        });
    </script>
@endif
