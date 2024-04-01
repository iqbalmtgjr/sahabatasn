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
                <div class="card-body py-4">
                    <form id="kt_modal_add_user_form" class="form" method="POST" action="{{ url('/banksoal/update') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <!--begin::Scroll-->

                        <input type="hidden" id="id" name="id" value="{{ $data->id }}">
                        <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_user_scroll"
                            data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto"
                            data-kt-scroll-dependencies="#kt_modal_add_user_header"
                            data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
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
                                    <div class="fv-row mb-7">
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
                                    </div>
                                    <!--end::Input group-->
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="d-block fw-semibold fs-6 mb-5">Gambar</label>
                                        <!--end::Label-->
                                        <!--begin::Image placeholder-->
                                        <style>
                                            .image-input-placeholder {
                                                background-image: url('assets/media/svg/files/blank-image.svg');
                                            }

                                            [data-bs-theme="dark"] .image-input-placeholder {
                                                background-image: url('assets/media/svg/files/blank-image-dark.svg');
                                            }
                                        </style>
                                        <!--end::Image placeholder-->
                                        <!--begin::Image input-->
                                        <div class="image-input image-input-outline image-input-placeholder"
                                            data-kt-image-input="true">
                                            <!--begin::Preview existing avatar-->
                                            <div class="image-input-wrapper w-125px h-125px"
                                                style="background-image: url(assets/media/svg/files/blank-image.svg);">
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
                        <div class="text-center pt-10">
                            <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Batal</button>
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
    <link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endpush

@push('footer')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
    <script src="assets/js/widgets.bundle.js"></script>
    <script src="assets/js/custom/widgets.js"></script>
    <script>
        $('#pembahasan').summernote({
            placeholder: 'Masukkan pembahasan',
            tabsize: 2,
            height: 400
        });
    </script>
    <script>
        "use strict";

        // Class definition
        var KTDatatablesServerSide = function() {
            // Shared variables
            var table;
            var dt;
            var filterPayment;

            // Private functions
            var initDatatable = function() {
                dt = $("#kt_datatable_example_1").DataTable({
                    searchDelay: 500,
                    processing: true,
                    serverSide: true,
                    order: [
                        [1, 'desc']
                    ],
                    stateSave: true,
                    select: {
                        style: 'multi',
                        selector: 'td:first-child input[type="checkbox"]',
                        className: 'row-selected'
                    },
                    ajax: {
                        url: "{{ url('bank-soal') }}",
                    },
                    columns: [{
                            data: 'id'
                        },
                        {
                            data: 'soal'
                        },
                        {
                            data: 'kategori'
                        },
                        {
                            data: 'sub_kategori'
                        },
                        {
                            data: 'tipe'
                        },
                        {
                            data: null
                        },
                    ],
                    columnDefs: [{
                            targets: 0,
                            orderable: false,
                            render: function(data) {
                                return `
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="${data}" />
                            </div>`;
                            }
                        },
                        {
                            targets: -1,
                            data: null,
                            orderable: false,
                            className: 'text-end',
                            render: function(data, type, row) {
                                return `
                            <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
                                Aksi
                                <span class="svg-icon fs-5 m-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                            <path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="currentColor" fill-rule="nonzero" transform="translate(12.000003, 11.999999) rotate(-180.000000) translate(-12.000003, -11.999999)"></path>
                                        </g>
                                    </svg>
                                </span>
                            </a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" onclick="getdata(${row['id']})" class="menu-link px-3" data-kt-docs-table-filter="edit_row" data-bs-toggle="modal"
                                data-bs-target="#edit">
                                        Edit
                                    </a>
                                </div>
                                <!--end::Menu item-->

                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" data-id="${row['id']}" class="menu-link px-3" data-kt-docs-table-filter="delete_row">
                                        Delete
                                    </a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        `;
                            },
                        },
                    ],
                    // Add data-filter attribute
                });

                table = dt.$;

                // Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
                dt.on('draw', function() {
                    // initToggleToolbar();
                    toggleToolbars();
                    handleDeleteRows();
                    KTMenu.createInstances();
                });
            }

            // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
            var handleSearchDatatable = function() {
                const filterSearch = document.querySelector('[data-kt-docs-table-filter="search"]');
                filterSearch.addEventListener('keyup', function(e) {
                    dt.search(e.target.value).draw();
                });
            }

            // Delete customer
            var handleDeleteRows = () => {
                // Select all delete buttons
                const deleteButtons = document.querySelectorAll('[data-kt-docs-table-filter="delete_row"]');

                deleteButtons.forEach(d => {
                    // Delete button on click
                    d.addEventListener('click', function(e) {
                        e.preventDefault();

                        // Select parent row
                        const parent = e.target.closest('tr');

                        // Get customer name
                        const customerName = parent.querySelectorAll('td')[1].innerText;
                        let data = $(this).data()
                        let Id = data.id;

                        // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
                        Swal.fire({
                            text: "Yakin ingin menghapus soal " + customerName + "?",
                            icon: "warning",
                            showCancelButton: true,
                            buttonsStyling: false,
                            confirmButtonText: "Ya, hapus!",
                            cancelButtonText: "Tidak, batal",
                            customClass: {
                                confirmButton: "btn fw-bold btn-danger",
                                cancelButton: "btn fw-bold btn-active-light-primary"
                            }
                        }).then(function(result) {
                            if (result.value) {
                                // Simulate delete request -- for demo purpose only
                                Swal.fire({
                                    text: "Menghapus " + customerName,
                                    icon: "info",
                                    buttonsStyling: false,
                                    showConfirmButton: false,
                                    timer: 2000
                                }).then(function() {
                                    Swal.fire({
                                        text: "Data soal " +
                                            customerName + " terhapus !.",
                                        icon: "success",
                                        buttonsStyling: false,
                                        confirmButtonText: "Ok, mengerti!",
                                        customClass: {
                                            confirmButton: "btn fw-bold btn-primary",
                                        }
                                    }).then(function() {
                                        window.location =
                                            `{{ url('/banksoal/hapus') }}/${Id}`;
                                        dt.draw();
                                    });
                                });
                            } else if (result.dismiss === 'cancel') {
                                Swal.fire({
                                    text: "Soal " + customerName +
                                        " tidak jadi dihapus.",
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, mengerti!",
                                    customClass: {
                                        confirmButton: "btn fw-bold btn-primary",
                                    }
                                });
                            }
                        });
                    })
                });
            }

            // Reset Filter
            // var handleResetForm = () => {
            //     // Select reset button
            //     const resetButton = document.querySelector('[data-kt-docs-table-filter="reset"]');

            //     // Reset datatable
            //     resetButton.addEventListener('click', function() {
            //         // Reset payment type
            //         filterPayment[0].checked = true;

            //         // Reset datatable --- official docs reference: https://datatables.net/reference/api/search()
            //         dt.search('').draw();
            //     });
            // }

            // Init toggle toolbar
            // var initToggleToolbar = function() {
            //     // Toggle selected action toolbar
            //     // Select all checkboxes
            //     const container = document.querySelector('#kt_datatable_example_1');
            //     const checkboxes = container.querySelectorAll('[type="checkbox"]');

            //     // Select elements
            //     const deleteSelected = document.querySelector('[data-kt-docs-table-select="delete_selected"]');

            //     // Toggle delete selected toolbar
            //     checkboxes.forEach(c => {
            //         // Checkbox on click event
            //         c.addEventListener('click', function() {
            //             setTimeout(function() {
            //                 toggleToolbars();
            //             }, 50);
            //         });
            //     });

            //     // Deleted selected rows
            //     deleteSelected.addEventListener('click', function() {
            //         // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
            //         Swal.fire({
            //             text: "Are you sure you want to delete selected customers?",
            //             icon: "warning",
            //             showCancelButton: true,
            //             buttonsStyling: false,
            //             showLoaderOnConfirm: true,
            //             confirmButtonText: "Yes, delete!",
            //             cancelButtonText: "No, cancel",
            //             customClass: {
            //                 confirmButton: "btn fw-bold btn-danger",
            //                 cancelButton: "btn fw-bold btn-active-light-primary"
            //             },
            //         }).then(function(result) {
            //             if (result.value) {
            //                 // Simulate delete request -- for demo purpose only
            //                 Swal.fire({
            //                     text: "Deleting selected customers",
            //                     icon: "info",
            //                     buttonsStyling: false,
            //                     showConfirmButton: false,
            //                     timer: 2000
            //                 }).then(function() {
            //                     Swal.fire({
            //                         text: "You have deleted all selected customers!.",
            //                         icon: "success",
            //                         buttonsStyling: false,
            //                         confirmButtonText: "Ok, got it!",
            //                         customClass: {
            //                             confirmButton: "btn fw-bold btn-primary",
            //                         }
            //                     }).then(function() {
            //                         // delete row data from server and re-draw datatable
            //                         dt.draw();
            //                     });

            //                     // Remove header checked box
            //                     const headerCheckbox = container.querySelectorAll(
            //                         '[type="checkbox"]')[0];
            //                     headerCheckbox.checked = false;
            //                 });
            //             } else if (result.dismiss === 'cancel') {
            //                 Swal.fire({
            //                     text: "Selected customers was not deleted.",
            //                     icon: "error",
            //                     buttonsStyling: false,
            //                     confirmButtonText: "Ok, got it!",
            //                     customClass: {
            //                         confirmButton: "btn fw-bold btn-primary",
            //                     }
            //                 });
            //             }
            //         });
            //     });
            // }

            // Toggle toolbars
            var toggleToolbars = function() {
                // Define variables
                const container = document.querySelector('#kt_datatable_example_1');
                const toolbarBase = document.querySelector('[data-kt-docs-table-toolbar="base"]');
                const toolbarSelected = document.querySelector('[data-kt-docs-table-toolbar="selected"]');
                const selectedCount = document.querySelector('[data-kt-docs-table-select="selected_count"]');

                // Select refreshed checkbox DOM elements
                const allCheckboxes = container.querySelectorAll('tbody [type="checkbox"]');

                // Detect checkboxes state & count
                let checkedState = false;
                let count = 0;

                // Count checked boxes
                allCheckboxes.forEach(c => {
                    if (c.checked) {
                        checkedState = true;
                        count++;
                    }
                });

                // Toggle toolbars
                if (checkedState) {
                    selectedCount.innerHTML = count;
                    toolbarBase.classList.add('d-none');
                    toolbarSelected.classList.remove('d-none');
                } else {
                    toolbarBase.classList.remove('d-none');
                    toolbarSelected.classList.add('d-none');
                }
            }

            // Public methods
            return {
                init: function() {
                    initDatatable();
                    handleSearchDatatable();
                    // initToggleToolbar();
                    handleDeleteRows();
                    // handleResetForm();
                }
            }
        }();

        // On document ready
        KTUtil.onDOMContentLoaded(function() {
            KTDatatablesServerSide.init();
        });
    </script>
@endpush
