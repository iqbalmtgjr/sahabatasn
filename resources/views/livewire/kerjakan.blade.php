<div>
    <div id="kt_app_toolbar" class="app-toolbar pt-7 pt-lg-10">
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex align-items-stretch">
            <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                    <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">
                        Soal-soal
                        {{ $datas[0]->subpaket->kategori_id == 1 || $datas[0]->subpaket->kategori_id == 2 || $datas[0]->subpaket->kategori_id == 3 ? 'CPNS' : 'PPPK' }}
                    </h1>
                    <h2>
                        {{ $datas[0]->subpaket->judul }}
                    </h2>
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
                            {{-- @if ($status == 3)
                                <h3 class="text-primary">Soal
                                    {{ $datas[$currentStep - 1]->togratis->kategori->kategori }}
                                    {{ $datas[$currentStep - 1]->togratis->subkategori->sub_kategori }}</h3>
                            @else --}}
                            <h3 class="text-primary">Soal
                                {{ $datas[$currentStep - 1]->banksoal->kategori->kategori }}
                                {{ $datas[$currentStep - 1]->banksoal->subkategori->sub_kategori }}</h3>
                            {{-- @endif --}}
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
                        @foreach ($datas as $i => $item)
                            <div wire:key='{{ $item->banksoal->id }}'
                                class="{{ $currentStep == $i + 1 ? 'current' : ($currentStep > $i + 1 ? 'pending' : '') }}"
                                data-kt-stepper-element="content">
                                <div class="w-100">
                                    <div class="mb-5">
                                        @if ($item->gambar != null)
                                            <img style="width: 250px"
                                                src="{{ asset('gambar_soal') . '/' . $item->banksoal->gambar }}"
                                                alt="gambar_soal">
                                        @endif
                                    </div>
                                    <div class="pb-5 pb-lg-5">

                                        <h2 class="fw-bold d-flex align-items-center text-dark">
                                            {{ $i + 1 }}. {{ $item->banksoal->soal }}
                                        </h2>
                                    </div>
                                    <div class="form-check form-check-custom form-check-solid" style="margin-top: 10px">
                                        <input
                                            wire:click="simpan('{{ $item->banksoal->jawaban->pilihan_a }}',{{ $item->banksoal->jawaban->id }})"
                                            class="form-check-input" type="radio" name="jawaban_{{ $i + 1 }}"
                                            id="flexRadioDefault{{ $i + 1 }}"
                                            {{ isset($item->banksoal->jawaban->simpanjawaban) && $item->banksoal->jawaban->simpanjawaban->jawab === $item->banksoal->jawaban->pilihan_a ? 'checked' : '' }}>
                                        <label class="form-check-label" for="flexRadioDefault{{ $i + 1 }}">
                                            <strong style="font-size: 15px">A.
                                                {{ $item->banksoal->jawaban->pilihan_a }}</strong>
                                        </label>
                                    </div>
                                    <div class="form-check form-check-custom form-check-solid" style="margin-top: 10px">
                                        <input
                                            wire:click="simpan('{{ $item->banksoal->jawaban->pilihan_b }}',{{ $item->banksoal->jawaban->id }})"
                                            class="form-check-input" type="radio" name="jawaban_{{ $i + 1 }}"
                                            id="flexRadioDefault2{{ $i + 1 }}"
                                            value="{{ $item->banksoal->jawaban->pilihan_b != null ? $item->banksoal->jawaban->pilihan_b : old('jawaban_' . $i + 1) }}"
                                            {{ isset($item->banksoal->jawaban->simpanjawaban) && $item->banksoal->jawaban->simpanjawaban->jawab === $item->banksoal->jawaban->pilihan_b ? 'checked' : '' }}>
                                        <label class="form-check-label" for="flexRadioDefault2{{ $i + 1 }}">
                                            <strong style="font-size: 15px">B.
                                                {{ $item->banksoal->jawaban->pilihan_b }}</strong>
                                        </label>
                                    </div>
                                    <div class="form-check form-check-custom form-check-solid" style="margin-top: 10px">
                                        <input
                                            wire:click="simpan('{{ $item->banksoal->jawaban->pilihan_c }}',{{ $item->banksoal->jawaban->id }})"
                                            class="form-check-input" type="radio" name="jawaban_{{ $i + 1 }}"
                                            id="flexRadioDefault3{{ $i + 1 }}"
                                            value="{{ $item->banksoal->jawaban->pilihan_c != null ? $item->banksoal->jawaban->pilihan_c : old('jawaban_' . $i + 1) }}"
                                            {{ isset($item->banksoal->jawaban->simpanjawaban) && $item->banksoal->jawaban->simpanjawaban->jawab === $item->banksoal->jawaban->pilihan_c ? 'checked' : '' }}>
                                        <label class="form-check-label" for="flexRadioDefault3{{ $i + 1 }}">
                                            <strong style="font-size: 15px">C.
                                                {{ $item->banksoal->jawaban->pilihan_c }}</strong>
                                        </label>
                                    </div>
                                    <div class="form-check form-check-custom form-check-solid" style="margin-top: 10px">
                                        <input
                                            wire:click="simpan('{{ $item->banksoal->jawaban->pilihan_d }}',{{ $item->banksoal->jawaban->id }})"
                                            class="form-check-input" type="radio" name="jawaban_{{ $i + 1 }}"
                                            id="flexRadioDefault4{{ $i + 1 }}"
                                            value="{{ $item->banksoal->jawaban->pilihan_d != null ? $item->banksoal->jawaban->pilihan_d : old('jawaban_' . $i + 1) }}"
                                            {{ isset($item->banksoal->jawaban->simpanjawaban) && $item->banksoal->jawaban->simpanjawaban->jawab === $item->banksoal->jawaban->pilihan_d ? 'checked' : '' }}>
                                        <label class="form-check-label" for="flexRadioDefault4{{ $i + 1 }}">
                                            <strong style="font-size: 15px">D.
                                                {{ $item->banksoal->jawaban->pilihan_d }}</strong>
                                        </label>
                                    </div>
                                    @if ($item->banksoal->jawaban->pilihan_e != null)
                                        <div class="form-check form-check-custom form-check-solid"
                                            style="margin-top: 10px">
                                            <input
                                                wire:click="simpan('{{ $item->banksoal->jawaban->pilihan_e }}',{{ $item->banksoal->jawaban->id }})"
                                                class="form-check-input" type="radio"
                                                name="jawaban_{{ $i + 1 }}"
                                                id="flexRadioDefault5{{ $i + 1 }}"
                                                value="{{ $item->banksoal->jawaban->pilihan_e != null ? $item->banksoal->jawaban->pilihan_e : old('jawaban_' . $i + 1) }}"
                                                {{ isset($item->banksoal->jawaban->simpanjawaban) && $item->banksoal->jawaban->simpanjawaban->jawab === $item->banksoal->jawaban->pilihan_e ? 'checked' : '' }}>
                                            <label class="form-check-label" for="flexRadioDefault5{{ $i + 1 }}">
                                                <strong style="font-size: 15px">E.
                                                    {{ $item->banksoal->jawaban->pilihan_e }}</strong>
                                            </label>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach

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
                            <div class="sesai">
                                @if ($currentStep == $totalSteps)
                                    <button type="button" class="btn btn-lg btn-success me-3 selesai">
                                        <span class="indicator-label">Selesai
                                            <i class="ki-outline ki-arrow-right fs-3 ms-2 me-0"></i></span>
                                    </button>
                                @endif
                                @if ($currentStep != $totalSteps)
                                    <button wire:click="nextStep" data-kt-stepper-action="next" type="button"
                                        class="btn btn-lg btn-primary">Selanjutnya
                                        <i class="ki-outline ki-arrow-right fs-4 ms-1 me-0"></i></button>
                                @endif
                            </div>
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
                            @foreach ($datas as $index => $data)
                                <div class="stepper-item {{ $currentStep == $index + 1 ? 'current' : '' }} col-2 mb-5"
                                    data-kt-stepper-element="nav">
                                    <div class="stepper-wrapper">
                                        <a href="javascript:void(0)" wire:click="setStep({{ $index + 1 }})">
                                            {{-- @if ($status == 3)
                                                <div class="stepper-icon w-40px h-40px"
                                                    style="background-color: @if (isset($data->togratis->jawaban->simpanjawaban) && $data->togratis->jawaban->simpanjawaban->togratis_id == $data->banksoal->id) green;
                                                @else @endif">
                                                    <span style="font-size: 20px; font-weight: bold; color: #ffffff"
                                                        class="ki-outline ki-check fs-2 stepper-check">{{ $index + 1 }}</span>
                                                    <span
                                                        class="stepper-number {{ isset($data->togratis->jawaban->simpanjawaban) && $data->togratis->jawaban->simpanjawaban->togratis_id == $data->togratis->id ? 'text-white' : '' }}">{{ $loop->iteration }}</span>
                                                </div>
                                            @else --}}
                                            <div class="stepper-icon w-40px h-40px"
                                                style="background-color: @if (isset($data->banksoal->jawaban->simpanjawaban) &&
                                                        $data->banksoal->jawaban->simpanjawaban->banksoal_id == $data->banksoal->id) green;
                                                @else @endif">
                                                <span style="font-size: 20px; font-weight: bold; color: #ffffff"
                                                    class="ki-outline ki-check fs-2 stepper-check">{{ $index + 1 }}</span>
                                                <span
                                                    class="stepper-number {{ isset($data->banksoal->jawaban->simpanjawaban) && $data->banksoal->jawaban->simpanjawaban->banksoal_id == $data->banksoal->id ? 'text-white' : '' }}">{{ $loop->iteration }}</span>
                                            </div>
                                            {{-- @endif --}}
                                        </a>
                                    </div>
                                </div>
                            @endforeach
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
            <div class="sesai mt-2 d-flex justify-content-end">
                <button type="button" class="btn btn-lg btn-success me-3 selesai">
                    <span class="indicator-label">Selesai
                        <i class="ki-outline ki-arrow-right fs-3 ms-2 me-0"></i></span>
                </button>
            </div>
        </div>
    </div>

    @push('footer')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            // Fungsi untuk memulai countdown
            function startCountdown() {
                let paketId = {{ $paketId }}
                let menit = {{ $datas[0]->subpaket->waktu }};
                // console.log(menit);
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
                        @this.call('submit')
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

                // Cek jika user telah menekan tombol Selesai sebelumnya
                if (localStorage.getItem('selesai_klik') === 'true') {
                    localStorage.removeItem('selesai_klik');
                    clearInterval(interval);
                    countdown = 0;
                    countdownElement.textContent = '00:00:00';
                    localStorage.removeItem(countdownKey);
                    startCountdown();
                }
            }

            document.addEventListener('DOMContentLoaded', startCountdown);

            ////////////* Batas *//////////////

            $('.sesai').on('click', '.selesai', function() {
                const {
                    Swal
                } = window;
                Swal.fire({
                    title: 'Yakin sudah selesai?',
                    text: "Semua jawaban yang telah dikirim tidak dapat dirubah.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yakin',
                    cancelButtonText: 'Batal',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    allowEnterKey: false,
                }).then((result) => {
                    if (result.value) {
                        localStorage.setItem('selesai_klik', 'true');
                        @this.call('submit')
                    }
                }).then(() => {
                    Swal.enableOutsideClick();
                    Swal.enableEscapeKey();
                    Swal.enableEnterKey();
                });
            });
            document.addEventListener('swal:modal:show', event => {
                event.detail.params.allowOutsideClick = false;
                event.detail.params.allowEscapeKey = false;
                event.detail.params.allowEnterKey = false;
            });
            // Livewire.on('swal:modal:show', (params) => {
            //     params.allowOutsideClick = false;
            //     params.allowEscapeKey = false;
            //     params.allowEnterKey = false;
            // });
            // Livewire.on('swal:modal:shown', (params) => {
            //     params.allowOutsideClick = false;
            //     params.allowEscapeKey = false;
            //     params.allowEnterKey = false;
            // });
            // Livewire.on('swal:modal:hidden', (params) => {
            //     params.allowOutsideClick = true;
            //     params.allowEscapeKey = true;
            //     params.allowEnterKey = true;
            // });

            ////////////* Batas *//////////////

            // Fungsi untuk stepper item sebelah kanan ketika klik berubah pertanyaan
            // document.querySelectorAll('.stepper-item').forEach((item, index) => {
            //     item.addEventListener('click', () => {
            //         document.querySelectorAll('.stepper-item').forEach((el) => {
            //             el.classList.remove('current');
            //         });

            //         item.classList.add('current');

            //         document.querySelectorAll('[data-kt-stepper-element="content"]').forEach((content,
            //             contentIndex) => {
            //             if (contentIndex === index) {
            //                 content.classList.add('current');
            //             } else {
            //                 content.classList.remove('current');
            //             }
            //         });
            //     });
            // });
        </script>
    @endpush
</div>
