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
                    <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">Soal-soal
                        {{ $datas->subkategori->kategori->kategori }}
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

            <div class="row">
                <div class="col-md-9 mb-4">
                    <div class="card">
                        <div class="card-body py-4">
                            <div class="d-flex justify-content-between">
                                <h3>Soal Nomor {{ $nomor }}</h3>
                                <h3>{{ $datas->subkategori->sub_kategori }}</h3>
                            </div>
                            <hr>

                            {{-- jawaban --}}
                            <p style="font-size: 15px">{{ $datas->soal }}</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                    id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    <strong style="font-size: 15px">{{ $datas->jawaban->pilihan_a }}</strong>
                                </label>
                            </div>
                            <div class="form-check my-6">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                    id="flexRadioDefault2">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    <strong style="font-size: 15px">{{ $datas->jawaban->pilihan_b }}</strong>
                                </label>
                            </div>
                            <div class="form-check my-6">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                    id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    <strong style="font-size: 15px">{{ $datas->jawaban->pilihan_c }}</strong>
                                </label>
                            </div>
                            <div class="form-check my-6">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                    id="flexRadioDefault2">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    <strong style="font-size: 15px">{{ $datas->jawaban->pilihan_d }}</strong>
                                </label>
                            </div>
                            @if ($datas->jawaban->pilihan_e != null)
                                <div class="form-check my-6">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault2">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        <strong style="font-size: 15px">{{ $datas->jawaban->pilihan_e }}</strong>
                                    </label>
                                </div>
                            @endif

                            <a href="" class="btn btn-primary btn-md float-end">Lanjutkan</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body py-4">
                            <h3>Nomor Soal</h3>
                            <hr>
                            <div class="text-center">
                                {{-- @for ($i = 1; $i <= $number->count(); $i++) --}}
                                @foreach ($dataa as $item)
                                    @php
                                        $key = $loop->iteration;
                                    @endphp
                                    <a href="{{ url('kerjakan/' . $item->subkategori_id . '/' . $key) }}">
                                        <button
                                            class="btn {{ request()->is('kerjakan/' . $item->subkategori_id . '/' . $key) ? 'btn-primary' : 'btn-secondary' }}"
                                            style="margin: 2px; padding: 5px 15px; font-size: 10px; width:42px; height:34px">{{ $key }}</button>
                                    </a>
                                @endforeach
                                {{-- @endfor --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
