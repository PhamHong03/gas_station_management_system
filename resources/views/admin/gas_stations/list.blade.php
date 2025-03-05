@extends('admin.main')


@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">ID</th>
                <th>Chi nhánh </th>
                <th>Địa chỉ</th>
                <th>Slug</th>
                <th>Active</th>
                <th>Cập nhật</th>
                <th style="width: 100px">&nbsp</th>
            </tr>
        </thead>
        <tbody>
            {!! \App\Helper\Helper::branch($branches) !!}
        </tbody>
    </table>
@endsection