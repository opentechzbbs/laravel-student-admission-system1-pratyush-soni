<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>@yield('title', 'Admin Panel')</title>
  <link rel="stylesheet" href="{{ asset('css/adminlte.css') }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  @stack('styles')

  <style>
    #global-loader {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: 9999;
      background-color: rgba(0, 0, 0, 0.9);
      display: flex;
      justify-content: center;
      align-items: center;
      transition: opacity 0.3s ease;
      font-family: Arial, sans-serif;
    }

    #global-loader.hidden {
      opacity: 0;
      visibility: hidden;
    }

    .loader-text {
      color: #ffffff;
      font-size: 24px;
      letter-spacing: 2px;
      animation: blink 1.2s infinite;
    }

    @keyframes blink {
      0%, 100% { opacity: 1; }
      50% { opacity: 0.5; }
    }
  </style>
</head>
<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">

  <!-- Global Loader -->
  <div id="global-loader">
    <div class="loader-text">LOADING...</div>
  </div>

  <div class="app-wrapper">
    @include('partials.header')
    @include('partials.sidebar')

    <main class="app-main">
      <div class="app-content">
        @yield('content')
      </div>
    </main>

    @include('partials.footer')
  </div>

  <script src="{{ asset('js/adminlte.js') }}"></script>

  <!-- Loader Script -->
  <script>
    window.addEventListener('load', function () {
      const loader = document.getElementById('global-loader');
      loader.classList.add('hidden');
      setTimeout(() => loader.style.display = 'none', 300);
    });

    window.addEventListener('beforeunload', function () {
      const loader = document.getElementById('global-loader');
      loader.classList.remove('hidden');
      loader.style.display = 'flex';
    });
  </script>

  @stack('scripts')
</body>
</html>
