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
                    <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">Soal
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
                                <h3>Soal Nomor 1</h3>
                            </div>
                            <hr>
                            <p style="font-size: 15px">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nobis
                                eveniet eum velit cupiditate sed nemo! Incidunt, voluptas magnam numquam dicta, nostrum
                                obcaecati saepe aspernatur aut id facilis, aliquid aliquam aperiam?</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                    id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    <strong style="font-size: 15px">A. alksdjlasdljasd</strong>
                                </label>
                            </div>
                            <div class="form-check my-6">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                    id="flexRadioDefault2">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    <strong style="font-size: 15px">B. aksdhkashdkahsdsd</strong>
                                </label>
                            </div>
                            <div class="form-check my-6">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                    id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    <strong style="font-size: 15px">C. alksdjlasdljasd</strong>
                                </label>
                            </div>
                            <div class="form-check my-6">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                    id="flexRadioDefault2">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    <strong style="font-size: 15px">D. aksdhkashdkahsdsd</strong>
                                </label>
                            </div>
                            <div class="form-check my-6">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                    id="flexRadioDefault2">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    <strong style="font-size: 15px">E. aksdhkashdkahsdsd</strong>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body py-4">
                            <h3>Nomor Soal</h3>
                            <hr>
                            <div class="text-center">
                                <button class="btn btn-secondary text-primary"
                                    style="margin: 2px; padding: 5px 15px; font-size: 10px; width:42px; height:34px">1</button>
                                <button class="btn btn-secondary text-primary"
                                    style="margin: 2px; padding: 5px 15px; font-size: 10px; width:42px; height:34px">2</button>
                                <button class="btn btn-secondary text-primary"
                                    style="margin: 2px; padding: 5px 15px; font-size: 10px; width:42px; height:34px">3</button>
                                <button class="btn btn-secondary text-primary"
                                    style="margin: 2px; padding: 5px 15px; font-size: 10px; width:42px; height:34px">4</button>
                                <button class="btn btn-secondary text-primary"
                                    style="margin: 2px; padding: 5px 15px; font-size: 10px; width:42px; height:34px">5</button>
                                <button class="btn btn-secondary text-primary"
                                    style="margin: 2px; padding: 5px 15px; font-size: 10px; width:42px; height:34px">6</button>
                                <button class="btn btn-secondary text-primary"
                                    style="margin: 2px; padding: 5px 15px; font-size: 10px; width:42px; height:34px">7</button>
                                <button class="btn btn-secondary text-primary"
                                    style="margin: 2px; padding: 5px 15px; font-size: 10px; width:42px; height:34px">8</button>
                                <button class="btn btn-secondary text-primary"
                                    style="margin: 2px; padding: 5px 15px; font-size: 10px; width:42px; height:34px">9</button>
                                <button class="btn btn-secondary text-primary"
                                    style="margin: 2px; padding: 5px 15px; font-size: 10px; width:42px; height:34px">10</button>
                                <button class="btn btn-secondary text-primary"
                                    style="margin: 2px; padding: 5px 15px; font-size: 10px; width:42px; height:34px">11</button>
                                <button class="btn btn-secondary text-primary"
                                    style="margin: 2px; padding: 5px 15px; font-size: 10px; width:42px; height:34px">12</button>
                                <button class="btn btn-secondary text-primary"
                                    style="margin: 2px; padding: 5px 15px; font-size: 10px; width:42px; height:34px">13</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
