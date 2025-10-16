<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>School Management</title>
  <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}"> <!-- Use asset() helper -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet"/>
  <style>

    .sidebar {
      height: 100vh;
      background-color: DarkSlateBlue;
      border-right: 1px solid #ddd;
      padding-top: 20px;
      color: white;
    }

    .sidebar .nav-link {
      color: white;
      padding: 10px 15px;
      border-radius: 8px;
      margin-bottom: 5px;
      font-weight: 500;
      transition: all 0.2s;
    }

    .sidebar .nav-link.active,
    .sidebar .nav-link:hover {
      background-color: #e9ecef;
      color: #000;
      font-weight: bold;
    }

 
    .navbar .navbar-brand {
      color: white;
      font-weight: bold; 
      text-decoration: none; 
    }
    .navbar .navbar-brand:hover { 
      color: white;
    }


    .navbar {
      border-bottom: 1px solid #ddd;
      background-color: Indigo;
      color: white;
    }
    .navbar .nav-link.auth-link { 
      text-decoration: none;
      margin-left: 15px;
      font-weight: 500;
      color: white;
      transition: 0.3s;
    }
    .navbar .nav-link.auth-link:hover {
      color: Indigo;
      background: white;
      padding: 5px 10px;
      border-radius: 5px;
    }

    .main-content {
      padding: 20px;
      background-color: Lavender;
      min-height: calc(100vh - 60px); 
    }

    .card {
      border-radius: 12px;
      box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    }
  </style>
</head>
<body>

<!-- Top Navbar -->
<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="">School Management</a>
    <div class="collapse navbar-collapse justify-content-end">
      <ul class="navbar-nav">
        @guest
          <li class="nav-item">
            <a class="nav-link auth-link" href="{{ route('login') }}">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link auth-link" href="{{ route(name: 'users.create') }}">Signup</a>
          </li>
        @else
          <li class="nav-item d-flex align-items-center me-3">
            <span class="navbar-text text-white me-2">Welcome, {{ Auth::user()->name }}</span>
          </li>
          <li class="nav-item">
            <form id="logout-form-nav" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <a class="nav-link auth-link" href="#"
               onclick="event.preventDefault(); document.getElementById('logout-form-nav').submit();">
                Logout
            </a>
          </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>

<!-- Page Layout -->
<div class="container-fluid">
  <div class="row">
    <!-- Sidebar -->
    <nav class="col-md-2 d-none d-md-block sidebar">
      <div class="p-3">
        <h6 class="text-uppercase fw-bold mb-3">Dashboard</h6> <!-- Changed to Dashboard, more generic -->
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link " href="">
              <i class="fas fa-home me-2"></i> Home
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('students.*') ? 'active' : '' }}" href="{{ route('students.index') }}">
              <i class="fas fa-user-graduate me-2"></i> Students
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('products.*') ? 'active' : '' }}" href="{{ route('products.index') }}"> <!-- Assuming 'teacher.index' route -->
              <i class="fas fa-chalkboard-teacher me-2"></i> products
            </a>
          </li>
          <!-- Add more sidebar links as needed -->
        </ul>
      </div>
    </nav>

    <!-- Main Content -->
    <main class="col-md-10 ms-sm-auto col-lg-10 px-md-4 main-content">
        @yield('content')
    </main>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>