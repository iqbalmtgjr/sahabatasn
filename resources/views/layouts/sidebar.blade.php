<body id="kt_app_body" data-kt-app-header-fixed="true" data-kt-app-header-fixed-mobile="true"
    data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true"
    data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true"
    class="app-default">
    <!--begin::Theme mode setup on page load-->
    <script>
        var defaultThemeMode = "light";
        var themeMode;
        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }
    </script>
    <!--end::Theme mode setup on page load-->
    <!--begin::App-->
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <!--begin::Page-->
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
            <!--begin::Header-->
            <div id="kt_app_header" class="app-header">
                <!--begin::Header container-->
                <div class="app-container container-fluid d-flex align-items-stretch flex-stack"
                    id="kt_app_header_container">
                    <!--begin::Sidebar toggle-->
                    <div class="d-flex align-items-center d-block d-lg-none ms-n3" title="Show sidebar menu">
                        <div class="btn btn-icon btn-active-color-primary w-35px h-35px me-2"
                            id="kt_app_sidebar_mobile_toggle">
                            <i class="ki-outline ki-abstract-14 fs-2"></i>
                        </div>
                        <!--begin::Logo image-->
                        <a href="{{ url('/dashboard') }}">
                            <img alt="Logo" src="assets/media/gambar/logosahabatasn.png" class="h-30px" />
                        </a>
                        <!--end::Logo image-->
                    </div>
                    <!--end::Sidebar toggle-->
                    @include('layouts.navbar')
                    <!--begin::Separator-->
                    <div class="app-navbar-separator separator d-none d-lg-flex"></div>
                    <!--end::Separator-->
                </div>
                <!--end::Header container-->
            </div>
            <!--end::Header-->
            <!--begin::Wrapper-->
            <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                <!--begin::Sidebar-->
                <div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true"
                    data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}"
                    data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="start"
                    data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
                    <div class="app-sidebar-header d-flex flex-stack d-none d-lg-flex pt-8 pb-2"
                        id="kt_app_sidebar_header">
                        <!--begin::Logo-->
                        <a href="{{ url('dashboard') }}" class="app-sidebar-logo">
                            <img alt="Logo" src="{{ asset('') }}assets/media/gambar/sa-side.png"
                                class="h-25px d-none d-sm-inline app-sidebar-logo-default theme-light-show" />
                            <img alt="Logo" src="{{ asset('') }}assets/media/gambar/sa-side-dark.png"
                                class="h-20px h-lg-25px theme-dark-show" />
                        </a>
                        <!--end::Logo-->
                        <!--begin::Sidebar toggle-->
                        <div id="kt_app_sidebar_toggle"
                            class="app-sidebar-toggle btn btn-sm btn-icon bg-light btn-color-gray-700 btn-active-color-primary d-none d-lg-flex rotate"
                            data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
                            data-kt-toggle-name="app-sidebar-minimize">
                            <i class="ki-outline ki-text-align-right rotate-180 fs-1"></i>
                        </div>
                        <!--end::Sidebar toggle-->
                    </div>
                    <!--begin::Navs-->
                    <div class="app-sidebar-navs flex-column-fluid py-6" id="kt_app_sidebar_navs">
                        <div id="kt_app_sidebar_navs_wrappers" class="app-sidebar-wrapper hover-scroll-y my-2"
                            data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto"
                            data-kt-scroll-dependencies="#kt_app_sidebar_header"
                            data-kt-scroll-wrappers="#kt_app_sidebar_navs" data-kt-scroll-offset="5px">
                            <!--begin::Sidebar menu-->
                            <div id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false"
                                class="app-sidebar-menu-primary menu menu-column menu-rounded menu-sub-indention menu-state-bullet-primary">
                                <!--begin::Heading-->
                                <div class="menu-item mb-2">
                                    <div class="menu-heading text-uppercase fs-7 fw-bold">Menu</div>
                                    <!--begin::Separator-->
                                    <div class="app-sidebar-separator separator"></div>
                                    <!--end::Separator-->
                                </div>
                                <!--end::Heading-->
                                <!--begin:Menu item-->
                                <div class="menu-item">
                                    <a class="menu-link {{ request()->is('dashboard') ? 'active' : '' }}"
                                        href="{{ url('dashboard') }}">
                                        <span class="menu-icon">
                                            <i class="ki-outline ki-home-2 fs-2"></i>
                                        </span>
                                        <span class="menu-title">Dashboards</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link {{ request()->is('kelola-user') ? 'active' : '' }}"
                                        href="{{ url('kelola-user') }}">
                                        <span class="menu-icon">
                                            <i class="ki-outline ki-people fs-2"></i>
                                        </span>
                                        <span class="menu-title">Kelola User</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link" href="#">
                                        <span class="menu-icon">
                                            <i class="ki-outline ki-dollar fs-2"></i>
                                        </span>
                                        <span class="menu-title">Pembayaran</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link {{ request()->is('bank-soal') ? 'active' : '' }}"
                                        href="{{ url('bank-soal') }}">
                                        <span class="menu-icon">
                                            <i class="ki-outline ki-folder fs-2"></i>
                                        </span>
                                        <span class="menu-title">Bank Soal</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link {{ request()->is('kelola-paket') ? 'active' : '' }}"
                                        href="{{ url('kelola-paket') }}">
                                        <span class="menu-icon">
                                            <i class="ki-outline ki-package fs-2"></i>
                                        </span>
                                        <span class="menu-title">Paket Soal</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link {{ request()->is('kelola-kategori') ? 'active' : '' }}"
                                        href="{{ url('/kelola-kategori') }}">
                                        <span class="menu-icon">
                                            <i class="ki-outline ki-abstract-30 fs-2"></i>
                                        </span>
                                        <span class="menu-title">Kategori Paket</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link" href="#">
                                        <span class="menu-icon">
                                            <i class="ki-outline ki-medal-star fs-2"></i>
                                        </span>
                                        <span class="menu-title">Hasil Tryout</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link {{ request()->is('pusatlangganan') ? 'active' : '' }}"
                                        href="{{ url('pusatlangganan') }}">
                                        <span class="menu-icon">
                                            <i class="ki-outline ki-handcart fs-2"></i>
                                        </span>
                                        <span class="menu-title">Pusat Langganan</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link" href="#">
                                        <span class="menu-icon">
                                            <i class="ki-outline ki-bookmark fs-2"></i>
                                        </span>
                                        <span class="menu-title">Paket Saya</span>
                                    </a>
                                </div>
                                <!--end:Menu item-->
                            </div>
                            <!--end::Sidebar menu-->
                        </div>
                    </div>
                    <!--end::Navs-->
                </div>
                <!--end::Sidebar-->
