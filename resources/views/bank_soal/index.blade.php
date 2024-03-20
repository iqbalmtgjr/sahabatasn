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
                    <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">Bank Soal
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
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-stack mb-5">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1">
                            <i class="ki-duotone ki-magnifier fs-1 position-absolute ms-6"><span class="path1"></span><span
                                    class="path2"></span></i>
                            <input type="text" data-kt-docs-table-filter="search"
                                class="form-control form-control-solid w-250px ps-15" placeholder="Search Customers" />
                        </div>
                        <!--end::Search-->

                        <!--begin::Toolbar-->
                        <div class="d-flex justify-content-end" data-kt-docs-table-toolbar="base">
                            <!--begin::Filter-->
                            <button type="button" class="btn btn-light-primary me-3" data-bs-toggle="tooltip"
                                title="Coming Soon">
                                <i class="ki-duotone ki-filter fs-2"><span class="path1"></span><span
                                        class="path2"></span></i>
                                Filter
                            </button>
                            <!--end::Filter-->

                            <!--begin::Add customer-->
                            <button type="button" class="btn btn-primary" data-bs-toggle="tooltip" title="Coming Soon">
                                <i class="ki-duotone ki-plus fs-2"></i>
                                Add Customer
                            </button>
                            <!--end::Add customer-->
                        </div>
                        <!--end::Toolbar-->

                        <!--begin::Group actions-->
                        <div class="d-flex justify-content-end align-items-center d-none"
                            data-kt-docs-table-toolbar="selected">
                            <div class="fw-bold me-5">
                                <span class="me-2" data-kt-docs-table-select="selected_count"></span> Selected
                            </div>

                            <button type="button" class="btn btn-danger" data-bs-toggle="tooltip" title="Coming Soon">
                                Selection Action
                            </button>
                        </div>
                        <!--end::Group actions-->
                    </div>
                    <!--end::Wrapper-->

                    <!--begin::Datatable-->
                    <table id="kt_datatable_example_1" class="table align-middle table-row-dashed fs-6 gy-5">
                        <thead>
                            <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                <th class="w-10px pe-2">
                                    <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                        <input class="form-check-input" type="checkbox" data-kt-check="true"
                                            data-kt-check-target="#kt_datatable_example_1 .form-check-input"
                                            value="1" />
                                    </div>
                                </th>
                                <th>Customer Name</th>
                                <th>Email</th>
                                <th>Company</th>
                                <th>Payment Method</th>
                                <th>Created Date</th>
                                <th class="text-end min-w-100px">Actions</th>
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
    <script src="{{ asset('') }}assets/js/custom/apps/user-management/users/list/table.js"></script>
    <script src="{{ asset('') }}assets/js/custom/apps/user-management/users/list/add.js"></script>
    <script src="{{ asset('') }}assets/js/custom/apps/user-management/users/list/edit.js"></script>
    <script src="{{ asset('') }}assets/js/widgets.bundle.js"></script>
    <script src="{{ asset('') }}assets/js/custom/widgets.js"></script>
@endpush
