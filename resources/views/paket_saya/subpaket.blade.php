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
                    <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">
                        Paket Saya "{{ $data[0]->paket->judul }}"
                    </h1>
                    <!--end::Title-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ url('paketsaya') }}" class="text-muted text-hover-primary">Paket Saya</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Kerjakan Soal</li>
                        <!--end::Item-->
                    </ul>
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
                    @foreach ($data as $data)
                        <div class="col-xl-4">
                            <!--begin::Mixed Widget 4-->
                            <div class="card card-xl-stretch mb-5 mb-xl-8">
                                <!--begin::Beader-->
                                <div class="card-header border-0 py-3">
                                    <h3 class="card-title align-items-start flex-column">
                                        <span class="card-label fw-bold fs-3 mb-4">{{ $data->subpaket->judul }}</span>
                                        <p class="fw-semibold fs-7 mb-1 text-muted">Jumlah Soal :
                                            <span class="text-danger">{{ $data->subpaket->tampungsoal->count() }}
                                                Soal</span>
                                        </p>
                                        <p class="fw-semibold fs-7 mb-1 text-muted">Waktu Pengerjaan :
                                            <span class="text-danger">{{ $data->subpaket->waktu }} Menit</span>
                                        </p>
                                        <p class="text-muted fw-semibold fs-7">Berlaku hingga :
                                            <span class="text-danger">
                                                {{ \Carbon\Carbon::parse($data->created_at)->addYear()->format('d F Y') }}</span>
                                        </p>
                                    </h3>
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div class="card-body d-flex flex-column">
                                    <a href="{{ url('kerjakan/' . $data->paket_id . '/' . $data->subpaket_id) }}"
                                        class="btn btn-primary w-100 py-3">Kerjakan</a>
                                    {{-- <a href="{{ url('kerjakan/' . $data->paket->kategori_id . '/' . $data->paket_id) }}"
                                        class="btn btn-primary w-100 py-3">Kerjakan</a> --}}
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Mixed Widget 4-->
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
