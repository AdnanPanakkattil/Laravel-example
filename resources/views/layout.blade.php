<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>School Management</title>
  <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">

  <!-- Bootstrap & Font Awesome -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet"/>

  <!-- DataTables -->
  <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">

  <style>
    body {
      background-color: Lavender;
      overflow-x: hidden;
    }
    /* Navbar */
    .navbar {
      background-color: #2B3856;
      border-bottom: 1px solid #ddd;
    }
    .navbar .navbar-brand {
      color: white;
      font-weight: bold;
    }
    .navbar .navbar-brand:hover { 
      color: white;
    }
    .navbar .nav-link.auth-link {
      color: white;
      font-weight: 500;
      margin-left: 10px;
      transition: 0.3s;
    }
    .navbar .nav-link.auth-link:hover {
      color: Indigo;
      background: white;
      border-radius: 5px;
      padding: 5px 10px;
    }

    /* Sidebar */
    .sidebar {
      background-color: #2B547E;
      color: white;
      min-height: 100vh;
      padding-top: 20px;
      transition: all 0.3s ease;
    }
    .sidebar .nav-link {
      color: white;
      padding: 10px 15px;
      border-radius: 8px;
      margin-bottom: 5px;
      font-weight: 500;
      transition: all 0.2s;
      display: block;
    }
    .sidebar .nav-link.active,
    .sidebar .nav-link:hover {
      background-color: #e9ecef;
      color: #000;
      font-weight: bold;
    }
    .sidebar h6 {
      color: #f8f9fa;
    }

    /* Main Content */
    .main-content {
      padding: 20px;
      min-height: calc(100vh - 60px);
    }

    .card {
      border-radius: 12px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }

    /* Responsive Sidebar */
    @media (max-width: 991px) {
      .sidebar {
        position: fixed;
        top: 56px;
        left: -250px;
        width: 220px;
        height: 100%;
        z-index: 1050;
      }
      .sidebar.active {
        left: 0;
      }
      .main-content {
        padding-top: 70px;
      }
    }

    .sidebar-overlay {
      display: none;
      position: fixed;
      top: 56px;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0,0,0,0.5);
      z-index: 1040;
    }
    .sidebar-overlay.active {
      display: block;
    }
    /* Main Content */
.main-content {
  
    margin-top: 30px;


}

  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top">
  <div class="container-fluid">
    <button class="btn btn-light d-lg-none me-2" id="sidebarToggle">
      <i class="fas fa-bars"></i>
    </button>
    <a class="navbar-brand" href="#">School Management</a>
    <div class="collapse navbar-collapse justify-content-end">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link auth-link" href="{{ route('users.login') }}">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link auth-link" href="{{ route('users.create') }}">Signup</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="sidebar-overlay" id="sidebarOverlay"></div>

<div class="container-fluid">
  <div class="row">
    <!-- Sidebar -->
    <nav class="col-lg-2 sidebar d-lg-block" id="sidebarMenu">
      <div class="p-3">
        <h6 class="text-uppercase fw-bold mb-3">Dashboard</h6>
        <ul class="nav flex-column">

          <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
              <i class="fas fa-tachometer-alt me-2"></i> Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('students.*') ? 'active' : '' }}"  href="{{ route('students.index') }}">
              <i class="fas fa-user-graduate me-2"></i> Students
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('products.*') ? 'active' : '' }}" href="{{ route('products.index') }}">
              <i class="fas fa-boxes me-2"></i> Products
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <!-- Main Content -->
    <main class="col-lg-10 ms-auto main-content">
      @yield('content')
    </main>
  </div>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  // Sidebar toggle for mobile
  const sidebarToggle = document.getElementById('sidebarToggle');
  const sidebar = document.getElementById('sidebarMenu');
  const overlay = document.getElementById('sidebarOverlay');

  sidebarToggle?.addEventListener('click', () => {
    sidebar.classList.toggle('active');
    overlay.classList.toggle('active');
  });

  overlay?.addEventListener('click', () => {
    sidebar.classList.remove('active');
    overlay.classList.remove('active');
  });
</script>

@yield('scripts')

</body>
</html>
