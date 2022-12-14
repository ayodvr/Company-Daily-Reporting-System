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
        @if (auth()->user()->name == 'admin' || auth()->user()->unit == 'distribution')
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-shopping-basket"></i><span>Distribution</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{ route('distribution.create') }}">Create Report</a></li>
              <li><a class="nav-link" href="/distribution">Manage Reports</a></li>
              {{-- <li><a class="nav-link" href="#"></a></li> --}}
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
        @if (auth()->user()->name == 'admin' || auth()->user()->unit == 'service')
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-question-circle"></i><span>Customer Service</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{ route('customer.enquiries') }}">Enquiries</a></li>
            </ul>
        </li>
        @endif
        @if (auth()->user()->name == 'admin' || auth()->user()->unit == 'hr')
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="far fa-lightbulb"></i><span>Human Resource</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{ route('human-resource.create') }}">Add Job</a></li>
              <li><a class="nav-link" href="{{ route('human-resource.index') }}">Modify Jobs</a></li>
              <li><a class="nav-link" href="#">View Candidates</a></li>
            </ul>
        </li>
        @endif
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-list-alt"></i><span>Price List</span></a>
            <ul class="dropdown-menu">
                <li><a href="{{ route('products.index') }}" class="nav-link">All Products</a></li>
              </ul>
        </li>
        @role('admin')
        <li class="menu-header">Directory</li>
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-user-friends"></i><span>Customers</span></a>
            <ul class="dropdown-menu">
              <li><a href="{{ route('retail-customers.index') }}" class="nav-link">Manage Customers</a></li>
            </ul>
          </li>
        <li class="dropdown">
          <a href="#" class="nav-link has-dropdown"><i class="far fa-address-card"></i><span>Employee</span></a>
          <ul class="dropdown-menu">
            <li><a href="{{ route('staffs.index') }}" class="nav-link">Manage Employee</a></li>
          </ul>
        @endrole
        @role('staff')
        <li class="menu-header">Settings</li>
        <li class="dropdown">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-users-cog"></i><span>Profile</span></a>
          <ul class="dropdown-menu">
            <li><a href="#" class="nav-link">Manage Profile</a></li>
          </ul>
        </li>
        @endrole
       {{-- <li class="dropdown">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-user-tag"></i><span>Roles</span></a>
          <ul class="dropdown-menu">
            <li><a href="" class="nav-link">Manage Roles</a></li>
          </ul>
        </li> --}}
      </ul>
    </aside>
  </div>
