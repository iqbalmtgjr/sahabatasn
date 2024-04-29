@extends('layouts.master')

@push('header')
    @livewireStyles
@endpush

@section('content')
    <livewire:kerjakan :id="$data->subkategori_id" />
@endsection

@push('footer')
    @livewireScripts
@endpush
