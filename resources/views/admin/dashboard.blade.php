@extends('layouts.admin')

@section('title', 'Dashboard Principal')

{{-- No se necesita @push('styles') aquí porque todos los estilos están en admin.css --}}

@section('content')
    <div class="dashboard-header">
        <h1>Vista General del Mantenedor</h1>
        <p>Desde aquí puedes gestionar y administrar de forma centralizada todo el contenido de tu portafolio personal o profesional.</p>
    </div>

    <div class="summary-cards">
        {{-- Tarjeta de Proyectos --}}
        <div class="summary-card projects">
            <div class="icon"><i class="fas fa-project-diagram"></i></div>
            <h3>Proyectos</h3>
            <p class="count">{{ $projectCount ?? 0 }}</p> {{-- Asegúrate de pasar $projectCount desde el controlador --}}
            <p>Gestiona todos tus proyectos destacados, desde la edición hasta la adición de nuevos trabajos.</p>
            <a href="{{ route('admin.projects.index') }}">
                Ver Proyectos <i class="fas fa-arrow-right"></i>
            </a>
        </div>

        {{-- Tarjeta de Servicios --}}
        <div class="summary-card services">
            <div class="icon"><i class="fas fa-handshake"></i></div>
            <h3>Servicios</h3>
            <p class="count">{{ $serviceCount ?? 0 }}</p> {{-- Asegúrate de pasar $serviceCount desde el controlador --}}
            <p>Administra la oferta de servicios que brindas a tus clientes o colaboradores.</p>
            <a href="{{ route('admin.services.index') }}">
                Ver Servicios <i class="fas fa-arrow-right"></i>
            </a>
        </div>

        {{-- Tarjeta de Experiencia Laboral (Nueva) --}}
        <div class="summary-card experience">
            <div class="icon"><i class="fas fa-briefcase"></i></div>
            <h3>Experiencia Laboral</h3>
            <p class="count">{{ $workExperienceCount ?? 0 }}</p> {{-- Asegúrate de pasar $workExperienceCount desde el controlador --}}
            <p>Organiza y muestra tu trayectoria profesional y roles desempeñados.</p>
            <a href="{{ route('admin.work-experience.index') }}">
                Ver Experiencia <i class="fas fa-arrow-right"></i>
            </a>
        </div>

    </div>
@endsection

{{-- No se necesita @push('scripts') aquí a menos que tengas JS específico para el dashboard --}}