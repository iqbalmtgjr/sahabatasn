<!--begin::Footer-->
<div id="kt_app_footer" class="app-footer">
    <!--begin::Footer container-->
    <div class="app-container container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3">
        <!--begin::Copyright-->
        <div class="text-dark order-2 order-md-1">
            <span class="text-muted fw-semibold me-1">2024&copy;</span>
            <a href="https://technocloud.id" target="_blank" class="text-gray-800 text-hover-primary">TechnoCloud.id</a>
        </div>
        <!--end::Copyright-->
        <!--begin::Menu-->
        <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
            <li class="menu-item">
                <a href="{{ url('tentang-kami') }}" class="menu-link px-2">Kontak Kami</a>
            </li>
            {{-- <li class="menu-item">
                <a href="https://devs.keenthemes.com" target="_blank" class="menu-link px-2">Support</a>
            </li>
            <li class="menu-item">
                <a href="https://1.envato.market/EA4JP" target="_blank" class="menu-link px-2">Purchase</a>
            </li> --}}
        </ul>
        <!--end::Menu-->
    </div>
    <!--end::Footer container-->
</div>
<!--end::Footer-->
</div>
<!--end:::Main-->
</div>
<!--end::Wrapper-->
</div>
<!--end::Page-->
</div>
<!--end::App-->
<!--begin::Drawers-->
<!--end::Drawers-->
<!--begin::Scrolltop-->
<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
    <i class="ki-outline ki-arrow-up"></i>
</div>
<!--end::Scrolltop-->
<!--begin::Modals-->
<!--begin::Javascript-->
<script>
    var hostUrl = "assets/";
</script>
<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="{{ asset('') }}assets/plugins/global/plugins.bundle.js"></script>
<script src="{{ asset('') }}assets/js/scripts.bundle.js"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Custom Javascript(used for this page only)-->
@stack('footer')
@livewireScripts
<!--end::Custom Javascript-->
<!--end::Javascript-->
</body>
<!--end::Body-->

</html>
