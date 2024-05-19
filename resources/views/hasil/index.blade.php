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
                    <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">Hasil
                        Tryout
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
            <div class="alert alert-primary p-5">
                <!--begin::Wrapper-->
                {{-- <div class="d-flex flex-column"> --}}
                <div class="row d-flex flex-wrap justify-content-start">
                    <div class="col-4">
                        <table class="table table-borderless align-start">
                            <tbody>
                                <tr>
                                    <td class="text-start">TWK</td>
                                    <td class="text-start">: <strong>65</strong></td>
                                </tr>
                                <tr>
                                    <td class="text-start">Total Nilai</td>
                                    <td class="text-start">: <strong>550</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-4">
                        <table class="table table-borderless align-middle">
                            <tbody>
                                <tr>
                                    <td class="text-start">TIU</td>
                                    <td class="text-start">: <strong>80</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-4">
                        <table class="table table-borderless align-middle">
                            <tbody>
                                <tr>
                                    <td class="text-start">TKP</td>
                                    <td class="text-start">: <strong>166</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                </table>
                {{-- </div> --}}
                <!--end::Wrapper-->
            </div>
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card body-->
                <div class="card-body py-4">
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-stack mb-5">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1">
                            <i class="ki-duotone ki-magnifier fs-1 position-absolute ms-6"><span class="path1"></span><span
                                    class="path2"></span></i>
                            <input type="text" data-kt-docs-table-filter="search"
                                class="form-control form-control-solid w-250px ps-15" placeholder="Cari Hasil Tryout" />
                        </div>
                        <!--end::Search-->
                    </div>
                    <!--end::Wrapper-->

                    <!--begin::Datatable-->
                    <table id="kt_datatable_example_1" class="table align-middle table-row-dashed fs-6 gy-5">
                        <thead>
                            <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                <th></th>
                                <th class="w-10px pe-2">No</th>
                                <th>Paket Tryout</th>
                                <th>Tanggal Mengerjakan</th>
                                <th>Skor TWK</th>
                                <th>Skor TIU</th>
                                <th>Skor TKP</th>
                                <th>Min Pass Grade</th>
                                <th>Skor Akhir</th>
                                <th>Pembahasan</th>
                                <th>Lulus</th>
                                {{-- <th class="text-end min-w-100px">Aksi</th> --}}
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 fw-semibold">
                        </tbody>
                    </table>
                    <!--end::Datatable-->
                </div>
            </div>
        </div>
    </div>
@endsection

@push('header')
    <link href="{{ asset('') }}assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet"
        type="text/css" />
@endpush

@push('footer')
    <script src="{{ asset('') }}assets/plugins/custom/datatables/datatables.bundle.js"></script>
    <script src="{{ asset('') }}assets/js/widgets.bundle.js"></script>
    <script src="{{ asset('') }}assets/js/custom/widgets.js"></script>

    <script>
        "use strict";

        // Class definition
        var KTDatatablesServerSide = function() {
            // Shared variables
            var table;
            var dt;

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
                        url: "{{ url('/hasil') }}",
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
                            data: 'paket_id'
                        },
                        {
                            data: 'tgl_kerja'
                        },
                        {
                            data: 'twk'
                        },
                        {
                            data: 'tiu'
                        },
                        {
                            data: 'tkp'
                        },
                        {
                            data: 'min_grade'
                        },
                        {
                            data: 'skor'
                        },
                        {
                            data: 'pembahasan'
                        },
                        {
                            data: 'lulus'
                        },
                    ],
                    // Add data-filter attribute
                });

                table = dt.$;

                // Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
                dt.on('draw', function() {
                    // initToggleToolbar();
                    // toggleToolbars();
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
                            text: "Yakin ingin menghapus kategori " + customerName + "?",
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
                                        text: "Data kategori " +
                                            customerName + " terhapus !.",
                                        icon: "success",
                                        buttonsStyling: false,
                                        confirmButtonText: "Ok, mengerti!",
                                        customClass: {
                                            confirmButton: "btn fw-bold btn-primary",
                                        }
                                    }).then(function() {
                                        window.location =
                                            `{{ url('/kategori/hapus/') }}/${Id}`;
                                        dt.draw();
                                    });
                                });
                            } else if (result.dismiss === 'cancel') {
                                Swal.fire({
                                    text: "Kategori " + customerName +
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
            var handleResetForm = () => {
                // Select reset button
                const resetButton = document.querySelector('[data-kt-docs-table-filter="reset"]');

                // Reset datatable
                resetButton.addEventListener('click', function() {
                    // Reset payment type
                    filterPayment[0].checked = true;

                    // Reset datatable --- official docs reference: https://datatables.net/reference/api/search()
                    dt.search('').draw();
                });
            }

            // Init toggle toolbar
            var initToggleToolbar = function() {
                // Toggle selected action toolbar
                // Select all checkboxes
                const container = document.querySelector('#kt_datatable_example_1');
                const checkboxes = container.querySelectorAll('[type="checkbox"]');

                // Select elements
                // const deleteSelected = document.querySelector('[data-kt-docs-table-select="delete_selected"]');

                // Toggle delete selected toolbar
                checkboxes.forEach(c => {
                    // Checkbox on click event
                    c.addEventListener('click', function() {
                        setTimeout(function() {
                            toggleToolbars();
                        }, 50);
                    });
                });

                // Deleted selected rows
                // deleteSelected.addEventListener('click', function() {
                //     // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
                //     Swal.fire({
                //         text: "Are you sure you want to delete selected customers?",
                //         icon: "warning",
                //         showCancelButton: true,
                //         buttonsStyling: false,
                //         showLoaderOnConfirm: true,
                //         confirmButtonText: "Yes, delete!",
                //         cancelButtonText: "No, cancel",
                //         customClass: {
                //             confirmButton: "btn fw-bold btn-danger",
                //             cancelButton: "btn fw-bold btn-active-light-primary"
                //         },
                //     }).then(function(result) {
                //         if (result.value) {
                //             // Simulate delete request -- for demo purpose only
                //             Swal.fire({
                //                 text: "Deleting selected customers",
                //                 icon: "info",
                //                 buttonsStyling: false,
                //                 showConfirmButton: false,
                //                 timer: 2000
                //             }).then(function() {
                //                 Swal.fire({
                //                     text: "You have deleted all selected customers!.",
                //                     icon: "success",
                //                     buttonsStyling: false,
                //                     confirmButtonText: "Ok, got it!",
                //                     customClass: {
                //                         confirmButton: "btn fw-bold btn-primary",
                //                     }
                //                 }).then(function() {
                //                     // delete row data from server and re-draw datatable
                //                     dt.draw();
                //                 });

                //                 // Remove header checked box
                //                 const headerCheckbox = container.querySelectorAll(
                //                     '[type="checkbox"]')[0];
                //                 headerCheckbox.checked = false;
                //             });
                //         } else if (result.dismiss === 'cancel') {
                //             Swal.fire({
                //                 text: "Selected customers was not deleted.",
                //                 icon: "error",
                //                 buttonsStyling: false,
                //                 confirmButtonText: "Ok, got it!",
                //                 customClass: {
                //                     confirmButton: "btn fw-bold btn-primary",
                //                 }
                //             });
                //         }
                //     });
                // });
            }

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
