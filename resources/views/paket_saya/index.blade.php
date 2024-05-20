@extends('layouts.master')

@section('content')
    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar pt-7 pt-lg-10">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex align-items-stretch">
            <!--begin::Toolbar wrapper-->
            <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">Paket Saya
                    </h1>
                    <!--end::Title-->
                </div>
                <!--end::Page title-->
            </div>
            <!--end::Toolbar wrapper-->
        </div>
        <!--end::Toolbar container-->
    </div>
    <!--end::Toolbar-->
    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-fluid">
            <!--begin::Card-->
            <div class="row g-5 g-xl-8">
                <!--begin::Col-->
                @if ($data->count() > 0)
                    @foreach ($data as $item)
                        <div class="col-md-4">
                            <div class="card-xl-stretch mx-md-3">
                                <!--begin::Overlay-->

                                {{-- On progress By Iqbal --}}
                                <a class="d-block overlay" data-fslightbox="lightbox-hot-sales"
                                    href="{{ asset('gambar') . '/' . $item->paket->gambar }}">
                                    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-300px"
                                        style="background-image:url('{{ asset('gambar') . '/' . $item->paket->gambar }}')">
                                    </div>
                                    <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                        <i class="ki-outline ki-eye fs-2x text-white"></i>
                                    </div>
                                </a>
                                <!--end::Overlay-->
                                <!--begin::Body-->
                                <div class="mt-5">
                                    <!--begin::Title-->
                                    {{-- <a href="#" class="fs-4 text-dark fw-bold text-hover-primary text-dark lh-base">25 Products Mega Bundle with 50% off discount amazing</a> --}}
                                    <!--end::Title-->
                                    <!--begin::Text-->
                                    <div class="fw-semibold fs-5 text-gray-600 text-dark mt-3">{{ $item->paket->judul }}
                                    </div>
                                    {{-- <div class="fw-semibold fs-5 text-gray-600 text-dark mt-3">Waktu Pengerjaan : {{ $item->paket->judul }}
                                    </div> --}}
                                    <!--end::Text-->
                                    <!--begin::Text-->
                                    <div class="fs-6 fw-bold mt-5 d-flex flex-stack">
                                        <!--begin::Label-->
                                        {{-- <span class="badge border border-dashed fs-2 fw-bold text-dark p-2">
                                            <span class="fs-6 fw-semibold text-gray-400">$</span>27</span> --}}
                                        <!--end::Label-->
                                        <!--begin::Action-->
                                        <a href="{{ url('paketsaya/' . $item->paket_id) }}"
                                            class="btn btn-sm btn-primary col-12">Pilih</a>
                                        <!--end::Action-->
                                    </div>
                                    <!--end::Text-->
                                </div>
                                <!--end::Body-->
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="alert alert-warning" role="alert">
                        <h4 class="alert-heading" style="color: black">Belum Ada Paket</h4>
                        <p style="color: black">Yuk beli paket dulu dan kerjakan soal Tryout Anda.</p>
                        <a href="{{ url('pusatlangganan') }}" class="btn btn-primary btn-md">Lihat Paket</a>
                    </div>
                @endif
                <!--end::Col-->
            </div>
        </div>
    </div>
@endsection
