@include('layouts.header')
@include('layouts.sidebar')
<!--begin::Body-->

<!--begin::Main-->
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <!--begin::Content wrapper-->
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Content-->
        @yield('content')
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->
    @include('layouts.footer')
