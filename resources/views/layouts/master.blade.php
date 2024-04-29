@include('layouts.header')
@include('layouts.sidebar')
<!--begin::Body-->

<!--begin::Main-->
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <!--begin::Content wrapper-->
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Content-->
        @yield('content')
        {{ isset($slot) ? $slot : null }}
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->
</div>
@include('layouts.footer')
