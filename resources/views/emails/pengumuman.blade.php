<x-mail::message>
    # Pengumuman Member Sahabat ASN

    Hai {{ $user->name }}
    Kami ingin menginformasikan kepada Anda tentang beberapa hal penting berikut:

    Judul: {{ $pengumuman->judul }}
    Tanggal: {{ $pengumuman->tanggal->format('d M Y') }}
    Isi:
    {{ $pengumuman->isi }}

    Mohon untuk membaca dan memperhatikan informasi di atas dengan seksama.

    Terima Kasih,
    Sahabat ASN
</x-mail::message>
