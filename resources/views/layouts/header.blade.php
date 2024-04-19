<!DOCTYPE html>

<html lang="id">
<!--begin::Head-->

<head>
    <base href="" />
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta charset="utf-8" />
    <meta name="description"
        content="Sahabat ASN adalah platform pembelajaran online yang menyediakan materi dan soal-soal latihan CPNS dan PPPK untuk membantu Anda mempersiapkan diri menghadapi ujian. Dengan Sahabat ASN, pelajari soal-soal ujian CPNS dan PPPK kapan saja, di mana saja untuk meningkatkan peluang Anda lulus dalam ujian." />
    <meta name="keywords"
        content="CPNS, PPPK, pembelajaran online, materi belajar, soal latihan, ujian CPNS, ujian PPPK, persiapan ujian, platform pembelajaran, Sahabat ASN, lulus ujian, belajar online, materi CPNS, materi PPPK, latihan soal CPNS, latihan soal PPPK" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="id_ID" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Sahabat ASN - Platform Pembelajaran Online CPNS dan PPPK" />
    <meta property="og:url" content="https://sahabatasn.com" />
    <meta property="og:site_name" content="Sahabat ASN" />
    <link rel="canonical" href="https://sahabatasn.com" />
    <link rel="shortcut icon" href="{{ url('assets/media/logos/sahabatasn.ico') }}" />
    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="{{ asset('') }}assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('') }}assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
    @stack('header')
</head>
<!--end::Head-->
