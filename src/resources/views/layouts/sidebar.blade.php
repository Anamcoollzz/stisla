<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="{{ route('dashboard') }}">{{ config('app.name') }}</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="{{ route('dashboard') }}">{{ config('app.name_mobile') }}</a>
    </div>
    <ul class="sidebar-menu">
      <li @if($active == 'dashboard') class="active" @endif>
        <a class="nav-link" href="{{ route('dashboard') }}"><i class="fas fa-fire"></i> <span>Dashboard</span></a>
      </li>
      <li @if($active == 'divisi.index') class="active" @endif>
        <a class="nav-link" href="{{ route('divisi.index') }}"><i class="fas fa-university"></i> <span>Divisi</span></a>
      </li>
      <li @if($active == 'jabatan.index') class="active" @endif>
        <a class="nav-link" href="{{ route('jabatan.index') }}"><i class="fas fa-briefcase"></i> <span>Jabatan</span></a>
      </li>
      <li @if($active == 'pegawai.index') class="active" @endif>
        <a class="nav-link" href="{{ route('pegawai.index') }}"><i class="fas fa-users"></i> <span>Pegawai</span></a>
      </li>
      <li @if($active == 'kehadiran.index') class="active" @endif>
        <a class="nav-link" href="{{ route('kehadiran.index') }}"><i class="fas fa-clock"></i> <span>Kehadiran</span></a>
      </li>
      <li @if($active == 'area-kehadiran.index') class="active" @endif>
        <a class="nav-link" href="{{ route('area-kehadiran.index') }}"><i class="fas fa-map"></i> <span>Area Kehadiran</span></a>
      </li>
      <li>
        <a class="nav-link" href="{{ route('keluar') }}"><i class="fas fa-sign-out-alt"></i> <span>Keluar</span></a>
      </li>
    </ul>
  </aside>
</div>