<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('anggota.dashboard') }}" class="app-brand-link">
            <span class="app-brand-text fw-bolder ms-2">JRA</span>
        </a>
    </div>

        <ul class="menu-inner py-1">
          <!-- Dashboard -->
          <li class="menu-item {{ request()->is('anggota/dashboard') ? 'active' : '' }}">
            <a href="{{ route('anggota.dashboard') }}" class="menu-link">
                <i class="menu-icon bx bx-home-circle"></i>
                <div>Dashboard</div>
            </a>
          </li>

          <li class="menu-item {{ request()->is('profil') ? 'active' : '' }}">
            <a href="{{ route('anggota.profil.index') }}" class="menu-link">
              <i class="menu-icon bx bx-user"></i>
              <div>Profil Saya</div>
            </a>
          </li>

          <li class="menu-item {{ request()->is('tugas') ? 'active' : '' }}">
            <a href="{{ route('anggota.tugas.index') }}" class="menu-link">
              <i class="menu-icon bx bx-task"></i>
              <div>Tugas Bulan Ini</div>
            </a>
          </li>

          <li class="menu-item">
            <a href="{{ route('anggota.jadwalls.index') }}" class="menu-link">
              <i class="menu-icon bx bx-calendar"></i>
              <div>Jadwal Sopir</div>
            </a>
          </li>

          <!-- Logout -->
          <li class="menu-item">
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button type="submit" class="menu-link btn btn-link w-100 text-start">
                <i class="menu-icon bx bx-log-out"></i>
                <div>Logout</div>
              </button>
            </form>
          </li>
        </ul>
      </aside>