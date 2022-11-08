<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="{{ route('dashboard') }}">
          <img alt="image" src="{{ asset('assets/img/apple-touch-icon.png') }}" class="header-logo" />
          {{-- <span class="logo-name">DW</span> --}}
        </a>
      </div>
      <hr>
      <ul class="sidebar-menu">
        <li class="menu-header">Main</li>
            <li class="dropdown active">
              <a href="{{ route('dashboard') }}"><i class="fas fa-home"></i><span>Dashboard</span></a>
            </li>
        @if (auth()->user()->name == 'admin' || auth()->user()->unit == 'retail')
        <li class="menu-header">Reports</li>
        <li class="dropdown">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-shopping-cart"></i><span>Retail</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{ route('retail-report.create') }}">Create Report</a></li>
            <li><a class="nav-link" href="/retail-report">Manage Reports</a></li>
          </ul>
        </li>
        @endif
        @if (auth()->user()->name == 'admin' || auth()->user()->unit == 'facility')
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-building"></i><span>Facility</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{ route('facility-report.create') }}">Create Report</a></li>
              <li><a class="nav-link" href="/facility-report">Manage Reports</a></li>
            </ul>
        </li>
        @endif
        @role('admin')
        <li class="menu-header">Directory</li>
        <li class="dropdown">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-user-friends"></i><span>Staffs</span></a>
          <ul class="dropdown-menu">
            <li><a href="{{ route('staffs.index') }}" class="nav-link">Manage Staffs</a></li>
          </ul>
       <li class="dropdown">
          <a href="#" class="nav-link has-dropdown"><i class="far fa-address-card"></i><span>Customers</span></a>
          <ul class="dropdown-menu">
            <li><a href="{{ route('retail-customers.index') }}" class="nav-link">Manage Customers</a></li>
          </ul>
        </li>
        @endrole
        <li class="menu-header">Settings</li>
        <li class="dropdown">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-users-cog"></i><span>Profile</span></a>
          <ul class="dropdown-menu">
            <li><a href="#" class="nav-link">Manage Profile</a></li>
          </ul>
       <li class="dropdown">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-user-tag"></i><span>Roles</span></a>
          <ul class="dropdown-menu">
            <li><a href="" class="nav-link">Manage Roles</a></li>
          </ul>
        </li>
        {{-- <li class="menu-header">Stores</li>
        <li class="dropdown">
          <a href="{{ route('retail-report.store_locations') }}" class="nav-link"><i class="fas fa-map-marker"></i><span>Locations</span></a>
          <ul class="dropdown-menu">
            <li><a href="{{ route('retail-report.store_locations') }}">Vector Map</a></li>
          </ul>
       </li> --}}
      </ul>
    </aside>
  </div>
