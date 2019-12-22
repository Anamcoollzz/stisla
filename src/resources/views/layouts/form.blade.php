<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  @include('stisla.layouts.title')

  @include('stisla.layouts.css_inti')

  @stack('css')

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('stisla/assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('stisla/assets/css/components.css') }}">
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      @include('stisla.layouts.navbar')
      @include('stisla.layouts.sidebar')

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          @yield('konten')
        </section>
      </div>
      @include('stisla.layouts.footer')
    </div>
  </div>

  @include('stisla.layouts.js_inti')

  <!-- JS Libraies -->
  <script src="{{ asset('stisla/node_modules/sweetalert/dist/sweetalert.min.js') }}"></script>
  @stack('js')

  <!-- Template JS File -->
  <script src="{{ asset('stisla/assets/js/scripts.js') }}"></script>
  <script src="{{ asset('stisla/assets/js/custom.js') }}"></script>

  @stack('script')

  @if(session('success_msg'))
  <script>
    swal('Sukses', '{{ session('success_msg') }}', 'success');
  </script>
  @endif

</body>
</html>
