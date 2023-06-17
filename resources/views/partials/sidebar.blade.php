<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="index.html">Stisla</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html">St</a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Dashboard</li>
      <li><a class="nav-link" href="{{ route('show-dashboard') }}"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
      <li class="menu-header">Data</li>
      <li class="dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fa fa-clipboard"></i><span>Penilaian</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="{{ route('show-aspek') }}">Aspek Penilaian</a></li>
          <li><a class="nav-link" href="{{ route('show-kriteria') }}">Kriteria Penilaian</a></li>
          {{-- <li><a class="nav-link" href="{{ route('show-skala') }}">Skala Penilaian</a></li> --}}
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fa fa-user-plus"></i><span>Paskibraka</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="{{ route('show-calon-paskib') }}">Calon Paskibra</a></li>
          <li><a class="nav-link" href="{{ route('show-nilai') }}">Nilai</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fa fa-calculator"></i><span>Perhitungan</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="{{ route('show-hasil-perhitungan') }}">Hasil Perhitungan</a></li>
          <li><a class="nav-link" href="{{ route('show-hasil-seleksi') }}">Hasil Seleksi</a></li>
        </ul>
      </li>
    </ul>      
  </aside>
</div>