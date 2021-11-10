  <!-- Main Sidebar Container -->
  <aside class="main-sidebar elevation-4 sidebar-light-success">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link navbar-light">
      <span class="brand-text font-weight-light">SIMS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-header">MAIN MENU</li>
          <li class="nav-item">
            <a href="/dashboard" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/santri" class="nav-link">
              <i class="nav-icon fas fa-user-graduate"></i>
              <p>
                Santri
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/prestasi" class="nav-link">
              <i class="nav-icon fas fa-trophy"></i>
              <p>
                Prestasi
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/pelanggaran" class="nav-link">
              <i class="nav-icon fas fa-exclamation-triangle"></i>
              <p>
                Pelanggaran
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/perizinan" class="nav-link">
              <i class="nav-icon fas fa-suitcase-rolling"></i>
              <p>
                Perizinan
              </p>
            </a>
          </li>
          @if(auth()->user()->role == 'Super Admin')
          <li class="nav-header">SUPER ADMIN MENU</li>
          <li class="nav-item">
            <a href="/ekstradata" class="nav-link">
            <i class="nav-icon fas fa-folder-open"></i>
              <p>
                Ekstra Data
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/users" class="nav-link">
              <i class="nav-icon fas fa-user-friends"></i>
              <p>
                Users
              </p>
            </a>
          </li>
          @endif
          <li class="nav-header">OTHERS</li>
          <li class="nav-item">
            <a href="/profile" class="nav-link">
              <i class="nav-icon fas fa-user-alt"></i>
              <p>Profile</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/logout" class="nav-link" onclick="return confirm ('Yakin ingin Logout?')">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>Sign Out</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>