@php
  $_nama_aplikasi = \App\Pengaturan::where('key', 'nama_aplikasi')->first()->value;
@endphp
<title>{{ $title }} &mdash; {{ $_nama_aplikasi }}</title>