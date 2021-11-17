@component('mail::message')
{{ $mailInfo['title'] }}

Yth, Bapak/Ibu di tempat

Berikut adalah jadwal pelaksanaan rapat anggota laboratorium Rekayasa Perangkat Lunak,

Judul Rapat : {{ $mailInfo['judul'] }} <br>
Tanggal     : {{ $mailInfo['date'] }} <br>
Lokasi      : {{ $mailInfo['location'] }} <br>


@component('mail::button', ['url' => $mailInfo['url']])
Cek Website Commit!
@endcomponent

Thanks,<br>
Sekretaris Rapat
Sinta Karidina
{{ config('app.name') }}
@endcomponent