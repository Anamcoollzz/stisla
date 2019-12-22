@php
  $_nama_aplikasi = \App\Pengaturan::where('key', 'nama_aplikasi')->first()->value;
  $_logo = \App\Pengaturan::where('key', 'logo')->first()->value;
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Masuk &mdash; {{ $_nama_aplikasi }}</title>
  @include('stisla.layouts.css_inti')

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset('stisla/node_modules/bootstrap-social/bootstrap-social.css') }}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('stisla/assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('stisla/assets/css/components.css') }}">
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="d-flex flex-wrap align-items-stretch">
        <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
          <div class="p-4 m-3">
            <img src="{{ $_logo }}" alt="{{ $_nama_aplikasi }}" width="80" class="shadow-light rounded-circle mb-5 mt-2">
            <h4 class="text-dark font-weight-normal">Selamat datang di <span class="font-weight-bold">{{ $_nama_aplikasi }}</span></h4>
            <p class="text-muted">Sebelum memulai, anda harus masuk terlebih dahulu dengan akun anda.</p>
            <form method="POST" action="{{ route('masuk') }}" class="needs-validation" novalidate="">
              @csrf
              <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" tabindex="1" required autofocus>
                @error('email')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>

              <div class="form-group">
                <div class="d-block">
                  <label for="password" class="control-label">Password</label>
                </div>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" tabindex="2" required>
                @error('password')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>

              <div class="form-group">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                  <label class="custom-control-label" for="remember-me">Ingat Saya</label>
                </div>
              </div>

              <div class="form-group text-right">
                <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4">
                  Masuk
                </button>
              </div>
            </form>

            <div class="text-center mt-5 text-small">
              Copyright &copy; {{ config('app.company_name') }}. Dibuat dengan 💙 Stisla
            </div>
          </div>
        </div>
        <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom" data-background="{{ asset('stisla/assets/img/pantai.jpg') }}">
          <div class="absolute-bottom-left index-2">
            <div class="text-light p-5 pb-2">
              <div class="mb-5 pb-3">
                <h1 class="mb-2 display-4 font-weight-bold" id="sapaan">Selamat Pagi</h1>
                <h5 class="font-weight-normal text-muted-transparent">Jember, Indonesia</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  @include('stisla.layouts.js_inti')

  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="{{ asset('stisla/assets/js/scripts.js') }}"></script>
  <script src="{{ asset('stisla/assets/js/custom.js') }}"></script>
  <script>
    $(document).ready(function(){
      var date = new Date();
      var jam = date.getHours();
      var menit = date.getMinutes();
      var pesan = '';
      if(jam >= 4){
        pesan = 'Selamat Pagi';
      }else if(jam >= 10){
        pesan = 'Selamat Siang';
      }else if(jam >= 14){
        pesan = 'Selamat Sore';
      }else if(jam >= 18){
        if(menit >= 30)
          pesan = 'Selamat Malam';
        else
          pesan = 'Selamat Sore';
      }
      $('#sapaan').html(pesan);
    });
  </script>
  
  <!-- Page Specific JS File -->
</body>
</html>
