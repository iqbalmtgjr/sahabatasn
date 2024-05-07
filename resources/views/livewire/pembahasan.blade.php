<div>
    <div id="kt_app_toolbar" class="app-toolbar pt-7 pt-lg-10">
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex align-items-stretch">
            <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                    <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">
                        Pembahasan
                    </h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ url('hasil') }}" class="text-muted text-hover-primary">Hasil TryOut</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">Pembahasan</li>
                    </ul>
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
                        <div class="d-flex justify-content-between">
                            <h3>Soal
                                {{ $datas[$currentStep - 1]->kategori->kategori }}
                                {{ $datas[$currentStep - 1]->subkategori->sub_kategori }}</h3>
                            <div class="row text-end ">
                                <h3>Lama Mengerjakan: 10 Menit</h3>
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
                                            {{ $i + 1 }}. {{ $datas[$i]->soal }}
                                        </h2>
                                    </div>
                                    @foreach (range('a', 'e') as $alpha)
                                        @if (isset($datas[$i]->jawaban["pilihan_$alpha"]))
                                            <div>
                                                @if (isset($datas[$i]->jawaban["pilihan_$alpha"]) &&
                                                        $datas[$i]->jawaban["pilihan_$alpha"] === $datas[$i]->jawaban->simpanjawaban->jawab)
                                                    <strong wire:key='{{ $datas[$i]->id }}'
                                                        class="{{ $datas[$i]->jawaban["pilihan_$alpha"] === $datas[$i]->jawaban->simpanjawaban->jawab && $datas[$i]->jawaban["jawaban_$alpha"] == 5 ? 'text-primary' : 'text-danger' }}"
                                                        style="font-size: 15px">{{ strtoupper($alpha) }}.
                                                        {{ $datas[$i]->jawaban["pilihan_$alpha"] }}</strong>
                                                @elseif($datas[$i]->jawaban["jawaban_$alpha"] == 5)
                                                    <strong wire:key='{{ $datas[$i]->id }}'
                                                        style="font-size: 15px; color:green">{{ strtoupper($alpha) }}.
                                                        {{ $datas[$i]->jawaban["pilihan_$alpha"] }}</strong><i
                                                        class="ki-duotone ki-check fs-2" style="color:green"></i>
                                                @else
                                                    <strong style="font-size: 15px">{{ strtoupper($alpha) }}.
                                                        {{ $datas[$i]->jawaban["pilihan_$alpha"] }}</strong>
                                                @endif

                                            </div>
                                        @endif
                                    @endforeach
                                    <hr>
                                    <div class="row">
                                        <p style="font-size: 18px">Jawaban Anda:
                                            @switch($datas[$i]->jawaban->simpanjawaban->jawab)
                                                @case($datas[$i]->jawaban['pilihan_a'])
                                                    <span class="text-primary"><strong>A</strong></span>
                                                @break

                                                @case($datas[$i]->jawaban['pilihan_b'])
                                                    <span class="text-primary"><strong>B</strong></span>
                                                @break

                                                @case($datas[$i]->jawaban['pilihan_c'])
                                                    <span class="text-primary"><strong>C</strong></span>
                                                @break

                                                @case($datas[$i]->jawaban['pilihan_d'])
                                                    <span class="text-primary"><strong>D</strong></span>
                                                @break

                                                @case($datas[$i]->jawaban['pilihan_e'])
                                                    <span class="text-primary"><strong>E</strong></span>
                                                @break
                                            @endswitch
                                        </p>
                                        <p style="font-size: 18px">Kunci Jawaban:
                                            @foreach (range('a', 'e') as $alpha)
                                                @if (isset($datas[$i]->jawaban["jawaban_$alpha"]) && $datas[$i]->jawaban["jawaban_$alpha"] != 0)
                                                    <span style="color: green"><strong>{{ strtoupper($alpha) }}
                                                        </strong></span>
                                                @endif
                                            @endforeach
                                        </p>
                                    </div>
                                    <hr>
                                    <div class="row mt-5">
                                        <h2><strong>Pembahasan</strong></h2>
                                        <span style="font-size: 17px">{!! $datas[$i]->jawaban->pembahasan !!}</span>
                                    </div>
                                </div>
                            </div>
                        @endfor

                        <div class="d-flex flex-stack pt-10">
                            @if ($currentStep > 1 && $currentStep <= $totalSteps)
                                <div class="mr-2">
                                    <button wire:click="previousSteps" type="button"
                                        class="btn btn-lg btn-light-primary me-3">
                                        <i class="ki-outline ki-arrow-left fs-4 me-1"></i>Kembali</button>
                                </div>
                            @else
                                <div class="mr-2">
                                </div>
                            @endif
                            <div>
                                @if ($currentStep == $totalSteps)
                                    <a href="{{ url('/hasil') }}" class="btn btn-lg btn-primary me-3">
                                        <span class="indicator-label">Selesai
                                            <i class="ki-outline ki-arrow-right fs-3 ms-2 me-0"></i></span>
                                    </a>
                                @endif
                                @if ($currentStep != $totalSteps)
                                    <button wire:click="nextSteps" data-kt-stepper-action="next" type="button"
                                        class="btn btn-lg btn-primary">Selanjutnya
                                        <i class="ki-outline ki-arrow-right fs-4 ms-1 me-0"></i></button>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
                <div
                    class="card d-flex justify-content-center justify-content-xl-start flex-row-auto w-100 w-xl-300px w-xxl-400px">
                    <div class="row px-4 px-lg-10 px-xxl-10 pt-10">
                        <h3>Nomor Soal</h3>
                    </div>
                    <div class="card-body px-6 px-lg-10 px-xxl-15 py-10">
                        <div class="row">
                            <div class="stepper-item col-2 mb-5" data-kt-stepper-element="nav">
                                <div class="stepper-wrapper">
                                    <div class="stepper-icon w-40px h-40px" style="background-color: green">
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center col-5 mb-5" data-kt-stepper-element="nav">
                                <h3>= Benar</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="stepper-item col-2 mb-5" data-kt-stepper-element="nav">
                                <div class="stepper-wrapper">
                                    <div class="stepper-icon w-40px h-40px" style="background-color: red">
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center col-5 mb-5" data-kt-stepper-element="nav">
                                <h3>= Salah</h3>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            @foreach ($datas as $index => $data)
                                {{-- @dd($data->jawaban); --}}
                                <div wire:key="{{ $index }}"
                                    class="stepper-item {{ $currentStep == $index + 1 ? 'current' : '' }} col-2 mb-5"
                                    data-kt-stepper-element="nav">
                                    <div class="stepper-wrapper">
                                        <a href="javascript:void(0)" wire:click="setStep({{ $index + 1 }})">
                                            <div class="stepper-icon w-40px h-40px"
                                                style="background-color: 
                                                    @if ($data->jawaban['pilihan_a'] == $data->jawaban->simpanjawaban->jawab && $data->jawaban['jawaban_a'] == 5) green;
                                                    @elseif($data->jawaban['pilihan_b'] == $data->jawaban->simpanjawaban->jawab && $data->jawaban['jawaban_b'] == 5)
                                                    green; @elseif ($data->jawaban['pilihan_b'] == $data->jawaban->simpanjawaban->jawab && $data->jawaban['jawaban_b'] == 5)
                                                    green; @elseif ($data->jawaban['pilihan_c'] == $data->jawaban->simpanjawaban->jawab && $data->jawaban['jawaban_c'] == 5)
                                                    green; @elseif ($data->jawaban['pilihan_d'] == $data->jawaban->simpanjawaban->jawab && $data->jawaban['jawaban_d'] == 5)
                                                    green; @elseif ($data->jawaban['pilihan_e'] == $data->jawaban->simpanjawaban->jawab && $data->jawaban['jawaban_e'] == 5)
                                                    green; @else red; @endif">
                                                <span class="stepper-number"
                                                    style="color: white">{{ $loop->iteration }}
                                                </span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('footer')
        {{-- <script>
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
        </script> --}}
    @endpush
</div>
