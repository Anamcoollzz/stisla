
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  @include('stisla.layouts.title')
  
  @include('stisla.layouts.css_inti')

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset('stisla/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('stisla/node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
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
      </footer>
    </div>
  </div>

  @stack('modal')

  @include('stisla.layouts.js_inti')

  <!-- JS Libraies -->
  <script src="{{ asset('stisla/node_modules/datatables/media/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('stisla/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('stisla/node_modules/datatables.net-select-bs4/js/select.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('stisla/node_modules/sweetalert/dist/sweetalert.min.js') }}"></script>
  <script src="{{ asset('stisla/node_modules/axios/dist/axios.min.js') }}"></script>
  @stack('js')

  <!-- Template JS File -->
  <script src="{{ asset('stisla/assets/js/scripts.js') }}"></script>
  <script src="{{ asset('stisla/assets/js/custom.js') }}"></script>

  <!-- Page Specific JS File -->
  <script src="{{ asset('stisla/assets/js/page/modules-datatables.js') }}"></script>
  <script>
    $(document).ready(function(){
      $("#datatable").dataTable({
        "language": {
          "lengthMenu": "Menampilkan _MENU_ baris data per halaman",
          "zeroRecords": "Tidak ada data",
          "info": "Menampilkan halaman _PAGE_ dari _PAGES_",
          "infoFiltered": "(filtered from _MAX_ total records)",
          "search":'Pencarian',
          "paginate": {
            "previous": "Sebelumnya",
            "next":"Selanjutnya"
          }
        }
      });
    });
  </script>
  @if(session('success_msg'))
  <script>
    swal('Sukses', '{{ session('success_msg') }}', 'success');
  </script>
  @endif

  @stack('script')
</body>
</html>
