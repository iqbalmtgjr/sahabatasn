@extends('layouts.master')

@section('content')
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-fluid">
            <div class="row g-5 g-xl-10">
                <div class="col-xxl-12 mb-md-5 mb-xl-10">
                    <div class="row g-5 g-xl-10">
                        <!--begin::Alert-->
                        <div class="alert alert-success d-flex align-items-center p-5">
                            <!--begin::Icon-->
                            <i class="ki-duotone ki-emoji-happy fs-2hx text-success me-4"><span class="path1"></span><span
                                    class="path2"></span><span class="path3"></span><span class="path4"></span></i>
                            <!--end::Icon-->

                            <!--begin::Wrapper-->
                            <div class="d-flex flex-column">
                                <!--begin::Title-->
                                <h4 class="mb-1 text-dark">Hai {{ Auth::user()->name }}, Selamat Datang di Sahabat ASN</h4>
                                <!--end::Title-->

                                <!--begin::Content-->
                                {{-- <span>The alert component can be used to highlight certain parts of your page for higher content
                            visibility.</span> --}}
                                <!--end::Content-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Alert-->

                        <div class="card border-transparent" data-bs-theme="light" style="background-color: #1C325E;">
                            <!--begin::Body-->
                            <div class="card-body d-flex ps-xl-15">
                                <!--begin::Wrapper-->
                                <div class="m-0">
                                    <!--begin::Title-->
                                    <div class="position-relative fs-2x z-index-2 fw-bold text-white mb-7">
                                    <span class="me-2">You have got
                                    <span class="position-relative d-inline-block text-danger">
                                        <a href="../../demo38/dist/pages/user-profile/overview.html" class="text-danger opacity-75-hover">2300 bonus</a>
                                        <!--begin::Separator-->
                                        <span class="position-absolute opacity-50 bottom-0 start-0 border-4 border-danger border-bottom w-100"></span>
                                        <!--end::Separator-->
                                    </span></span>points.
                                    <br>Feel free to use them in your lessons</div>
                                    <!--end::Title-->
                                    <!--begin::Action-->
                                    <div class="mb-3">
                                        <a href="#" class="btn btn-danger fw-semibold me-2" data-bs-toggle="modal" data-bs-target="#kt_modal_upgrade_plan">Get Reward</a>
                                        <a href="../../demo38/dist/apps/support-center/overview.html" class="btn btn-color-white bg-white bg-opacity-15 bg-hover-opacity-25 fw-semibold">How to</a>
                                    </div>
                                    <!--begin::Action-->
                                </div>
                                <!--begin::Wrapper-->
                                <!--begin::Illustration-->
                                <img src="assets/media/illustrations/sigma-1/17-dark.png" class="position-absolute me-3 bottom-0 end-0 h-200px" alt="">
                                <!--end::Illustration-->
                            </div>
                            <!--end::Body-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
