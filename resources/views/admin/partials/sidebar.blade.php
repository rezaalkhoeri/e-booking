<aside id="sidebar-wrapper">
  <div class="sidebar-brand">
    <a href="{{ route('admin-index') }}">PDSI Seat Reservation</a>
  </div>
  <div class="sidebar-brand sidebar-brand-sm">
    <a href="index.html">St</a>
  </div>
  <ul class="sidebar-menu">
    <li class="menu-header">Dashboard</li>
    <li class="{{ Request::route()->getName() == 'admin-index' ? ' active' : '' }}"><a class="nav-link" href="{{ route('admin-index') }}"><i class="fa fa-columns"></i> <span>Dashboard</span></a></li>
    <li class="menu-header">Transaksi</li>
    <li class="nav-item dropdown {{ Request::route()->getName() == 'input-wfo' ? ' active' : '' }}">
      <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Booking Kursi</span></a>
      <ul class="dropdown-menu">
        <li class="{{ Request::route()->getName() == 'input-wfo' ? ' active' : '' }}"><a class="nav-link" href="{{ route('input-wfo') }}">Input Pekerja WFO</a></li>
      </ul>
    </li>
    <li class="menu-header">Master</li>
    <li class="{{ Request::route()->getName() == 'admin-index' ? ' active' : '' }}"><a class="nav-link" href="{{ route('admin-index') }}"><i class="fa fa-chair"></i> <span>Data Kursi</span></a></li>
    <li class="{{ Request::route()->getName() == 'admin-index' ? ' active' : '' }}"><a class="nav-link" href="{{ route('admin-index') }}"><i class="fa fa-table"></i> <span>Data Ruang Meeting</span></a></li>
    <li class="{{ Request::route()->getName() == 'admin-index' ? ' active' : '' }}"><a class="nav-link" href="{{ route('admin-index') }}"><i class="fa fa-user"></i> <span>Data User</span></a></li>
  </ul>
</aside>