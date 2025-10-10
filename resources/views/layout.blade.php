<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>School management</title>
  <link rel="icon" type="image/png" href="images/logo.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet"/>
  <style>
    /* Sidebar */
    .sidebar {
      height: 100vh;
      background-color: DarkSlateBlue;
      border-right: 1px solid #ddd;
      padding-top: 20px;
      color:white;
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
    .navbar h2{
      color:white;
    }
    .navbar h2 :hover{
      color:white ;
    }
    /* Navbar */
    .navbar {
      border-bottom: 1px solid #ddd;
      background-color: Indigo;
      color: white;
    }
     .navbar .loging {
      text-decoration: none;
      margin-left: 15px;
      font-weight: 500;
      color: white;
      transition: 0.3s;
    }
    .navbar .loging:hover {
      text-decoration: none;
      color: Indigo;
      background: white;
      padding: 5px 10px;
      border-radius: 5px;
    }

    .main-content {
      padding: 20px;
      background-color: Lavender;
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
    <h2 class="navbar-brand fw-bold" href="#">Students management</h2>
    <div class="collapse navbar-collapse justify-content-end">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="loging" href="/login">Login</a></li>
        <li class="nav-item"><a class="loging" href="/registration">sign</a></li>
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
        <h6 class="text-uppercase fw-bold mb-3">Charts</h6>
        <ul class="nav flex-column">
          <li class="nav-item"><a class="nav-link active" href="#">Default</a></li>
          <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="{{url('/students')}}">Student</a></li>
          <li class="nav-item"><a class="nav-link" href="{{url('/teacher')}}">Teacher</a></li>
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
