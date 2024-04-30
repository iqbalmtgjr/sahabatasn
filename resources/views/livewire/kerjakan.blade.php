<div>
    {{-- @dd($warna) --}}
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
            <div class="row">
                <div class="col-md-9">
                    {{-- @if ($currentStep === 1)
                        <!-- Step 1 -->
                        <div class="card mb-4" wire:key="1">
                            <div class="card-body py-4">
                                <div class="d-flex justify-content-between">
                                    <h3>Soal Nomor 1</h3>
                                    <h3>{{ $datas[0]->subkategori->sub_kategori }}</h3>
                                </div>
                                <hr>
                                <!-- Soal -->
                                <label for="jawaban" style="font-size: 15px">{{ $datas[0]->soal }}</label>
                                <!-- Jawaban -->
                                <div class="form-check form-check-custom form-check-solid mt-5">
                                    <input
                                        wire:click="simpan('{{ $datas[0]->jawaban->pilihan_a }}',{{ $datas[0]->jawaban->id }})"
                                        name="jawaban_1" class="form-check-input" type="radio" value="A"
                                        id="flexRadioChecked1"
                                        {{ $datas[0]->jawaban->pilihan_a == $jawaban->jawab ? 'checked' : '' }} />
                                    <label class="form-check-label" for="flexRadioChecked1">
                                        <strong style="font-size: 15px">{{ $datas[0]->jawaban->pilihan_a }}</strong>
                                    </label>
                                </div>
                                <div class="form-check form-check-custom form-check-solid mt-3">
                                    <input
                                        wire:click="simpan('{{ $datas[0]->jawaban->pilihan_b }}',{{ $datas[0]->jawaban->id }})"
                                        name="jawaban_1" class="form-check-input" type="radio" value="B"
                                        id="flexRadioChecked2"
                                        {{ $datas[0]->jawaban->pilihan_b == $jawaban->jawab ? 'checked' : '' }} />
                                    <label class="form-check-label" for="flexRadioChecked2">
                                        <strong style="font-size: 15px">{{ $datas[0]->jawaban->pilihan_b }}</strong>
                                    </label>
                                </div>
                                <div class="form-check form-check-custom form-check-solid mt-3">
                                    <input
                                        wire:click="simpan('{{ $datas[0]->jawaban->pilihan_c }}',{{ $datas[0]->jawaban->id }})"
                                        name="jawaban_1" class="form-check-input" type="radio" value="C"
                                        id="flexRadioChecked3"
                                        {{ $datas[0]->jawaban->pilihan_c == $jawaban->jawab ? 'checked' : '' }} />
                                    <label class="form-check-label" for="flexRadioChecked3">
                                        <strong style="font-size: 15px">{{ $datas[0]->jawaban->pilihan_c }}</strong>
                                    </label>
                                </div>
                                <div class="form-check form-check-custom form-check-solid mt-3">
                                    <input
                                        wire:click="simpan('{{ $datas[0]->jawaban->pilihan_d }}',{{ $datas[0]->jawaban->id }})"
                                        name="jawaban_1" class="form-check-input" type="radio" value="D"
                                        id="flexRadioChecked4"
                                        {{ $datas[0]->jawaban->pilihan_d == $jawaban->jawab ? 'checked' : '' }} />
                                    <label class="form-check-label" for="flexRadioChecked4">
                                        <strong style="font-size: 15px">{{ $datas[0]->jawaban->pilihan_d }}</strong>
                                    </label>
                                </div>
                                @if ($datas[0]->jawaban->pilihan_e != null)
                                    <div class="form-check form-check-custom form-check-solid mt-3">
                                        <input
                                            wire:click="simpan('{{ $datas[0]->jawaban->pilihan_e }}',{{ $datas[0]->jawaban->id }})"
                                            name="jawaban_1" class="form-check-input" type="radio" value="E"
                                            id="flexRadioChecked5"
                                            {{ $datas[0]->jawaban->pilihan_e == $jawaban->jawab ? 'checked' : '' }} />
                                        <label class="form-check-label" for="flexRadioChecked5">
                                            <strong
                                                style="font-size: 15px">{{ $datas[0]->jawaban->pilihan_e }}</strong>
                                        </label>
                                    </div>
                                @endif

                            </div>
                        </div>
                    @endif --}}
                    @for ($i = 0; $i <= $totalSteps; $i++)
                        @if ($currentStep === $i + 1)
                            <div class="card mb-4" wire:ignore_self wire:key="{{ $i }}">
                                <div class="card-body py-4">
                                    <div class="d-flex justify-content-between">
                                        <h3>Soal Nomor {{ $i + 1 }}</h3>
                                        <h3>{{ $datas[$i]->subkategori->sub_kategori }}</h3>
                                    </div>
                                    <hr>
                                    <!-- Soal -->
                                    <p style="font-size: 15px">{{ $datas[$i]->soal }}</p>
                                    <!-- Jawaban -->
                                    <div class="form-check form-check-custom form-check-solid" style="margin-top: 10px">
                                        <input
                                            wire:click="simpan('{{ $datas[$i]->jawaban->pilihan_a }}',{{ $datas[$i]->jawaban->id }})"
                                            class="form-check-input" type="radio" name="jawaban_{{ $i + 1 }}"
                                            id="flexRadioDefault1" value="A"
                                            {{ $datas[$i]->jawaban->pilihan_a == $jawaban->jawab ? 'checked' : '' }}>
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            <strong
                                                style="font-size: 15px">{{ $datas[$i]->jawaban->pilihan_a }}</strong>
                                        </label>
                                    </div>
                                    <div class="form-check form-check-custom form-check-solid" style="margin-top: 10px">
                                        <input
                                            wire:click="simpan('{{ $datas[$i]->jawaban->pilihan_b }}',{{ $datas[$i]->jawaban->id }})"
                                            class="form-check-input" type="radio" name="jawaban_{{ $i + 1 }}"
                                            id="flexRadioDefault2" value="B"
                                            {{ $datas[$i]->jawaban->pilihan_b == $jawaban->jawab ? 'checked' : '' }}>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            <strong
                                                style="font-size: 15px">{{ $datas[$i]->jawaban->pilihan_b }}</strong>
                                        </label>
                                    </div>
                                    <div class="form-check form-check-custom form-check-solid" style="margin-top: 10px">
                                        <input
                                            wire:click="simpan('{{ $datas[$i]->jawaban->pilihan_c }}',{{ $datas[$i]->jawaban->id }})"
                                            class="form-check-input" type="radio" name="jawaban_{{ $i + 1 }}"
                                            id="flexRadioDefault3" value="C"
                                            {{ $datas[$i]->jawaban->pilihan_c == $jawaban->jawab ? 'checked' : '' }}>
                                        <label class="form-check-label" for="flexRadioDefault3">
                                            <strong
                                                style="font-size: 15px">{{ $datas[$i]->jawaban->pilihan_c }}</strong>
                                        </label>
                                    </div>
                                    <div class="form-check form-check-custom form-check-solid" style="margin-top: 10px">
                                        <input
                                            wire:click="simpan('{{ $datas[$i]->jawaban->pilihan_d }}',{{ $datas[$i]->jawaban->id }})"
                                            class="form-check-input" type="radio" name="jawaban_{{ $i + 1 }}"
                                            id="flexRadioDefault4" value="D"
                                            {{ $datas[$i]->jawaban->pilihan_d == $jawaban->jawab ? 'checked' : '' }}>
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
                                                value="E"
                                                {{ $datas[$i]->jawaban->pilihan_e == $jawaban->jawab ? 'checked' : '' }}>
                                            <label class="form-check-label" for="flexRadioDefault5">
                                                <strong
                                                    style="font-size: 15px">{{ $datas[$i]->jawaban->pilihan_e }}</strong>
                                            </label>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endif
                    @endfor
                    @if ($currentStep == 1)
                        <button wire:click="nextStep" class="btn btn-primary float-end">Lanjut</button>
                    @elseif ($currentStep > 1 && $currentStep != $totalSteps)
                        <div class="d-flex justify-content-between">
                            <button wire:click="previousStep" class="btn btn-secondary">Kembali</button>
                            <button wire:click="nextStep" class="btn btn-primary">Lanjut</button>
                        </div>
                    @elseif ($currentStep == $totalSteps)
                        <div class="d-flex justify-content-between">
                            <button wire:click="previousStep" class="btn btn-secondary float-start">Kembali</button>
                            <button wire:click="save" class="btn btn-primary" name="simpan">Selesai</button>
                        </div>
                    @endif
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body py-4">
                            <h3>Nomor Soal</h3>
                            <hr>
                            <div class="text-center">
                                @php
                                    $tangkap = [];
                                    foreach ($jawabann as $key => $value) {
                                        $tangkap[] = $value->subkategori_id;
                                        // dd($tangkap);
                                    }
                                @endphp
                                @foreach ($datas as $item)
                                    @php
                                        $key = $loop->iteration;
                                    @endphp
                                    {{-- @foreach ($jawabann as $itemm) --}}
                                    <button wire:click="goToStep({{ $key }}, {{ $item->subkategori_id }})"
                                        class="btn {{ $tangkap[0] == $item->subkategori_id ? 'btn-primary' : 'btn-secondary' }}"
                                        style="margin: 2px; padding: 5px 15px; font-size: 10px; width:42px; height:34px">{{ $key }}</button>
                                    {{-- @endforeach --}}
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div
