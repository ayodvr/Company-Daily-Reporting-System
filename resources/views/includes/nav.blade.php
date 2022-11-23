<div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg collapse-btn"><i
                  class="fas fa-bars"></i></a></li>
            <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                <i class="fas fa-expand"></i>
              </a>
            </li>
          </ul>
        </div>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
            class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
          <div class="dropdown-menu dropdown-list dropdown-menu-right">
            <div class="dropdown-header">Notifications
            </div>
            <div class="dropdown-list-content dropdown-list-icons">
              @foreach ($activities as $activity)
              <a href="#" class="dropdown-item">
                <span class="dropdown-item-icon bg-primary text-white">
                  <i class="far fa-bell"></i>
                </span>
                <span class="dropdown-item-desc">
                  <p>{{ $activity->description }}</p>
                  <span class="time">{{ $activity['created_at']->diffForHumans() }}</span>
                </span>
              </a>
              @endforeach
            </div>
            <div class="dropdown-footer text-center">
              <a href="{{ route('retail-report.timeline') }}">View All <i class="fas fa-chevron-right"></i></a>
            </div>
          </div>
        </li>
          <li class="dropdown"><a href="#" data-toggle="dropdown"
              class="nav-link dropdown-toggle nav-link-lg nav-link-user">
              <img alt="image" src="{{ asset('assets/img/favicon.ico') }}" class="user-img-radious-style">
              <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title">Hello, {{ auth()->user()->name }}</div>
              <a href="#" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              {{-- <a href="{{ route('retail-report.timeline') }}" class="dropdown-item has-icon">
                <i class="fas fa-bolt"></i> Activities
              </a> --}}
              {{-- <a href="{{ route('retail-report.timeline') }}" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Settings
              </a> --}}
              <div class="dropdown-divider"></div>
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger"
                          onclick="event.preventDefault();
                                      this.closest('form').submit();">
                      <i class="fas fa-sign-out-alt"></i> Logout
                </a>
              </form>
            </div>
          </li>
        </ul>
      </nav>
