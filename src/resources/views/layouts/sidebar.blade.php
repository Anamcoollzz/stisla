@php
  $_nama_aplikasi = \App\Pengaturan::where('key', 'nama_aplikasi')->first()->value;
  $_nama_aplikasi_mobile = \App\Pengaturan::where('key', 'nama_aplikasi_mobile')->first()->value;
@endphp
<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="{{ route('dashboard') }}">{{ $_nama_aplikasi }}</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="{{ route('dashboard') }}">{{ $_nama_aplikasi_mobile }}</a>
    </div>
    <ul class="sidebar-menu">
      @foreach (\App\Menu::all() as $menu)
      <li @if($active == $menu->route) class="active" @endif>
        <a @if($menu->is_blank) target="_blank" @endif class="nav-link" href="{{ route($menu->route) }}"><i class="{{$menu->ikon}}"></i> <span>{{$menu->nama}}</span></a>
      </li>
      @endforeach
    </ul>
  </aside>
</div>