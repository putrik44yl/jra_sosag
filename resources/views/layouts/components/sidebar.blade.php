<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('dashboard') }}" class="app-brand-link">
            <span class="app-brand-text fw-bolder ms-2">JRA</span>
        </a>
    </div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{ request()->is('dashboard') ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon bx bx-home-circle"></i>
                <div>Dashboard</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Manajemen Data JRA</span>
        </li>

        <!-- Users -->
        <li class="menu-item {{ request()->is('users*') ? 'active' : '' }}">
            <a href="{{ route('admin.users.index') }}" class="menu-link">
                <i class="menu-icon bx bx-user"></i>
                <div>Users</div>
            </a>
        </li>

        <!-- Anggota -->
        <li class="menu-item {{ request()->is('anggota_jra*') ? 'active' : '' }}">
            <a href="{{ route('admin.anggota_jra.index') }}" class="menu-link">
                <i class="menu-icon bx bx-group"></i>
                <div>Anggota</div>
            </a>
        </li>

        <!-- Pemulasaraan -->
        <li class="menu-item {{ request()->is('pemulasaraan*') ? 'active' : '' }}">
            <a href="{{ route('admin.pemulasaraan.index') }}" class="menu-link">
                <i class="menu-icon bx bx-spa"></i>
                <div>Pemulasaraan</div>
            </a>
        </li>

        <!-- Ambulans -->
        <li class="menu-item {{ request()->is('ambulans*') ? 'active' : '' }}">
            <a href="{{ route('admin.ambulans.index') }}" class="menu-link">
                <i class="menu-icon bx bx-car"></i>
                <div>Ambulans</div>
            </a>
        </li>

        <!-- Pengguna Ambulans -->
        <li class="menu-item {{ request()->is('pengguna_ambulans*') ? 'active' : '' }}">
            <a href="{{ route('admin.pengguna_ambulans.index') }}" class="menu-link">
                <i class="menu-icon bx bx-user-voice"></i>
                <div>Pengguna Ambulans</div>
            </a>
        </li>

        <!-- Sarana -->
        <li class="menu-item {{ request()->is('sarana*') ? 'active' : '' }}">
            <a href="{{ route('admin.sarana.index') }}" class="menu-link">
                <i class="menu-icon bx bx-package"></i>
                <div>Sarana</div>
            </a>
        </li>

        <!-- Pengguna Sarana -->
        <li class="menu-item {{ request()->is('pengguna_sarana*') ? 'active' : '' }}">
            <a href="{{ route('admin.pengguna_sarana.index') }}" class="menu-link">
                <i class="menu-icon bx bx-user-check"></i>
                <div>Pengguna Sarana</div>
            </a>
        </li>
    </ul>
</aside>
