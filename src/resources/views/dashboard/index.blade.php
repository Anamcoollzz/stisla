<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  @include('stisla.layouts.title')

  @include('stisla.layouts.css_inti')

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset('stisla/node_modules/jqvmap/dist/jqvmap.min.css') }}">

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
          <div class="section-header">
            <h1>Dashboard</h1>
          </div>
          <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-university"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Modul 1</h4>
                  </div>
                  <div class="card-body">
                    {{1}}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="fas fa-briefcase"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Modul 2</h4>
                  </div>
                  <div class="card-body">
                    {{0}}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="fas fa-users"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Modul 3</h4>
                  </div>
                  <div class="card-body">
                    {{0}}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="fas fa-clock"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Modul 4</h4>
                  </div>
                  <div class="card-body">
                    {{0}}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      @include('stisla.layouts.footer')
    </div>
  </div>

  @include('stisla.layouts.js_inti')

  <!-- Template JS File -->
  <script src="{{ asset('stisla/assets/js/scripts.js') }}"></script>
  <script src="{{ asset('stisla/assets/js/custom.js') }}"></script>
</body>
</html>
