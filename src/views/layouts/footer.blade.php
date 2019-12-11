<footer class="main-footer">
	<div class="footer-left">
		Copyright &copy; {{ date('Y') }} <div class="bullet"></div> <a href="{{ route('dashboard') }}">{{ config('app.name') }}</a>
	</div>
	<div class="footer-right">
		{{ config('app.version') }}
	</div>
</footer>