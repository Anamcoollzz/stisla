@php
  $_nama_aplikasi = \App\Pengaturan::where('key', 'nama_aplikasi')->first()->value;
  $_tahun = \App\Pengaturan::where('key', 'tahun')->first()->value;
  $_versi = \App\Pengaturan::where('key', 'versi')->first()->value;
@endphp
<footer class="main-footer">
	<div class="footer-left">
		Copyright &copy; {{ $_tahun }} <div class="bullet"></div> <a href="{{ route('dashboard') }}">{{ $_nama_aplikasi }}</a>
	</div>
	<div class="footer-right">
		{{ $_versi }}
	</div>
</footer>