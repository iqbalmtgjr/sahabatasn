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
                    <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">Try Out Gratis
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
                    {{-- @foreach ($data as $data) --}}
                        <div class="col-xl-4">
                            <!--begin::Mixed Widget 4-->
                            <div class="card card-xl-stretch mb-5 mb-xl-8">
                                <!--begin::Beader-->
                                <div class="card-header border-0 py-5">
                                    <h3 class="card-title align-items-start flex-column">
                                        <span class="card-label fw-bold fs-3 mb-1">Judul</span>
                                        <span class="text-muted fw-semibold fs-7">Berlaku hingga ..</span>
                                    </h3>
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div class="card-body d-flex flex-column">
                                    <div class="pt-1">
                                        <a href="{{ url('kerjakan') }}" class="btn btn-primary w-100 py-3"><i
                                            class="ki-outline ki-pencil fs-2"></i>Kerjakan</a>
                                    </div>
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Mixed Widget 4-->
                        </div>
                    {{-- @endforeach --}}
                <!--end::Col-->
            </div>
        </div>
    </div>
    {{-- @include('pembayaran.modalvalidasi') --}}
@endsection

{{-- @push('header')
    <link href="{{ asset('') }}assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet"
        type="text/css" />
@endpush --}}

{{-- @push('footer')
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
            var filterPayment;

            // Private functions
            var initDatatable = function() {
                dt = $("#kt_datatable_example_1").DataTable({
                    searchDelay: 500,
                    processing: true,
                    serverSide: true,
                    stateSave: true,
                    select: {
                        style: 'multi',
                        selector: 'td:first-child input[type="checkbox"]',
                        className: 'row-selected'
                    },
                    ajax: {
                        url: "{{ url('/paketsaya') }}",
                    },
                    columns: [{
                            data: 'id'
                        },
                        {
                            data: 'nama_paket'
                        },
                        {
                            data: 'kategori'
                        },
                        {
                            data: 'tipe'
                        },
                        {
                            data: 'jmlh_soal'
                        },
                        {
                            data: 'status'
                        },
                        {
                            data: null
                        },
                    ],
                    order: [
                        [0, 'desc']
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
                            <!--begin::Menu-->
                                <!--begin::Menu item-->
                                    <a href="{{ url('/kerjakan') }}" class="btn btn-sm btn-primary">
                                        Kerjakan Soal
                                    </a>
                                <!--end::Menu item-->
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
                    // toggleToolbars();
                    // handleDeleteRows();
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

            // Toggle toolbars


            // Public methods
            return {
                init: function() {
                    initDatatable();
                    handleSearchDatatable();
                }
            }
        }();

        // On document ready
        KTUtil.onDOMContentLoaded(function() {
            KTDatatablesServerSide.init();
        });
    </script>
@endpush --}}
