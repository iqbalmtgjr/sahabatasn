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
                        <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">
                            Pusat
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
                            <li class="breadcrumb-item text-muted"><a href="{{ url('pusatlangganan/detailcpns') }}"
                                    class="text-muted text-hover-primary">Detail CPNS</a></li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">Detail SKD</li>
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
                <div class="row g-10">
                    <!--begin::Col-->
                    <div class="col-md-4">
                        <!--begin::Hot sales post-->
                        <div class="card-xl-stretch mx-md-3">
                            <!--begin::Overlay-->
                            <a class="d-block overlay" data-fslightbox="lightbox-hot-sales"
                                href="{{ url('assets/media/stock/600x600/img-89.png') }}">
                                <!--begin::Image-->
                                <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-300px"
                                    style="background-image:url('{{ url('assets/media/stock/600x600/img-89.png') }}')">
                                </div>
                                <!--end::Image-->
                                <!--begin::Action-->
                                <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                    <i class="ki-outline ki-eye fs-2x text-white"></i>
                                </div>
                                <!--end::Action-->
                            </a>
                            <!--end::Overlay-->
                            <!--begin::Body-->
                            <div class="mt-5">
                                <!--begin::Title-->
                                {{-- <a href="#" class="fs-4 text-dark fw-bold text-hover-primary text-dark lh-base">25 Products Mega Bundle with 50% off discount amazing</a> --}}
                                <!--end::Title-->
                                <!--begin::Text-->
                                {{-- <div class="fw-semibold fs-5 text-gray-600 text-dark mt-3">We’ve been focused on making a the from also not been eye</div> --}}
                                <!--end::Text-->
                                <!--begin::Text-->
                                <div class="fs-6 fw-bold mt-5 d-flex flex-stack">
                                    <!--begin::Label-->
                                    {{-- <span class="badge border border-dashed fs-2 fw-bold text-dark p-2"> --}}
                                    {{-- <span class="fs-6 fw-semibold text-gray-400">$</span>27</span> --}}
                                    <!--end::Label-->
                                    <!--begin::Action-->
                                    <a href="#" class="btn btn-sm btn-primary">Beli</a>
                                    <!--end::Action-->
                                </div>
                                <!--end::Text-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Hot sales post-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-4">
                        <!--begin::Hot sales post-->
                        <div class="card-xl-stretch mx-md-3">
                            <!--begin::Overlay-->
                            <a class="d-block overlay" data-fslightbox="lightbox-hot-sales"
                                href="{{ url('assets/media/stock/600x600/img-89.png') }}">
                                <!--begin::Image-->
                                <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-300px"
                                    style="background-image:url('{{ url('assets/media/stock/600x600/img-89.png') }}')">
                                </div>
                                <!--end::Image-->
                                <!--begin::Action-->
                                <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                    <i class="ki-outline ki-eye fs-2x text-white"></i>
                                </div>
                                <!--end::Action-->
                            </a>
                            <!--end::Overlay-->
                            <!--begin::Body-->
                            <div class="mt-5">
                                <!--begin::Title-->
                                {{-- <a href="#" class="fs-4 text-dark fw-bold text-hover-primary text-dark lh-base">25 Products Mega Bundle with 50% off discount amazing</a> --}}
                                <!--end::Title-->
                                <!--begin::Text-->
                                {{-- <div class="fw-semibold fs-5 text-gray-600 text-dark mt-3">We’ve been focused on making a the from also not been eye</div> --}}
                                <!--end::Text-->
                                <!--begin::Text-->
                                <div class="fs-6 fw-bold mt-5 d-flex flex-stack">
                                    <!--begin::Label-->
                                    {{-- <span class="badge border border-dashed fs-2 fw-bold text-dark p-2"> --}}
                                    {{-- <span class="fs-6 fw-semibold text-gray-400">$</span>27</span> --}}
                                    <!--end::Label-->
                                    <!--begin::Action-->
                                    <a href="#" class="btn btn-sm btn-primary">Beli</a>
                                    <!--end::Action-->
                                </div>
                                <!--end::Text-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Hot sales post-->
                    </div>
                    <!--end::Col-->
                </div>
            </div>
            <!--end::Content container-->
            <!--end::Content-->
        </div>
    </div>
@endsection
