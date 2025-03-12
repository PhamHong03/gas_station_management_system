<!DOCTYPE html>
<html lang="en">
@include('company.layouts.head')

<body>
    <div class="container-scroller">
        @include('company.layouts.nav')
        <div class="container-fluid page-body-wrapper">
            @include('company.layouts.sidebar')
            @include('company.layouts.alert')
            @yield('content')

        </div>
        <!-- page-body-wrapper ends -->
        @include('company.layouts.js')
    </div>
