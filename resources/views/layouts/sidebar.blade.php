@exstands('layouts.app')

@section('content')
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <div class="d-flex sidebar-profile">
        <div class="sidebar-profile-image">
          <img src="{{ asset('admin/images/faces/face29.png') }}" alt="image">
          <span class="sidebar-status-indicator"></span>
        </div>
        <div class="sidebar-profile-name">
          <p class="sidebar-name">Kenneth Osborne</p>
          <p class="sidebar-designation">Welcome</p>
        </div>
      </div>
      <p class="sidebar-menu-title">Dash menu</p>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.dashboard') }}">
        <i class="typcn typcn-device-desktop menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>

    {{-- Tambahkan menu lain sesuai kebutuhan --}}
    <li class="nav-item">
      <a class="nav-link" href="#">
        <i class="typcn typcn-briefcase menu-icon"></i>
        <span class="menu-title">UI Elements</span>
      </a>
    </li>
  </ul>
</nav>

@endsection