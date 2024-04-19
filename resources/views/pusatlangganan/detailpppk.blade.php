@extends('layouts.master')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar pt-7 pt-lg-10">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex align-items-stretch">
                <!--begin::Toolbar wrapper-->
                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                    <!--begin::Page title-->
                    <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                        <!--begin::Title-->
                        <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">Pusat
                            Langganan
                        </h1>
                        <!--end::Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ url('pusatlangganan') }}" class="text-muted text-hover-primary">Pusat
                                    Langganan</a>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">Detail PPPK</li>
                            <!--end::Item-->
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page title-->
                </div>
                <!--end::Toolbar wrapper-->
            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Content-->

        <!--begin::Content container-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">
                <!--begin::Pricing card-->
                <div class="row g-5 g-xl-8">
                    <div class="col-xl-4">
                        <!--begin::Statistics Widget 5-->
                        <a href="{{ url('pusatlangganan/detailpppkteknis') }}"
                            class="card bg-dark hoverable card-xl-stretch mb-xl-8">
                            <!--begin::Body-->
                            <div class="card-body">
                                <i class="ki-outline ki-cheque text-gray-100 fs-2x ms-n1"></i>
                                <div class="text-gray-100 fw-bold fs-2 mb-2 mt-5">KOMPETENSI TEKNIS</div>
                                <div class="fw-semibold text-gray-100">Guru, Dokter, Asisten, dll</div>
                            </div>
                            <!--end::Body-->
                        </a>
                        <!--end::Statistics Widget 5-->
                    </div>
                    <div class="col-xl-4">
                        <!--begin::Statistics Widget 5-->
                        <a href="{{ url('pusatlangganan/detailpppkumum') }}"
                            class="card bg-info hoverable card-xl-stretch mb-5 mb-xl-8">
                            <!--begin::Body-->
                            <div class="card-body">
                                <i class="ki-outline ki-chart-pie-simple text-white fs-2x ms-n1"></i>
                                <div class="text-white fw-bold fs-2 mb-2 mt-2">KOMPETENSI UMUM</div>
                                <div class="fw-semibold text-white">Manajerial, Sosiokultural, dan Wawancara</div>
                            </div>
                            <!--end::Body-->
                        </a>
                        <!--end::Statistics Widget 5-->
                    </div>
                </div>
                <!--end::Pricing card-->
            </div>
            <!--end::Content container-->
            <!--end::Content-->
        </div>
    @endsection
