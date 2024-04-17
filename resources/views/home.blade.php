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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
