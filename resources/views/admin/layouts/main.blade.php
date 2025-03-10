<!DOCTYPE html>
<html lang="en">
  @include('admin.layouts.head')
  <body>
    <div class="container-scroller">
      @include('admin.layouts.nav')
      <div class="container-fluid page-body-wrapper">
        @include('admin.layouts.sidebar')
        @include('admin.layouts.alert')
        @yield('content')

      </div>
      <!-- page-body-wrapper ends -->
      @include('admin.layouts.js')
    </div>
