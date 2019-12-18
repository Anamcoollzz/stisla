@extends('layouts.table')

@section('konten')
<div class="section-header">
  <h1>{{ $title }}</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
    <div class="breadcrumb-item">{{ $title }}</div>
  </div>
</div>

<div class="section-body">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>
            Data {{ $title }}
          </h4>
          <a href="{{ route('divisi.create') }}" class="btn btn-primary float-right">
            <i class="fas fa-plus"></i> Baru
          </a>
          <a href="#" onclick="modalExcel(event)" class="btn btn-success float-right">
            <i class="fa fa-file-excel"></i> Import Excel
          </a>
          <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButtonExport" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Export
          </button>
          <div class="dropdown-menu">
            <a target="_blank" class="dropdown-item has-icon" href="{{ route('divisi.export-excel', 'xls') }}">
              <i class="fas fa-file-excel"></i> Excel (XLS)
            </a>
            <a target="_blank" class="dropdown-item has-icon" href="{{ route('divisi.export-excel', 'xlsx') }}">
              <i class="fas fa-file-excel"></i> Excel (XLSX)
            </a>
            <a target="_blank" class="dropdown-item has-icon" href="{{ route('divisi.export-excel', 'csv') }}">
              <i class="fas fa-file-excel"></i> Excel (CSV)
            </a>
            <a target="_blank" class="dropdown-item has-icon" href="{{ route('divisi.export-pdf', 'stream') }}">
              <i class="fas fa-file-pdf"></i> PDF (Preview)
            </a>
            <a target="_blank" class="dropdown-item has-icon" href="{{ route('divisi.export-pdf', 'download') }}">
              <i class="fas fa-file-pdf"></i> PDF (Unduh)
            </a>
            <a target="_blank" class="dropdown-item has-icon" href="{{ route('divisi.export-json', 'preview') }}">
              <i class="fas fa-code"></i> JSON (Preview)
            </a>
            <a target="_blank" class="dropdown-item has-icon" href="{{ route('divisi.export-json', 'download') }}">
              <i class="fas fa-code"></i> JSON (Unduh)
            </a>
            <a target="_blank" class="dropdown-item has-icon" href="{{ route('divisi.cetak-langsung') }}">
              <i class="fas fa-print"></i> Cetak Langsung
            </a>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped" id="datatable">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nama</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $d)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $d->nama }}</td>
                  <td>
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton{{$loop->iteration}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Aksi
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item has-icon" href="{{ route('divisi.edit', $d->id) }}">
                        <i class="fas fa-edit"></i> Ubah
                      </a>
                      <a onclick="hapus(event, '{{ route('divisi.destroy', $d->id) }}')" class="dropdown-item has-icon" href="#">
                        <i class="fas fa-trash"></i> Hapus
                      </a>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('script')
<form action="" id="form-hapus" method="post">
  @csrf
  @method('DELETE')
</form>
<script>
  function hapus(e, url) {
    swal({
      title: 'Anda yakin?',
      text: 'Sekali dihapus, data tidak akan kembali lagi!',
      icon: 'warning',
      buttons: true,
      dangerMode: true,
      buttons : {
        cancel: {
          text: "Batal",
          value: null,
          visible: true,
          className: "",
          closeModal: true,
        },
        confirm: {
          text: "Lanjutkan",
        }
      }
    })
    .then((willDelete) => {
      if (willDelete) {
        $('#form-hapus').attr('action', url);
        document.getElementById('form-hapus').submit();
      } else {
        swal('Okay, tidak jadi');
      }
    });
  }

  function modalExcel(e){
    e.preventDefault();
    $('#modalExcel').modal('show');
  }

  function kirimExcel(e){
    e.preventDefault();
    $('.is-invalid').removeClass('is-invalid');
    $('.invalid-feedback').empty();
    $('#btn-kirim').addClass('btn-progress disabled');
    var formData = new FormData(document.getElementById('formExcel'));
    axios.post('{{ route('divisi.import-excel') }}', formData).then(function(response){
      $('#btn-kirim').removeClass('btn-progress disabled');
      swal({
        title : 'Sukses',
        text : response.data,
        type : 'success',
      }).then(function(){
        window.location.reload();
      })
    }).catch(function(error){
      $('#btn-kirim').removeClass('btn-progress disabled');
      var status = error.response.status;
      if(status == 422){
        var errors = error.response.data.errors;
        var invalidFeedback = $('#berkas_excel').parents('.input-group').find('.invalid-feedback');
        if(invalidFeedback.length <= 0){
          $('#berkas_excel').parents('.input-group').append('<span class="invalid-feedback"></span>');
        }
        invalidFeedback = $('#berkas_excel').parents('.input-group').find('.invalid-feedback');
        $('#berkas_excel').addClass('is-invalid');
        invalidFeedback.html(errors.berkas_excel[0]);
      }
    });
  }
</script>
@endpush

@push('modal')
<form action="" onsubmit="kirimExcel(event)" id="formExcel" method="post">
  @csrf
  <div class="modal fade" tabindex="-1" role="dialog" id="modalExcel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Import Excel</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          @inputexcel(['id'=>'berkas_excel', 'label'=>'Berkas Excel', 'ikon'=>'fas fa-file-excel'])
          <div class="alert alert-info">
            Berikut contoh berkas yang bisa diimport. 
            <a class="text-primary" href="{{ asset('excel/contoh_import_divisi.xlsx') }}" target="_blank">XLSX</a>, 
            <a class="text-primary" href="{{ asset('excel/contoh_import_divisi.xls') }}" target="_blank">XLS</a>, 
            dan 
            <a class="text-primary" href="{{ asset('excel/contoh_import_divisi.csv') }}" target="_blank">CSV</a>
            <br>
            Klik saja pada teks tersebut untuk mengunduh contohnya
          </div>
        </div>
        <div class="modal-footer bg-whitesmoke br">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary" id="btn-kirim">Kirim</button>
        </div>
      </div>
    </div>
  </div>
</form>
@endpush

@push('js')
<script src="{{ asset('js/axios.min.js') }}"></script>
@endpush