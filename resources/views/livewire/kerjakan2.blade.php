<div>
    <div id="kt_app_toolbar" class="app-toolbar pt-7 pt-lg-10">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex align-items-stretch">
            <!--begin::Toolbar wrapper-->
            <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">
                        Soal-soal
                        {{-- {{ $data->subkategori->sub_kategori }} --}}
                    </h1>
                    <!--end::Title-->
                </div>
                <!--end::Page title-->
            </div>
            <!--end::Toolbar wrapper-->
        </div>
        <!--end::Toolbar container-->
    </div>

    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-fluid">
            <div class="stepper stepper-pills stepper-column d-flex flex-column flex-xl-row flex-row-fluid gap-10"
                id="kt_create_account_stepper">
                <div class="card d-flex flex-row-fluid flex-center">
                    <!--begin::Form-->
                    <form class="card-body w-100 px-9" id="kt_create_account_form" method="POST"
                        action="{{ url('/kerjakan/post') }}">
                        @csrf
                        {{-- <h3 class="text-primary">{{ $datas[$i]->subkategori->sub_kategori }}</h3>
                        <hr> --}}

                        {{-- <div class="d-flex justify-content-end">
                        </div>
                        <hr> --}}
                        @for ($i = 0; $i < $totalSteps; $i++)
                            {{-- {{ $i }} <br> --}}
                            {{-- step 1 --}}
                            {{-- @php
                                $hasil = $currentStep - 1 + $i;
                            @endphp --}}
                            {{-- @dd($hasil); --}}
                            <div class=" {{ $i == 0 ? 'current' : '' }}" data-kt-stepper-element="content">

                                <!--begin::Wrapper-->
                                <div class="w-100">
                                    <!--begin::Heading-->
                                    <div class="pb-5 pb-lg-5">
                                        <!--begin::Title-->
                                        <h2 class="fw-bold d-flex align-items-center text-dark">
                                            #{{ $i + 1 }}. {{ $datas[$i]->soal }}
                                        </h2>
                                        <!--end::Title-->
                                    </div>
                                    <!-- Jawaban -->
                                    <input type="hidden" name="banksoal_id" value="{{ $datas[$i]->id }}">
                                    <input type="hidden" name="subkategori_id"
                                        value="{{ $datas[$i]->subkategori_id }}">
                                    <input type="hidden" name="jawaban_id" value="{{ $datas[$i]->jawaban->id }}">
                                    <input type="hidden" name="step_total" value="{{ $totalSteps }}">
                                    <div class="form-check form-check-custom form-check-solid" style="margin-top: 10px">
                                        <input class="form-check-input" type="radio"
                                            name="jawaban_{{ $i + 1 }}" id="flexRadioDefault1"
                                            value="{{ $datas[$i]->jawaban->pilihan_a }}">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            <strong
                                                style="font-size: 15px">{{ $datas[$i]->jawaban->pilihan_a }}</strong>
                                        </label>
                                    </div>
                                    <div class="form-check form-check-custom form-check-solid" style="margin-top: 10px">
                                        <input class="form-check-input" type="radio"
                                            name="jawaban_{{ $i + 1 }}" id="flexRadioDefault2"
                                            value="{{ $datas[$i]->jawaban->pilihan_b }}">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            <strong
                                                style="font-size: 15px">{{ $datas[$i]->jawaban->pilihan_b }}</strong>
                                        </label>
                                    </div>
                                    <div class="form-check form-check-custom form-check-solid" style="margin-top: 10px">
                                        <input class="form-check-input" type="radio"
                                            name="jawaban_{{ $i + 1 }}" id="flexRadioDefault3"
                                            value="{{ $datas[$i]->jawaban->pilihan_c }}">
                                        <label class="form-check-label" for="flexRadioDefault3">
                                            <strong
                                                style="font-size: 15px">{{ $datas[$i]->jawaban->pilihan_c }}</strong>
                                        </label>
                                    </div>
                                    <div class="form-check form-check-custom form-check-solid" style="margin-top: 10px">
                                        <input class="form-check-input" type="radio"
                                            name="jawaban_{{ $i + 1 }}" id="flexRadioDefault4"
                                            value="{{ $datas[$i]->jawaban->pilihan_d }}">
                                        <label class="form-check-label" for="flexRadioDefault4">
                                            <strong
                                                style="font-size: 15px">{{ $datas[$i]->jawaban->pilihan_d }}</strong>
                                        </label>
                                    </div>
                                    @if ($datas[$i]->jawaban->pilihan_e != null)
                                        <div class="form-check form-check-custom form-check-solid"
                                            style="margin-top: 10px">
                                            <input class="form-check-input" type="radio"
                                                name="jawaban_{{ $i + 1 }}" id="flexRadioDefault5"
                                                value="{{ $datas[$i]->jawaban->pilihan_e }}">
                                            <label class="form-check-label" for="flexRadioDefault5">
                                                <strong
                                                    style="font-size: 15px">{{ $datas[$i]->jawaban->pilihan_e }}</strong>
                                            </label>
                                        </div>
                                    @endif
                                    <!--end::Heading-->
                                    <!--begin::Input group-->
                                    <!--end::Input group-->
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            {{-- @endif --}}
                        @endfor

                        <!--begin::Actions-->
                        <div class="d-flex flex-stack pt-10">
                            <!--begin::Wrapper-->
                            {{-- <div class="mr-2">
                                <button wire:click="previousStep" type="button"
                                    class="btn btn-lg btn-light-primary me-3" data-kt-stepper-action="previous">
                                    <i class="ki-outline ki-arrow-left fs-4 me-1"></i>Kembali</button>
                            </div>
                            <!--end::Wrapper-->
                            <!--begin::Wrapper-->
                            <div>
                                <button wire:click="nextStep" type="button" class="btn btn-lg btn-primary"
                                data-kt-stepper-action="next">Selanjutnya
                                <i class="ki-outline ki-arrow-right fs-4 ms-1 me-0"></i></button>
                                <button type="submit" class="btn btn-lg btn-primary me-3">
                                    <span class="indicator-label">Selesai
                                        <i class="ki-outline ki-arrow-right fs-3 ms-2 me-0"></i></span>
                                    <span class="indicator-progress">Mohon Tunggu...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                            </div> --}}


                            {{-- @if ($currentStep == 1)
                                <div class="mr-2">
                                    <button wire:click="previousStep" type="button"
                                        class="btn btn-lg btn-light-primary me-3" data-kt-stepper-action="previous">
                                        <i class="ki-outline ki-arrow-left fs-4 me-1"></i>Kembali</button>
                                </div>
                                <div>
                                    <button wire:click="nextStep" type="button" class="btn btn-lg btn-primary"
                                        data-kt-stepper-action="next">Selanjutnya
                                        <i class="ki-outline ki-arrow-right fs-4 ms-1 me-0"></i></button>
                                </div>
                            @elseif($currentStep > 1 && $currentStep != $totalSteps)
                                <div class="mr-2">
                                    <button wire:click="previousStep" type="button"
                                        class="btn btn-lg btn-light-primary me-3" data-kt-stepper-action="previous">
                                        <i class="ki-outline ki-arrow-left fs-4 me-1"></i>Kembali</button>
                                </div>
                                <div>
                                    <button wire:click="nextStep" type="button" class="btn btn-lg btn-primary"
                                        data-kt-stepper-action="next">Selanjutnya
                                        <i class="ki-outline ki-arrow-right fs-4 ms-1 me-0"></i></button>
                                </div>
                            @elseif($currentStep == $totalSteps)
                                <div class="mr-2">
                                    <button wire:click="previousStep" type="button"
                                        class="btn btn-lg btn-light-primary me-3" data-kt-stepper-action="previous">
                                        <i class="ki-outline ki-arrow-left fs-4 me-1"></i>Kembali</button>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-lg btn-primary me-3"
                                        data-kt-stepper-action="submit">
                                        <span class="indicator-label">Selesai
                                            <i class="ki-outline ki-arrow-right fs-3 ms-2 me-0"></i></span>
                                        <span class="indicator-progress">Mohon Tunggu...
                                            <span
                                                class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>
                                </div>
                            @endif --}}
                            <!--end::Wrapper-->
                            <button type="submit" class="btn btn-lg btn-primary me-3">
                                <span class="indicator-label">Selesai
                                    <i class="ki-outline ki-arrow-right fs-3 ms-2 me-0"></i></span>
                                <span class="indicator-progress">Mohon Tunggu...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                        <!--end::Actions-->
                        <!--end::Form-->
                    </form>
                </div>
                <!--begin::Aside-->
                <div
                    class="card d-flex justify-content-center justify-content-xl-start flex-row-auto w-100 w-xl-300px w-xxl-400px">
                    <!--begin::Wrapper-->
                    <div class="row px-4 px-lg-10 px-xxl-10 pt-10">
                        <h3>Nomor Soal</h3>
                    </div>
                    <div class="card-body px-6 px-lg-10 px-xxl-15 py-10">
                        <!--begin::Nav-->

                        <div class="row">
                            {{-- <div class="stepper-nav"> --}}
                            @for ($i = 0; $i < $totalSteps; $i++)
                                <!--begin::Step 1-->
                                <div class="stepper-item {{ $i == 0 ? 'current' : '' }} col-2 mb-5"
                                    data-kt-stepper-element="nav">
                                    <!--begin::Wrapper-->
                                    <div class="stepper-wrapper">
                                        <a href="#">
                                            <div class="stepper-icon w-40px h-40px">
                                                <span style="font-size: 20px; color:white"
                                                    class="stepper-check"><strong>{{ $i + 1 }}</strong> </span>
                                                <span class="stepper-number">{{ $i + 1 }}</span>
                                            </div>
                                        </a>
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                                <!--end::Step 1-->
                            @endfor
                            <!--begin::Step 5-->
                            {{-- <div class="stepper-item mark-completed col-2 mb-5" data-kt-stepper-element="nav">
                                <!--begin::Wrapper-->
                                <div class="stepper-wrapper">
                                    <!--begin::Icon-->
                                    <div class="stepper-icon w-40px h-40px">
                                        <i class="ki-outline ki-check fs-2 stepper-check"></i>
                                        <span class="stepper-number">5</span>
                                    </div>
                                    <!--end::Icon-->
                                </div>
                                <!--end::Wrapper-->
                            </div> --}}
                            <!--end::Step 5-->
                            {{-- </div> --}}
                        </div>

                        <!--end::Nav-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--begin::Aside-->
                <!--begin::Content-->

                <!--end::Content-->
            </div>
        </div>
    </div>

    @push('footer')
        <script>
            // document.querySelector('[data-kt-stepper-action="next"]').addEventListener('click', function() {
            //     if (currentStep) {
            //         currentStep.classList.remove('current');
            //         var nextStep = currentStep.nextElementSibling;
            //         if (nextStep) {
            //             nextStep.classList.add('current');
            //         } else {
            //             document.querySelector('[data-kt-stepper-element="content"]').classList.add('current');
            //         }
            //     }
            // });

            document.querySelectorAll('.stepper-item').forEach((item, index) => {
                item.addEventListener('click', () => {
                    document.querySelectorAll('.stepper-item').forEach((el) => {
                        el.classList.remove('current');
                    });

                    item.classList.add('current');

                    document.querySelectorAll('[data-kt-stepper-element="content"]').forEach((content,
                        contentIndex) => {
                        if (contentIndex === index) {
                            content.classList.add('current');
                        } else {
                            content.classList.remove('current');
                        }
                    });
                });
            });

            document.querySelectorAll('.form-check-input').forEach((input) => {
                input.addEventListener('click', () => {
                    document.querySelectorAll('.stepper-item').forEach((item, idx) => {
                        if (idx === parseInt(input.name.split('_')[1]) - 1) {
                            item.querySelector('.stepper-icon').style.backgroundColor = '#006400';
                        }
                    });
                });
            });
        </script>
        <script src="{{ asset('') }}assets/js/custom/utilities/modals/create-account.js"></script>
        <script src="{{ asset('') }}assets/js/widgets.bundle.js"></script>
        <script src="{{ asset('') }}assets/js/custom/widgets.js"></script>
        <script src="{{ asset('') }}assets/js/custom/apps/chat/chat.js"></script>
        <script src="{{ asset('') }}assets/js/custom/utilities/modals/upgrade-plan.js"></script>
        <script src="{{ asset('') }}assets/js/custom/utilities/modals/create-campaign.js"></script>
        <script src="{{ asset('') }}assets/js/custom/utilities/modals/users-search.js"></script>
    @endpush
</div>
