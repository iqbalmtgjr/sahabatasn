<div>
    {{-- @dd($jawaban->jawaban) --}}
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
                    {{-- {{ dd($datas[$currentStep]) }} --}}
                    @if ($currentStep === 1)
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
                                <div class="form-check" style="margin-top: 10px">
                                    <input wire:click="simpan('A')" class="form-check-input" type="radio"
                                        wire:model="jawaban_1" id="flexRadioDefault1" value="A">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        <strong style="font-size: 15px">{{ $datas[0]->jawaban->pilihan_a }}</strong>
                                    </label>
                                </div>
                                <div class="form-check" style="margin-top: 10px">
                                    <input wire:click="simpan('B')" class="form-check-input" type="radio"
                                        wire:model="jawaban_1" id="flexRadioDefault2" value="B">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        <strong style="font-size: 15px">{{ $datas[0]->jawaban->pilihan_b }}</strong>
                                    </label>
                                </div>
                                <div class="form-check" style="margin-top: 10px">
                                    <input wire:click="simpan('C')" class="form-check-input" type="radio"
                                        wire:model="jawaban_1" id="flexRadioDefault3" value="C">
                                    <label class="form-check-label" for="flexRadioDefault3">
                                        <strong style="font-size: 15px">{{ $datas[0]->jawaban->pilihan_c }}</strong>
                                    </label>
                                </div>
                                <div class="form-check" style="margin-top: 10px">
                                    <input wire:click="simpan('D')" class="form-check-input" type="radio"
                                        wire:model="jawaban_1" id="flexRadioDefault4" value="D">
                                    <label class="form-check-label" for="flexRadioDefault4">
                                        <strong style="font-size: 15px">{{ $datas[0]->jawaban->pilihan_d }}</strong>
                                    </label>
                                </div>
                                @if ($datas[0]->jawaban->pilihan_e != null)
                                    <div class="form-check" style="margin-top: 10px">
                                        <input wire:click="simpan('E')" class="form-check-input" type="radio"
                                            wire:model="jawaban_1" id="flexRadioDefault5" value="E">
                                        <label class="form-check-label" for="flexRadioDefault5">
                                            <strong style="font-size: 15px">{{ $datas[0]->jawaban->pilihan_e }}</strong>
                                        </label>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif
                    @for ($i = 1; $i <= $totalSteps; $i++)
                        @if ($currentStep === $i + 1)
                            <div class="card mb-4" wire:key="{{ $i }}">
                                <div class="card-body py-4">
                                    <div class="d-flex justify-content-between">
                                        <h3>Soal Nomor {{ $i + 1 }}</h3>
                                        <h3>{{ $datas[$i]->subkategori->sub_kategori }}</h3>
                                    </div>
                                    <hr>
                                    <!-- Soal -->
                                    <p style="font-size: 15px">{{ $datas[$i]->soal }}</p>
                                    <!-- Jawaban -->
                                    <div class="form-check" style="margin-top: 10px">
                                        <input wire:click="simpan('A')" class="form-check-input" type="radio"
                                            wire:model="jawaban_{{ $i + 1 }}" id="flexRadioDefault1"
                                            value="A">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            <strong
                                                style="font-size: 15px">{{ $datas[$i]->jawaban->pilihan_a }}</strong>
                                        </label>
                                    </div>
                                    <div class="form-check" style="margin-top: 10px">
                                        <input wire:click="simpan('B')" class="form-check-input" type="radio"
                                            wire:model="jawaban_{{ $i + 1 }}" id="flexRadioDefault2"
                                            value="B">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            <strong
                                                style="font-size: 15px">{{ $datas[$i]->jawaban->pilihan_b }}</strong>
                                        </label>
                                    </div>
                                    <div class="form-check" style="margin-top: 10px">
                                        <input wire:click="simpan('C')" class="form-check-input" type="radio"
                                            wire:model="jawaban_{{ $i + 1 }}" id="flexRadioDefault3"
                                            value="C">
                                        <label class="form-check-label" for="flexRadioDefault3">
                                            <strong
                                                style="font-size: 15px">{{ $datas[$i]->jawaban->pilihan_c }}</strong>
                                        </label>
                                    </div>
                                    <div class="form-check" style="margin-top: 10px">
                                        <input wire:click="simpan('D')" class="form-check-input" type="radio"
                                            wire:model="jawaban_{{ $i + 1 }}" id="flexRadioDefault4"
                                            value="D">
                                        <label class="form-check-label" for="flexRadioDefault4">
                                            <strong
                                                style="font-size: 15px">{{ $datas[$i]->jawaban->pilihan_d }}</strong>
                                        </label>
                                    </div>
                                    @if ($datas[$i]->jawaban->pilihan_e != null)
                                        <div class="form-check" style="margin-top: 10px">
                                            <input wire:click="simpan('E')" class="form-check-input" type="radio"
                                                wire:model="jawaban_{{ $i + 1 }}" id="flexRadioDefault5"
                                                value="E">
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
                                @foreach ($datas as $item)
                                    @php
                                        $key = $loop->iteration;
                                        $selectedClass =
                                            $jawabann->banksoal_id == $item->id ? 'btn-primary' : 'btn-secondary';
                                    @endphp
                                    <button wire:click="goToStep({{ $key }}, {{ $item->subkategori_id }})"
                                        class="btn {{ $selectedClass }}"
                                        style="margin: 2px; padding: 5px 15px; font-size: 10px; width:42px; height:34px">{{ $key }}</button>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
