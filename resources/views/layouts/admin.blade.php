<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">

    @stack('styles')
</head>
<body>
    <div class="wrapper">
        {{-- Sidebar --}}
        <aside class="sidebar">
            <div class="sidebar-header">
                <h2><i class="fas fa-tools"></i> Admin Panel</h2>
            </div>
            <nav>
                <ul class="sidebar-nav">
                    <li><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                    <li><a href="{{ route('admin.projects.index') }}"><i class="fas fa-folder-open"></i> Proyectos</a></li>
                    <li><a href="{{ route('admin.services.index') }}"><i class="fas fa-handshake"></i> Servicios</a></li>
                    <li><a href="{{ route('admin.work-experience.index') }}"><i class="fas fa-briefcase"></i> Experiencia Laboral</a></li>
                    {{-- Más enlaces con íconos --}}
                    {{-- <li><a href="{{ route('admin.education.index') }}"><i class="fas fa-graduation-cap"></i> Educación</a></li>
                    <li><a href="{{ route('admin.skills.index') }}"><i class="fas fa-code"></i> Habilidades</a></li>
                    <li><a href="{{ route('admin.categories.index') }}"><i class="fas fa-tags"></i> Categorías</a></li>
                    <li><a href="{{ route('admin.personal-information.index') }}"><i class="fas fa-user-circle"></i> Información Personal</a></li>
                    <li><a href="{{ route('admin.social-media.index') }}"><i class="fas fa-share-alt"></i> Redes Sociales</a></li>
                    <li><a href="{{ route('admin.presentations.index') }}"><i class="fas fa-chalkboard-teacher"></i> Presentaciones</a></li> --}}
                </ul>
            </nav>
        </aside>

        <main class="content-area">
            <nav class="navbar">
                <div class="navbar-title">
                    <h3>@yield('title', 'Página Actual')</h3> 
                </div>
                <div class="navbar-actions">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="logout-btn">
                            <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
                        </button>
                    </form>
                </div>
            </nav>
            <div class="content-card"> 
                @yield('content')
            </div>
        </main>
    </div>

    @stack('scripts')
</body>
</html>