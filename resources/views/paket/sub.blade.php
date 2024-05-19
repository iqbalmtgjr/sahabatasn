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
                        <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">Daftar
                            Paket {{ isset($data[0]->subpaket->judul) ? $data[0]->subpaket->judul : '' }}
                        </h1>
                        <!--end::Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ url('paket/utama') }}" class="text-muted text-hover-primary">Daftar Paket</a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">Daftar Sub Paket</li>
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page title-->
                    <!--begin::Actions-->
                    <!--end::Actions-->
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
                    <!--begin::Card header-->
                    <div class="card-header border-0 pt-6">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <!--begin::Search-->
                            <div class="d-flex align-items-center position-relative my-1">
                                <i class="ki-duotone ki-magnifier fs-1 position-absolute ms-6"><span
                                        class="path1"></span><span class="path2"></span></i>
                                <input type="text" data-kt-docs-table-filter="search"
                                    class="form-control form-control-solid w-250px ps-15" placeholder="Cari Soal" />
                            </div>
                            <!--end::Search-->
                        </div>
                        <!--begin::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                            <!--begin::Toolbar-->
                            {{-- <div class="w-100 mw-250px">
                                <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                    data-placeholder="-- Pilih Sub Kategori --" data-kt-subkategori-filter="subkategori">
                                    <option></option>
                                    <option value="all">Semua</option>
                                    @foreach ($sub_kategori as $item)
                                        <option value="{{ $item->sub_kategori }}">{{ $item->sub_kategori }}</option>
                                    @endforeach
                                </select>
                            </div> --}}
                            <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                                <!--begin::Add user-->
                                <button onclick="getdata({{ $id }})" type="button" class="btn btn-primary"
                                    data-bs-toggle="modal" data-bs-target="#sub">
                                    <i class="ki-outline ki-plus fs-2"></i>Tambah Sub</button>
                                <!--end::Add user-->
                            </div>
                        </div>
                        <!--end::Card toolbar-->
                        <!--begin::Modal - Add task-->
                        @include('paket.modal.sub')
                        <!--end::Modal - Add task-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body py-4">
                        <!--begin::Table-->
                        <!--begin::Datatable-->
                        <table id="kt_datatable_example_1" class="table align-middle table-row-dashed fs-6 gy-5">
                            <thead>
                                <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                    <th></th>
                                    <th class="w-10px pe-2">No</th>
                                    <th>Sub Paket</th>
                                    <th class="text-end min-w-100px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 fw-semibold">
                            </tbody>
                        </table>
                        <!--end::Datatable-->
                        <!--end::Table-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
@endsection
{{-- @push('footer')
    <script>
        // const button = document.getElementByClassName('hapus');

        $('#kt_datatable_example_1').on('click', '.hapus', function() {
            let data = $(this).data()
            let Id = data.id
            let Soal = data.soal

            Swal.fire({
                    title: 'Yakin?',
                    text: "Mau Hapus Soal " + Soal + "?",
                    icon: "warning",
                    buttonsStyling: false,
                    showCancelButton: true,
                    confirmButtonText: "Yakin, hapus!",
                    cancelButtonText: 'Tidak, batal',
                    customClass: {
                        confirmButton: "btn btn-primary",
                        cancelButton: 'btn btn-danger'
                    }
                })
                .then((result) => {
                    console.log(result);
                    if (result.value) {
                        window.location = `{{ url('/subpaket/soal/hapus/') }}/${Id}`;
                    }
                });
        });
    </script>
@endpush --}}
@push('header')
    <link href="{{ asset('') }}assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet"
        type="text/css" />

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endpush

@push('footer')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $('.pembahasan').summernote({
            placeholder: 'Masukkan pembahasan',
            tabsize: 2,
            height: 200
        });
    </script>
    <script src="{{ asset('') }}assets/plugins/custom/datatables/datatables.bundle.js"></script>
    <script src="{{ asset('') }}assets/js/widgets.bundle.js"></script>
    <script src="{{ asset('') }}assets/js/custom/widgets.js"></script>
    {{-- <script src="{{ asset('') }}assets/js/custom/apps/ecommerce/catalog/products.js"></script> --}}
    <script>
        "use strict";

        // Class definition
        var KTDatatablesServerSide = function() {
            // Shared variables
            var table;
            var dt;
            const Id = {{ $id }}
            // console.log(Id);

            // Private functions
            var initDatatable = function() {
                dt = $("#kt_datatable_example_1").DataTable({
                    searchDelay: 500,
                    processing: true,
                    serverSide: true,
                    order: [
                        [0, 'desc'] // Mengubah indeks kolom untuk pengurutan dari 0 menjadi 1
                    ],
                    stateSave: true,
                    select: {
                        style: 'multi',
                        selector: 'td:first-child input[type="checkbox"]',
                        className: 'row-selected'
                    },
                    ajax: {
                        url: `{{ url('/paket/utama/sub/') }}/${Id} }}`,
                    },
                    columns: [{
                            data: 'id',
                            visible: false
                        },
                        {
                            data: null,
                            render: function(data, type, full, meta) {
                                return meta.row + meta.settings._iDisplayStart + 1;
                            }
                        },
                        {
                            data: 'subpaket'
                        },
                        {
                            data: null
                        },
                    ],
                    columnDefs: [{
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
                                
                                <div class="menu-item px-3">
                                    <a href="#" data-id="${row['id']}" class="menu-link px-3" data-kt-docs-table-filter="delete_row">
                                        Hapus
                                    </a>
                                </div>
                            </div>
                            <!--end::Menu-->
                        `;
                        },
                    }, ],
                });

                table = dt.$;

                dt.on('draw', function() {
                    toggleToolbars();
                    handleDeleteRows();
                    // handleKategoriFilter();
                    handleSubKategoriFilter();
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

            // var handleKategoriFilter = () => {
            //     const kategoriFilterElement = document.querySelector(
            //         '[data-kt-kategori-filter="kategori"]');

            //     $(kategoriFilterElement).on("change", (event) => {
            //         let kategori = event.target.value;
            //         kategori === "all" && (kategori = "");
            //         dt.column(3).search(kategori).draw();
            //     });
            // };

            var handleSubKategoriFilter = () => {
                const subKategoriFilterElement = document.querySelector(
                    '[data-kt-subkategori-filter="subkategori"]');

                $(subKategoriFilterElement).on("change", (event) => {
                    let subKategori = event.target.value;
                    subKategori === "all" && (subKategori = "");
                    dt.column(4).search(subKategori).draw();
                });
            };

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
                        const soal = parent.querySelectorAll('td')[1].innerText;
                        let data = $(this).data()
                        let Id = data.id;

                        // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
                        Swal.fire({
                            text: "Yakin ingin menghapus sub paket " + soal + "?",
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
                                    text: "Menghapus " + soal,
                                    icon: "info",
                                    buttonsStyling: false,
                                    showConfirmButton: false,
                                    timer: 2000
                                }).then(function() {
                                    Swal.fire({
                                        text: "Data soal " +
                                            soal + " terhapus !.",
                                        icon: "success",
                                        buttonsStyling: false,
                                        confirmButtonText: "Ok, mengerti!",
                                        customClass: {
                                            confirmButton: "btn fw-bold btn-primary",
                                        }
                                    }).then(function() {
                                        window.location =
                                            `{{ url('/paket/utama/sub/hapus') }}/${Id}`;
                                        dt.draw();
                                    });
                                });
                            } else if (result.dismiss === 'cancel') {
                                Swal.fire({
                                    text: "Soal " + soal +
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

            // var handleFilterDatatable = () => {
            //     // Select filter options
            //     filterPayment = document.querySelectorAll(
            //         '[data-kt-docs-table-filter="payment_type"] [name="payment_type"]');
            //     const filterButton = document.querySelector('[data-kt-docs-table-filter="filter"]');

            //     // Filter datatable on submit
            //     filterButton.addEventListener('click', function() {
            //         // Get filter values
            //         let paymentValue = '';

            //         // Get payment value
            //         filterPayment.forEach(r => {
            //             if (r.checked) {
            //                 paymentValue = r.value;
            //             }

            //             // Reset payment value if "All" is selected
            //             if (paymentValue === 'all') {
            //                 paymentValue = '';
            //             }
            //         });

            //         // Filter datatable --- official docs reference: https://datatables.net/reference/api/search()
            //         dt.search(paymentValue).draw();
            //     });
            // }


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
                const selectedCount = document.querySelector(
                    '[data-kt-docs-table-select="selected_count"]');

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
                // if (checkedState) {
                //     selectedCount.innerHTML = count;
                //     toolbarBase.classList.add('d-none');
                //     toolbarSelected.classList.remove('d-none');
                // } else {
                //     toolbarBase.classList.remove('d-none');
                //     toolbarSelected.classList.add('d-none');
                // }
            }

            // Public methods
            return {
                init: function() {
                    initDatatable();
                    handleSearchDatatable();
                    // handleKategoriFilter();
                    handleSubKategoriFilter();
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
