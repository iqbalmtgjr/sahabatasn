<div>
    <div id="kt_app_toolbar" class="app-toolbar pt-7 pt-lg-10">
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex align-items-stretch">
            <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                    <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">
                        Soal-soal
                        {{ $datas[0]->kategori_id == 1 || $datas[0]->kategori_id == 2 || $datas[0]->kategori_id == 3 ? 'CPNS' : 'PPPK' }}
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-fluid">
            <div class="stepper stepper-pills stepper-column d-flex flex-column flex-xl-row flex-row-fluid gap-10"
                id="kt_create_account_stepper">
                <div class="card d-flex flex-row-fluid flex-center">
                    <form class="card-body w-100 px-9" id="kt_create_account_form">
                        {{-- @csrf --}}

                        <div class="d-flex justify-content-between">
                            <h3 class="text-primary">Soal
                                {{ $datas[$currentStep - 1]->kategori->kategori }}
                                {{ $datas[$currentStep - 1]->subkategori->sub_kategori }}</h3>
                            <div class="row text-end ">
                                <div class="col-3 text-end">
                                    <i class="text-primary ki-outline ki-time fs-2"></i>
                                </div>
                                <div class="col-9 text-start" wire:ignore>
                                    <h3 id="countdown" class="d-flex"></h3>
                                </div>
                            </div>
                        </div>
                        <hr>
                        @for ($i = 0; $i < $totalSteps; $i++)
                            <div wire:key='{{ $datas[$i]->id }}'
                                class="{{ $currentStep == $i + 1 ? 'current' : ($currentStep > $i + 1 ? 'pending' : '') }}"
                                data-kt-stepper-element="content">
                                <div class="w-100">
                                    <div class="pb-5 pb-lg-5">
                                        <h2 class="fw-bold d-flex align-items-center text-dark">
                                            #{{ $i + 1 }}. {{ $datas[$i]->soal }}
                                        </h2>
                                    </div>
                                    <!-- Jawaban -->
                                    {{-- <input type="hidden" name="banksoal_id" value="{{ $datas[$i]->id }}">
                                        <input type="hidden" name="subkategori_id"
                                            value="{{ $datas[$i]->subkategori_id }}">
                                        <input type="hidden" name="jawaban_id" value="{{ $datas[$i]->jawaban->id }}">
                                        <input type="hidden" name="step_total" value="{{ $totalSteps }}"> --}}
                                    <div class="form-check form-check-custom form-check-solid" style="margin-top: 10px">
                                        {{-- {{ dd($jawabann) }} --}}
                                        <input
                                            wire:click="simpan('{{ $datas[$i]->jawaban->pilihan_a }}',{{ $datas[$i]->jawaban->id }})"
                                            class="form-check-input" type="radio" name="jawaban_{{ $i + 1 }}"
                                            id="flexRadioDefault1"
                                            {{ ($jawabann[$i] ?? null ? $jawabann[$i]->jawab : null) == ($datas[$i]->jawaban->pilihan_a ?? null) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            <strong
                                                style="font-size: 15px">{{ $datas[$i]->jawaban->pilihan_a }}</strong>
                                        </label>
                                    </div>
                                    <div class="form-check form-check-custom form-check-solid" style="margin-top: 10px">
                                        <input
                                            wire:click="simpan('{{ $datas[$i]->jawaban->pilihan_b }}',{{ $datas[$i]->jawaban->id }})"
                                            class="form-check-input" type="radio" name="jawaban_{{ $i + 1 }}"
                                            id="flexRadioDefault2"
                                            value="{{ $datas[$i]->jawaban->pilihan_b != null ? $datas[$i]->jawaban->pilihan_b : old('jawaban_' . $i + 1) }}"
                                            {{ ($jawabann[$i] ?? null ? $jawabann[$i]->jawab : null) == $datas[$i]->jawaban->pilihan_b ? 'checked' : '' }}>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            <strong
                                                style="font-size: 15px">{{ $datas[$i]->jawaban->pilihan_b }}</strong>
                                        </label>
                                    </div>
                                    <div class="form-check form-check-custom form-check-solid" style="margin-top: 10px">
                                        <input
                                            wire:click="simpan('{{ $datas[$i]->jawaban->pilihan_c }}',{{ $datas[$i]->jawaban->id }})"
                                            class="form-check-input" type="radio" name="jawaban_{{ $i + 1 }}"
                                            id="flexRadioDefault3"
                                            value="{{ $datas[$i]->jawaban->pilihan_c != null ? $datas[$i]->jawaban->pilihan_c : old('jawaban_' . $i + 1) }}"
                                            {{ ($jawabann[$i] ?? null ? $jawabann[$i]->jawab : null) == ($datas[$i]->jawaban->pilihan_c ?? null) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="flexRadioDefault3">
                                            <strong
                                                style="font-size: 15px">{{ $datas[$i]->jawaban->pilihan_c }}</strong>
                                        </label>
                                    </div>
                                    <div class="form-check form-check-custom form-check-solid" style="margin-top: 10px">
                                        <input
                                            wire:click="simpan('{{ $datas[$i]->jawaban->pilihan_d }}',{{ $datas[$i]->jawaban->id }})"
                                            class="form-check-input" type="radio" name="jawaban_{{ $i + 1 }}"
                                            id="flexRadioDefault4"
                                            value="{{ $datas[$i]->jawaban->pilihan_d != null ? $datas[$i]->jawaban->pilihan_d : old('jawaban_' . $i + 1) }}"
                                            {{ ($jawabann[$i] ?? null ? $jawabann[$i]->jawab : null) == ($datas[$i]->jawaban->pilihan_d ?? null) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="flexRadioDefault4">
                                            <strong
                                                style="font-size: 15px">{{ $datas[$i]->jawaban->pilihan_d }}</strong>
                                        </label>
                                    </div>
                                    @if ($datas[$i]->jawaban->pilihan_e != null)
                                        <div class="form-check form-check-custom form-check-solid"
                                            style="margin-top: 10px">
                                            <input
                                                wire:click="simpan('{{ $datas[$i]->jawaban->pilihan_e }}',{{ $datas[$i]->jawaban->id }})"
                                                class="form-check-input" type="radio"
                                                name="jawaban_{{ $i + 1 }}" id="flexRadioDefault5"
                                                value="{{ $datas[$i]->jawaban->pilihan_e != null ? $datas[$i]->jawaban->pilihan_e : old('jawaban_' . $i + 1) }}"
                                                {{ ($jawabann[$i] ?? null ? $jawabann[$i]->jawab : null) == ($datas[$i]->jawaban->pilihan_e ?? null) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="flexRadioDefault5">
                                                <strong
                                                    style="font-size: 15px">{{ $datas[$i]->jawaban->pilihan_e }}</strong>
                                            </label>
                                        </div>
                                    @endif
                                </div>

                                {{-- <button wire:click="delete({{ $jawabann[0]->id }})" type="button"
                                    class="btn btn-lg btn-light-primary me-3">
                                    Reset
                                </button> --}}
                            </div>
                            {{-- @endif --}}
                        @endfor

                        <!--begin::Actions-->
                        <div class="d-flex flex-stack pt-10">
                            <!--begin::Wrapper-->
                            @if ($currentStep > 1 && $currentStep <= $totalSteps)
                                <div class="mr-2">
                                    <button wire:click="previousStep" type="button"
                                        class="btn btn-lg btn-light-primary me-3">
                                        <i class="ki-outline ki-arrow-left fs-4 me-1"></i>Kembali</button>
                                </div>
                            @else
                                <div class="mr-2">
                                </div>
                            @endif
                            <!--end::Wrapper-->
                            <!--begin::Wrapper-->
                            <div>
                                @if ($currentStep == $totalSteps)
                                    <button wire:click='submit' type="button" class="btn btn-lg btn-primary me-3">
                                        <span class="indicator-label">Selesai
                                            <i class="ki-outline ki-arrow-right fs-3 ms-2 me-0"></i></span>
                                        <span class="indicator-progress">Mohon tunggu...
                                            <span
                                                class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>
                                @endif
                                @if ($currentStep != $totalSteps)
                                    <button wire:click="nextStep" data-kt-stepper-action="next" type="button"
                                        class="btn btn-lg btn-primary">Selanjutnya
                                        <i class="ki-outline ki-arrow-right fs-4 ms-1 me-0"></i></button>
                                @endif
                            </div>

                            <!--end::Wrapper-->
                            {{-- <button type="submit" class="btn btn-lg btn-primary me-3">
                                <span class="indicator-label">Selesai
                                    <i class="ki-outline ki-arrow-right fs-3 ms-2 me-0"></i></span>
                                <span class="indicator-progress">Mohon Tunggu...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button> --}}
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
                                <div class="stepper-item {{ $currentStep == $i + 1 ? 'current' : '' }} col-2 mb-5"
                                    data-kt-stepper-element="nav">
                                    <div class="stepper-wrapper">
                                        <a href="javascript:void(0)" wire:click="setStep({{ $i + 1 }})">
                                            <div class="stepper-icon w-40px h-40px">
                                                <span style="font-size: 20px; font-weight: bold; color: #ffffff"
                                                    class="ki-outline ki-check fs-2 stepper-check">{{ $i + 1 }}</span>
                                                <span class="stepper-number">{{ $i + 1 }}</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endfor
                            <!--begin::Step 5-->
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
            // Fungsi untuk memulai countdown
            function startCountdown() {
                let paketId = {{ $paketId }}
                let menit = {{ $paketSaya->paket->waktu }};
                console.log(menit);
                let countdown = menit * 60;
                const countdownElement = document.getElementById('countdown');
                const countdownKey = 'countdown_' + paketId;

                // Ambil countdown dari localStorage berdasarkan paketId
                const storedCountdown = localStorage.getItem(countdownKey);
                if (storedCountdown && parseInt(storedCountdown) > 0) {
                    countdown = parseInt(storedCountdown);
                } else {
                    countdown = menit * 60;
                    localStorage.setItem(countdownKey, countdown);
                }

                const interval = setInterval(() => {
                    if (countdown > 0) {
                        let hours = Math.floor(countdown / 3600);
                        let minutes = Math.floor((countdown % 3600) / 60);
                        let seconds = countdown % 60;

                        countdownElement.textContent =
                            `${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;

                        countdown--;
                        localStorage.setItem(countdownKey, countdown);
                    } else {
                        clearInterval(interval);
                        countdown = 0;
                        countdownElement.textContent = '00:00:00';
                        localStorage.removeItem(countdownKey);
                        toastr.error('Waktu habis, silahkan klik tombol Selesai', 'Waktu habis');
                    }

                    localStorage.setItem(countdownKey, countdown);
                }, 1000);

                // Simpan intervalId jika Anda perlu menghentikan interval dari luar fungsi ini
                window.addEventListener('beforeunload', () => {
                    if (window.intervalId) {
                        clearInterval(window.intervalId);
                    }
                });
            }

            document.addEventListener('DOMContentLoaded', startCountdown);

            ////////////* Batas *//////////////

            // Fungsi untuk stepper item sebelah kanan ketika klik berubah pertanyaan
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
                    const stepIndex = parseInt(input.name.split('_')[1]) - 1;
                    document.querySelectorAll('.stepper-item').forEach((item, idx) => {
                        if (idx === stepIndex) {
                            const bgColor = window.getComputedStyle(item.querySelector('.stepper-icon'))
                                .backgroundColor;
                            const textColor = getTextColor(bgColor);
                            item.querySelector('.stepper-icon').style.backgroundColor = 'green';
                            // item.querySelector('.stepper-label').style.color = textColor;
                        }
                    });
                });
            });
        </script>
    @endpush
</div>
