<div class="modal fade" id="soal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <div class="modal-header" id="kt_modal_add_user_header">
                <h2 class="fw-bold">Tambah Soal</h2>
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                    <i class="ki-outline ki-cross fs-1"></i>
                </div>
            </div>
            <div class="modal-body px-5 my-7">
                <form id="kt_modal_add_user_form" class="form" method="POST" action="{{ url('/subpaket/soal') }}">
                    @csrf
                    <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_user_scroll"
                        data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto"
                        data-kt-scroll-dependencies="#kt_modal_add_user_header"
                        data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                        <input type="hidden" name="subpaket_id" id="subpaket_id">
                        <div class="fv-row mb-7">
                            <label class="required fw-semibold fs-6 mb-2">Soal</label>
                            <select name="soal[]" class="form-select form-select-lg form-select-solid"
                                data-control="select2" data-placeholder="-- Pilih Soal-soal --" data-allow-clear="true"
                                multiple="multiple">
                                <optgroup label="TWK">
                                    @foreach ($twk as $item1)
                                        <option value="{{ $item1->id }}">{{ $item1->soal }}
                                            ({{ $item1->subkategori->sub_kategori }})
                                        </option>
                                    @endforeach
                                </optgroup>
                                <optgroup label="TIU">
                                    @foreach ($tiu as $item2)
                                        <option value="{{ $item2->id }}">{{ $item2->soal }}
                                            ({{ $item2->subkategori->sub_kategori }})
                                        </option>
                                    @endforeach
                                </optgroup>
                                <optgroup label="TKP">
                                    @foreach ($tkp as $item3)
                                        <option checked value="{{ $item3->id }}">{{ $item3->soal }}
                                            ({{ $item3->subkategori->sub_kategori }})
                                        </option>
                                    @endforeach
                                </optgroup>
                            </select>
                            @error('soal')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!--end::Input group-->
                    </div>
                    <!--end::Scroll-->
                    <!--begin::Actions-->
                    <div class="text-center pt-10">
                        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                            <span class="indicator-label">Simpan</span>
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
@push('header')
    <link href="{{ asset('') }}assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
@endpush
@push('footer')
    <script src="{{ asset('') }}assets/plugins/global/plugins.bundle.js"></script>
@endpush
<script>
    function getdata(id) {
        // console.log(id)
        var url = '{{ url('/subpaket/getdata') }}' + '/' + id
        // console.log(url);

        $.ajax({
            url: url,
            cache: false,
            success: function(response) {
                console.log(response);
                $('#subpaket_id').val(response.id);

                $('#soal').val(response.tampungsoal.banksoal_id)
            }
        });
    }
</script>
