@extends('layouts.master')

@section('content')
    {{-- Header --}}
    <div id="kt_app_toolbar" class="app-toolbar pt-7 pt-lg-10">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex align-items-stretch">
            <!--begin::Toolbar wrapper-->
            <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">Profil Saya
                    </h1>
                    <!--end::Title-->
                </div>
            </div>
        </div>
    </div>

    {{-- Konten Utama --}}
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-fluid">
            <!--begin::Navbar-->
            <div class="card mb-5 mb-xl-10">
                <div class="card-body pt-9 pb-0">
                    <!--begin::Details-->
                    <div class="d-flex flex-wrap flex-sm-nowrap">
                        <!--begin: Pic-->
                        <div class="me-7 mb-4">
                            <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                                @if (Auth::user()->avatar == null)
                                    <img class="lozad" src="assets/media/svg/avatars/blank.svg" alt="user" />
                                @else
                                    @if (Auth::user()->google_id !== null)
                                        @if (file_exists('gambar/' . auth()->user()->avatar))
                                            <img class="lozad" src="{{ asset('') . 'gambar/' . auth()->user()->avatar }}"
                                                alt="user" />
                                        @else
                                            <img class="lozad" src="{{ Auth::user()->avatar }}" alt="user" />
                                        @endif
                                    @else
                                        <img class="lozad" src="{{ asset('') . 'gambar/' . auth()->user()->avatar }}"
                                            alt="user" />
                                    @endif
                                @endif
                                <div
                                    class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-body h-20px w-20px">
                                </div>
                            </div>
                        </div>
                        <!--end::Pic-->
                        <!--begin::Info-->
                        <div class="flex-grow-1">
                            <!--begin::Title-->
                            <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                <!--begin::User-->
                                <div class="d-flex flex-column">
                                    <!--begin::Name-->
                                    <div class="d-flex align-items-center mb-2">
                                        <p class="text-gray-900 fs-2 fw-bold me-1">
                                            {{ Auth::user()->name }}</p>
                                    </div>
                                    <!--end::Name-->
                                    <!--begin::Info-->
                                    {{-- <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
                                        <a href="#"
                                            class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                            <i class="ki-outline ki-profile-circle fs-4 me-1"></i>Developer</a>
                                        <a href="#"
                                            class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                            <i class="ki-outline ki-geolocation fs-4 me-1"></i>SF, Bay Area</a>
                                        <a href="#"
                                            class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
                                            <i class="ki-outline ki-sms fs-4"></i>max@kt.com</a>
                                    </div> --}}
                                    <!--end::Info-->
                                </div>
                                <!--end::User-->
                            </div>
                            <!--end::Title-->
                            @if (auth()->user()->role == 'user')
                                <!--begin::Stats-->
                                <div class="d-flex flex-wrap flex-stack">
                                    <!--begin::Wrapper-->
                                    <div class="d-flex flex-column flex-grow-1 pe-8">
                                        <!--begin::Stats-->
                                        <div class="d-flex flex-wrap">
                                            <!--begin::Stat-->
                                            <div
                                                class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                                <!--begin::Number-->
                                                <div class="d-flex align-items-center">
                                                    <div class="fs-2 fw-bold" data-kt-countup="true"
                                                        data-kt-countup-value="{{ count($paket) }}">0
                                                    </div>
                                                </div>
                                                <!--end::Number-->
                                                <!--begin::Label-->
                                                <div class="fw-semibold fs-6 text-gray-400">Paket Berbayar</div>
                                                <!--end::Label-->
                                            </div>
                                            <!--end::Stat-->
                                            <!--begin::Stat-->
                                            <div
                                                class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                                <!--begin::Number-->
                                                <div class="d-flex align-items-center">
                                                    {{-- <i class="ki-outline ki-arrow-down fs-3 text-danger me-2"></i> --}}
                                                    <div class="fs-2 fw-bold" data-kt-countup="true"
                                                        data-kt-countup-value="{{ count($paketgratis) }}">
                                                        0</div>
                                                </div>
                                                <!--end::Number-->
                                                <!--begin::Label-->
                                                <div class="fw-semibold fs-6 text-gray-400">Paket Gratis</div>
                                                <!--end::Label-->
                                            </div>
                                            <!--end::Stat-->
                                        </div>
                                        <!--end::Stats-->
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                                <!--end::Stats-->
                            @endif
                        </div>
                        <!--end::Info-->
                    </div>
                    <!--end::Details-->
                    <!--begin::Navs-->
                    <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
                        <!--begin::Nav item-->
                        <li class="nav-item mt-2">
                            <a class="nav-link text-active-primary ms-0 me-10 py-5 {{ request()->is('profil') ? 'active' : '' }}"
                                href="{{ url('/profil') }}">Detail Profil</a>
                        </li>
                        <!--end::Nav item-->
                        <!--begin::Nav item-->
                        <li class="nav-item mt-2">
                            <a class="nav-link text-active-primary ms-0 me-10 py-5 {{ request()->is('password') ? 'active' : '' }}"
                                href="{{ url('password') }}">Ubah
                                Password</a>
                        </li>
                        <!--end::Nav item-->
                    </ul>
                    <!--begin::Navs-->
                </div>
            </div>
            <!--end::Navbar-->
            <div class="card mb-5 mb-xl-10">
                <!--begin::Content-->
                @yield('profile')
                <!--end::Content-->
            </div>
        </div>
        <!--end::Content container-->
    </div>
@endsection
