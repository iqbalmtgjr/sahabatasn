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
                                <h3>Lama Mengerjakan:
                                    {{ $jawabann[$currentStep - 1]->lama_pengerjaan }}
                                </h3>
                            </div>
                        </div>
                        <hr>
                        @foreach ($jawabann as $i => $item)
                            <div wire:key='{{ $item->id }}'
                                class="{{ $currentStep == $i + 1 ? 'current' : ($currentStep > $i + 1 ? 'pending' : '') }}"
                                data-kt-stepper-element="content">
                                <div class="w-100">
                                    <div class="pb-5 pb-lg-5">
                                        <h2 class="fw-bold d-flex align-items-center text-dark">
                                            @if ($status == 3)
                                                {{ $i + 1 }}. {{ $item->togratis->soal }}
                                            @else
                                                {{ $i + 1 }}. {{ $item->banksoal->soal }}
                                            @endif
                                        </h2>
                                    </div>
                                    @foreach (range('a', 'e') as $alpha)
                                        @if ($status == 3)
                                            @if (isset($item->jawabangratis["pilihan_$alpha"]))
                                                <div>
                                                    @if (isset($item->jawabangratis["pilihan_$alpha"]) && $item->jawabangratis["pilihan_$alpha"] === $item->jawab)
                                                        <strong wire:key='{{ $item->id }}'
                                                            class="{{ $item->jawabangratis["pilihan_$alpha"] === $item->jawab && $item->jawabangratis["jawaban_$alpha"] == 5 ? 'text-primary' : 'text-danger' }}"
                                                            style="font-size: 15px">{{ strtoupper($alpha) }}.
                                                            {{ $item->jawabangratis["pilihan_$alpha"] }}</strong>
                                                    @elseif($item->jawabangratis["jawaban_$alpha"] == 5)
                                                        <strong wire:key='{{ $item->id }}'
                                                            style="font-size: 15px; color:green">{{ strtoupper($alpha) }}.
                                                            {{ $item->jawabangratis["pilihan_$alpha"] }}</strong><i
                                                            class="ki-duotone ki-check fs-2" style="color:green"></i>
                                                    @else
                                                        <strong style="font-size: 15px">{{ strtoupper($alpha) }}.
                                                            {{ $item->jawabangratis["pilihan_$alpha"] }}</strong>
                                                    @endif

                                                </div>
                                            @endif
                                        @else
                                            @if (isset($item->jawaban["pilihan_$alpha"]))
                                                <div>
                                                    @if (isset($item->jawaban["pilihan_$alpha"]) && $item->jawaban["pilihan_$alpha"] === $item->jawab)
                                                        <strong wire:key='{{ $item->id }}'
                                                            class="{{ $item->jawaban["pilihan_$alpha"] === $item->jawab && $item->jawaban["jawaban_$alpha"] == 5 ? 'text-primary' : 'text-danger' }}"
                                                            style="font-size: 15px">{{ strtoupper($alpha) }}.
                                                            {{ $item->jawaban["pilihan_$alpha"] }}</strong>
                                                    @elseif($item->jawaban["jawaban_$alpha"] == 5)
                                                        <strong wire:key='{{ $item->id }}'
                                                            style="font-size: 15px; color:green">{{ strtoupper($alpha) }}.
                                                            {{ $item->jawaban["pilihan_$alpha"] }}</strong><i
                                                            class="ki-duotone ki-check fs-2" style="color:green"></i>
                                                    @else
                                                        <strong style="font-size: 15px">{{ strtoupper($alpha) }}.
                                                            {{ $item->jawaban["pilihan_$alpha"] }}</strong>
                                                    @endif
                                                </div>
                                            @endif
                                        @endif
                                    @endforeach
                                    <hr>
                                    <div class="row">
                                        <p style="font-size: 18px">Jawaban Anda:
                                            @if ($jawabann[$i]->jawab == null)
                                                <span class="text-danger"><strong>Tidak Dijawab</strong></span>
                                            @else
                                                @if ($status == 3)
                                                    @switch($jawabann[$i]->jawab)
                                                        @case($jawabann[$i]->jawabangratis['pilihan_a'])
                                                            <span class="text-primary"><strong>A</strong></span>
                                                        @break

                                                        @case($jawabann[$i]->jawabangratis['pilihan_b'])
                                                            <span class="text-primary"><strong>B</strong></span>
                                                        @break

                                                        @case($jawabann[$i]->jawabangratis['pilihan_c'])
                                                            <span class="text-primary"><strong>C</strong></span>
                                                        @break

                                                        @case($jawabann[$i]->jawabangratis['pilihan_d'])
                                                            <span class="text-primary"><strong>D</strong></span>
                                                        @break

                                                        @case($jawabann[$i]->jawabangratis['pilihan_e'])
                                                            <span class="text-primary"><strong>E</strong></span>
                                                        @break
                                                    @endswitch
                                                @else
                                                    @switch($jawabann[$i]->jawab)
                                                        @case($jawabann[$i]->jawaban['pilihan_a'])
                                                            <span class="text-primary"><strong>A</strong></span>
                                                        @break

                                                        @case($jawabann[$i]->jawaban['pilihan_b'])
                                                            <span class="text-primary"><strong>B</strong></span>
                                                        @break

                                                        @case($jawabann[$i]->jawaban['pilihan_c'])
                                                            <span class="text-primary"><strong>C</strong></span>
                                                        @break

                                                        @case($jawabann[$i]->jawaban['pilihan_d'])
                                                            <span class="text-primary"><strong>D</strong></span>
                                                        @break

                                                        @case($jawabann[$i]->jawaban['pilihan_e'])
                                                            <span class="text-primary"><strong>E</strong></span>
                                                        @break
                                                    @endswitch
                                                @endif
                                            @endif
                                        </p>
                                        <p style="font-size: 18px">Kunci Jawaban:
                                            @if ($status == 3)
                                                @foreach (range('a', 'e') as $alpha)
                                                    @if (isset($jawabann[$i]->jawabangratis["jawaban_$alpha"]) && $jawabann[$i]->jawabangratis["jawaban_$alpha"] != 0)
                                                        <span style="color: green"><strong>{{ strtoupper($alpha) }}
                                                            </strong></span>
                                                    @endif
                                                @endforeach
                                            @else
                                                @foreach (range('a', 'e') as $alpha)
                                                    @if (isset($jawabann[$i]->jawaban["jawaban_$alpha"]) && $datas[$i]->jawaban["jawaban_$alpha"] != 0)
                                                        <span style="color: green"><strong>{{ strtoupper($alpha) }}
                                                            </strong></span>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </p>
                                    </div>
                                    <hr>
                                    <div class="row mt-5">
                                        @if ($status != 3)
                                            <h2><strong>Pembahasan</strong></h2>
                                            <span style="font-size: 17px">{!! $datas[$i]->jawaban->pembahasan !!}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach

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
                                    <div class="stepper-icon w-30px h-30px" style="background-color: green">
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center col-5 mb-5" data-kt-stepper-element="nav">
                                <h4>= Benar</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="stepper-item col-2 mb-5" data-kt-stepper-element="nav">
                                <div class="stepper-wrapper">
                                    <div class="stepper-icon w-30px h-30px" style="background-color: red">
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center col-5 mb-5" data-kt-stepper-element="nav">
                                <h4>= Salah</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="stepper-item col-2 mb-5" data-kt-stepper-element="nav">
                                <div class="stepper-wrapper">
                                    <div class="stepper-icon w-30px h-30px" style="background-color: grey">
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center col-5 mb-5" data-kt-stepper-element="nav">
                                <h4>= Kosong</h4>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            @foreach ($jawabann as $index => $data)
                                <div wire:key="{{ $index }}"
                                    class="stepper-item {{ $currentStep == $index + 1 ? 'current' : '' }} col-2 mb-5"
                                    data-kt-stepper-element="nav">
                                    <div class="stepper-wrapper">
                                        @if ($status == 3)
                                            <a href="javascript:void(0)" wire:click="setStep({{ $index + 1 }})">
                                                <div class="stepper-icon w-40px h-40px"
                                                    style="background-color: 
                                                    @if ($data->jawabangratis['pilihan_a'] == $data->jawab && $data->jawabangratis['jawaban_a'] == 5) green;
                                                    @elseif($data->jawabangratis['pilihan_b'] == $data->jawab && $data->jawabangratis['jawaban_b'] == 5)
                                                    green; @elseif ($data->jawabangratis['pilihan_c'] == $data->jawab && $data->jawabangratis['jawaban_c'] == 5)
                                                    green; @elseif ($data->jawabangratis['pilihan_d'] == $data->jawab && $data->jawabangratis['jawaban_d'] == 5)
                                                    green; @elseif ($data->jawabangratis['pilihan_e'] == $data->jawab && $data->jawabangratis['jawaban_e'] == 5)
                                                    green; @elseif($data->jawab == null) grey;
                                                    @else red; @endif">
                                                    <span class="stepper-number"
                                                        style="color: white">{{ $loop->iteration }}
                                                    </span>
                                                </div>
                                            </a>
                                        @else
                                            <a href="javascript:void(0)" wire:click="setStep({{ $index + 1 }})">
                                                <div class="stepper-icon w-40px h-40px"
                                                    style="background-color: 
                                                    @if ($data->jawaban['pilihan_a'] == $data->jawab && $data->jawaban['jawaban_a'] == 5) green;
                                                    @elseif($data->jawaban['pilihan_b'] == $data->jawab && $data->jawaban['jawaban_b'] == 5)
                                                    green; @elseif ($data->jawaban['pilihan_c'] == $data->jawab && $data->jawaban['jawaban_c'] == 5)
                                                    green; @elseif ($data->jawaban['pilihan_d'] == $data->jawab && $data->jawaban['jawaban_d'] == 5)
                                                    green; @elseif ($data->jawaban['pilihan_e'] == $data->jawab && $data->jawaban['jawaban_e'] == 5)
                                                    green; @elseif($data->jawab == null) grey;
                                                    @else red; @endif">
                                                    <span class="stepper-number"
                                                        style="color: white">{{ $loop->iteration }}
                                                    </span>
                                                </div>
                                            </a>
                                        @endif
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
