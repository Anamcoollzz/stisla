@extends('layouts.form')

@section('konten')
<div class="section-header">
  <h1>{{ $title }}</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
    <div class="breadcrumb-item active"><a href="{{ route('divisi.index') }}">Divisi</a></div>
    <div class="breadcrumb-item">{{ $title }}</div>
  </div>
</div>

<div class="section-body">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>{{ $title }}</h4>
          <a href="{{ route('divisi.index') }}" class="btn btn-primary float-right">Lihat Data</a>
        </div>
        <div class="card-body">
          <form action="{{ $action }}" method="post" enctype="multipart/form-data">
            @isset($d)
            @method('PUT')
            @endisset
            @csrf
            <div class="row">
              <div class="col-md-12">
                @input(['id'=>'nama', 'label'=>'Nama', 'ikon'=>'fas fa-university', 'value'=>isset($d)?$d->nama : ''])
              </div>
              <div class="col-md-12">
                <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                <a href="{{ route('divisi.index') }}" class="btn btn-secondary btn-block">Batal</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@include('import.daterangepicker')