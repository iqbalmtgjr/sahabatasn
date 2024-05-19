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
                    <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">Edit Bank
                        Soal
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
            <div class="card">
                <!--begin::Card body-->
                <div class="card-body py-10">
                    <form id="kt_modal_add_user_form" class="form" method="POST" action="{{ url('/banksoal/update') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <!--begin::Scroll-->

                        <input type="hidden" id="id" name="id" value="{{ $data->id }}">
                        <div class="d-flex flex-column scroll-y px-5 px-lg-10">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Pertanyaan</h4>
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-7">
                                        <label class="required fw-semibold fs-6 mb-2">Soal</label>
                                        <input type="text" name="soal" id="soal"
                                            class="form-control form-control-solid mb-3 mb-lg-0 @error('soal') is-invalid @enderror"
                                            placeholder="Masukkan soal" value="{{ $data->soal }}" />
                                        @error('soal')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-7">
                                        <label class="required fw-semibold fs-6 mb-2">Sub Ketegori</label>
                                        <select
                                            class="form-select form-select-solid @error('sub_kategori') is-invalid @enderror"
                                            name="sub_kategori" id="sub_kategori">
                                            <option value=""></option>
                                            @foreach ($sub_kategori as $item)
                                                <option value="{{ $item->id }}" @selected($data->subkategori_id == $item->id)>
                                                    {{ $item->sub_kategori }}</option>
                                            @endforeach
                                        </select>
                                        @error('sub_kategori')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    {{-- <div class="fv-row mb-7">
                                        <label class="required fw-semibold fs-6 mb-2">Tipe</label>
                                        <select class="form-select form-select-solid  @error('tipe') is-invalid @enderror"
                                            data-hide-search="true" data-placeholder="-- Pilih Tipe --" name="tipe"
                                            id="tipe">
                                            <option value=""></option>
                                            <option value="Berbayar" @selected($data->tipe == 'Berbayar')>Berbayar</option>
                                            <option value="Gratis" @selected($data->tipe == 'Gratis')>Gratis</option>
                                        </select>
                                        @error('tipe')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div> --}}
                                    <!--end::Input group-->
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="d-block fw-semibold fs-6 mb-5">Gambar</label>
                                        <!--end::Label-->
                                        <!--begin::Image placeholder-->
                                        <style>
                                            .image-input-placeholder {
                                                background-image: url('{{ asset('') }}assets/media/svg/files/blank-image.svg');
                                            }

                                            [data-bs-theme="dark"] .image-input-placeholder {
                                                background-image: url('{{ asset('') }}assets/media/svg/files/blank-image-dark.svg');
                                            }
                                        </style>
                                        <!--end::Image placeholder-->
                                        <!--begin::Image input-->
                                        <div class="image-input image-input-outline image-input-placeholder"
                                            data-kt-image-input="true">
                                            <!--begin::Preview existing avatar-->
                                            <div class="image-input-wrapper w-125px h-125px"
                                                style="background-image: url({{ asset('') }}assets/media/svg/files/blank-image.svg);">
                                            </div>
                                            <!--end::Preview existing avatar-->
                                            <!--begin::Label-->
                                            <label
                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                title="Tambah Gambar Soal">
                                                <i class="ki-outline ki-pencil fs-7"></i>
                                                <!--begin::Inputs-->
                                                <input type="file" name="gambar" accept=".png, .jpg, .jpeg" />
                                                {{-- <input type="hidden" name="avatar_remove" /> --}}
                                                <!--end::Inputs-->
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Cancel-->
                                            <span
                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                title="Cancel avatar">
                                                <i class="ki-outline ki-cross fs-2"></i>
                                            </span>
                                            <!--end::Cancel-->
                                            <!--begin::Remove-->
                                            <span
                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                title="Remove avatar">
                                                <i class="ki-outline ki-cross fs-2"></i>
                                            </span>
                                            <!--end::Remove-->
                                        </div>
                                        <!--end::Image input-->
                                        <!--begin::Hint-->
                                        <div class="form-text">Tipe file yang diperbolehkan : png, jpg, jpeg.
                                        </div>
                                        <!--end::Hint-->
                                        @error('gambar')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h4>Pilihan</h4>
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-7">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="required fw-semibold fs-6 mb-2">Pilihan A</label>
                                                <input type="text" name="pilihan_a" id="pilihan_a"
                                                    class="form-control form-control-solid mb-3 mb-lg-0 @error('pilihan_a') is-invalid @enderror"
                                                    placeholder="Masukkan pilihan A"
                                                    value="{{ $data->jawaban->pilihan_a }}" />
                                                @error('pilihan_a')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label class="required fw-semibold fs-6 mb-2">Jawaban A</label>
                                                <input type="number" name="jawaban_a" id="jawaban_a"
                                                    class="form-control form-control-solid mb-3 mb-lg-0 @error('jawaban_a') is-invalid @enderror"
                                                    placeholder="Masukkan bobot nilai."
                                                    value="{{ $data->jawaban->jawaban_a }}">
                                                @error('jawaban_a')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-7">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="required fw-semibold fs-6 mb-2">Pilihan B</label>
                                                <input type="text" name="pilihan_b" id="pilihan_b"
                                                    class="form-control form-control-solid mb-3 mb-lg-0 @error('pilihan_b') is-invalid @enderror"
                                                    placeholder="Masukkan pilihan B"
                                                    value="{{ $data->jawaban->pilihan_b }}" />
                                                @error('pilihan_b')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label class="required fw-semibold fs-6 mb-2">Jawaban B</label>
                                                <input type="number" name="jawaban_b" id="jawaban_b"
                                                    class="form-control form-control-solid mb-3 mb-lg-0 @error('jawaban_b') is-invalid @enderror"
                                                    placeholder="Masukkan bobot nilai."
                                                    value="{{ $data->jawaban->jawaban_b }}">
                                                @error('jawaban_b')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-7">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="required fw-semibold fs-6 mb-2">Pilihan C</label>
                                                <input type="text" name="pilihan_c" id="pilihan_c"
                                                    class="form-control form-control-solid mb-3 mb-lg-0 @error('pilihan_c') is-invalid @enderror"
                                                    placeholder="Masukkan pilihan C"
                                                    value="{{ $data->jawaban->pilihan_c }}" />
                                                @error('pilihan_c')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label class="required fw-semibold fs-6 mb-2">Jawaban C</label>
                                                <input type="number" name="jawaban_c" id="jawaban_c"
                                                    class="form-control form-control-solid mb-3 mb-lg-0 @error('jawaban_c') is-invalid @enderror"
                                                    placeholder="Masukkan bobot nilai."
                                                    value="{{ $data->jawaban->jawaban_c }}">
                                                @error('jawaban_c')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-7">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="required fw-semibold fs-6 mb-2">Pilihan D</label>
                                                <input type="text" name="pilihan_d" id="pilihan_d"
                                                    class="form-control form-control-solid mb-3 mb-lg-0 @error('pilihan_d') is-invalid @enderror"
                                                    placeholder="Masukkan pilihan D"
                                                    value="{{ $data->jawaban->pilihan_d }}" />
                                                @error('pilihan_d')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label class="required fw-semibold fs-6 mb-2">Jawaban D</label>
                                                <input type="number" name="jawaban_d" id="jawaban_d"
                                                    class="form-control form-control-solid mb-3 mb-lg-0 @error('jawaban_d') is-invalid @enderror"
                                                    placeholder="Masukkan bobot nilai."
                                                    value="{{ $data->jawaban->jawaban_d }}">
                                                @error('jawaban_d')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-7">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="required fw-semibold fs-6 mb-2">Pilihan E</label>
                                                <input type="text" name="pilihan_e" id="pilihan_e"
                                                    class="form-control form-control-solid mb-3 mb-lg-0 @error('pilihan_e') is-invalid @enderror"
                                                    placeholder="Masukkan pilihan E"
                                                    value="{{ $data->jawaban->pilihan_e }}" />
                                                @error('pilihan_e')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label class="required fw-semibold fs-6 mb-2">Jawaban E</label>
                                                <input type="number" name="jawaban_e" id="jawaban_e"
                                                    class="form-control form-control-solid mb-3 mb-lg-0 @error('jawaban_e') is-invalid @enderror"
                                                    placeholder="Masukkan bobot nilai."
                                                    value="{{ $data->jawaban->jawaban_e }}">
                                                @error('jawaban_e')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <!--end::Input group-->
                                </div>
                            </div>
                            <div class="row">
                                <div class="fv-row mb-7">
                                    <label class="required fw-semibold fs-6 mb-2">Pembahasan</label>
                                    <textarea class="pembahasan form-control form-control-solid mb-3 mb-lg-0 @error('pembahasan') is-invalid @enderror"
                                        name="pembahasan" id="pembahasan">{{ $data->jawaban->pembahasan }}</textarea>
                                    @error('pembahasan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <!--end::Scroll-->
                        <!--begin::Actions-->
                        <div class="pt-10 d-flex justify-content-between">
                            <a href="{{ url('bank-soal') }}" class="btn btn-info me-3">Kembali</a>
                            <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                                <span class="indicator-label">Simpan</span>
                            </button>
                        </div>
                        <!--end::Actions-->
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- @include('bank_soal.modal') --}}
    {{-- @include('bank_soal.modaledit') --}}
@endsection

@push('header')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endpush

@push('footer')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $('#pembahasan').summernote({
            placeholder: 'Masukkan pembahasan',
            tabsize: 2,
            height: 400
        });
    </script>
@endpush
