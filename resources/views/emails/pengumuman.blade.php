<x-mail::message>
    # Pengumuman untuk Member Sahabat ASN

    Hai {{ $user->name }},
    Berikut ini adalah beberapa informasi penting yang ingin kami sampaikan kepada Anda:

    Judul: {{ $pengumuman->judul }}
    Tanggal: {{ \Carbon\Carbon::parse($pengumuman->tanggal)->format('d M Y') }}
    Pesan:
    {{ $pengumuman->isi }}

    Kami mohon agar Anda dapat membaca dan memperhatikan informasi tersebut dengan seksama.

    Terima kasih atas perhatiannya,
    Tim {{ config('app.name') }}
</x-mail::message>
