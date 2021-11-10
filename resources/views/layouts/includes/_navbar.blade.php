  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand text-sm navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
          <span class="d-none d-md-inline">
            <i class="nav-icon fas fa-user-alt"></i> {{auth()->user()->name}}
          </span>
        </a>
        <ul class="dropdown-menu">
          <li>
            <a class="dropdown-item" href="/profile">
              <i class="nav-icon fas fa-user-alt"></i> Profile
            </a>
          </li>
          <li><hr class="dropdown-divider"></li>
          <li>
            <a class="dropdown-item" href="/logout" onclick="return confirm ('Yakin ingin Logout?')">
              <i class="nav-icon fas fa-sign-out-alt"></i> Sign Out
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->